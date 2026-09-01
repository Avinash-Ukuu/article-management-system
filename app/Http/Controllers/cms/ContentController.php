<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contents = Content::query()->with(['category', 'author',])->when($request->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        })->when($request->content_type, function ($query, $type) {
            $query->where('content_type', $type);
        })->when($request->category_id, function ($query, $categoryId) {
            $query->where('category_id', $categoryId);
        })->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })->when($request->date, function ($query, $date) {
            $query->whereDate('published_at', $date);
        })->latest()->paginate(15)->withQueryString();

        $categories = Category::active()->orderBy('name')->get();

        return view('cms.content.index', compact('contents', 'categories'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $content = new Content();

        $categories = Category::active()->orderBy('name')->pluck('name', 'id');

        $tags = Tag::query()->orderBy('name')->pluck('name', 'id');

        return view('cms.content.form', compact('content', 'categories', 'tags'));
    }

    /**
     * Store content.
     */
    public function store(ContentRequest $request)
    {
        $data = $request->validated();

        $data = $this->prepareContentData($data);

        DB::transaction(function () use ($request, &$data) {

            $data['author_id'] = auth()->id();

            if ($request->has("featured_image")) {
                $imageName  = "content_" . Carbon::now()->timestamp . '.' . $request->file('featured_image')->getClientOriginalExtension();
                $request->file('featured_image')->move(public_path('uploads/contents/'), $imageName);
                $data['featured_image']  =  $imageName;
            }

            unset(
                $data['tags'],
                $data['meta_title'],
                $data['meta_description'],
                $data['meta_keywords'],
                $data['robots']
            );

            $content = Content::create($data);

            $content->tags()->sync(
                $request->input('tags', [])
            );

            $this->saveSeoMetadata($request, $content);
        });

        return redirect()->route('cms.content.index')->with('success', 'Content created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Content $content)
    {
        $content->load(['tags', 'seoMetadata',]);

        $categories = Category::active()->orderBy('name')->pluck('name', 'id');

        $tags = Tag::query()->orderBy('name')->pluck('name', 'id');

        return view('cms.content.form', compact('content', 'categories', 'tags'));
    }

    /**
     * Update content.
     */
    public function update(ContentRequest $request, Content $content)
    {
        $data = $request->validated();

        $data = $this->prepareContentData($data);

        DB::transaction(function () use ($request, $content, &$data) {

            if ($request->hasFile('featured_image')) {
                $oldImage = $content->featured_image;
                $data['featured_image'] = $request
                    ->file('featured_image')
                    ->store('content/featured', 'public');

                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            if ($request->has("featured_image")) {
                if (file_exists("uploads/contents/" . $content->featured_image)) {
                    File::delete("uploads/contents/" . $content->featured_image);
                }
                // image upload code
                $imageName  = "content_" . Carbon::now()->timestamp . '.' . $request->file('featured_image')->getClientOriginalExtension();
                $request->file('featured_image')->move(public_path('uploads/contents/'), $imageName);
                $data['featured_image']   =  $imageName;
            }

            unset(
                $data['tags'],
                $data['meta_title'],
                $data['meta_description'],
                $data['meta_keywords'],
                $data['robots']
            );

            $content->update($data);

            $content->tags()->sync(
                $request->input('tags', [])
            );

            $this->saveSeoMetadata($request, $content);
        });

        return redirect()->route('cms.content.index')->with('success', 'Content updated successfully.');
    }

    /**
     * Delete content.
     */
    public function destroy(Content $content)
    {
        //
    }

    /**
     * Toggle content status.
     */
    public function toggleStatus(Content $content)
    {
        if ($content->status === 'published') {
            $content->update([
                'status' => 'draft',
            ]);
        } else {
            $content->update([
                'status' => 'published',
                'published_at' => now(),
            ]);
        }

        return redirect()->route('cms.content.index')->with('success', 'Content status updated successfully.');
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Content $content)
    {
        $content->update(['is_featured' => ! $content->is_featured,]);

        return redirect()->route('cms.content.index')->with('success', 'Featured status updated successfully.');
    }

    /**
     * Prepare content data before persistence.
     */
    private function prepareContentData(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['is_featured'] = !empty($data['is_featured']);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        if ($data['status'] === 'scheduled') {
            $data['is_featured'] = false;
        }

        if ($data['content_type'] !== 'quote') {
            $data['quote_author'] = null;
        }

        return $data;
    }

    /**
     * Save SEO metadata.
     */
    private function saveSeoMetadata(ContentRequest $request, Content $content): void
    {
        $seoData = [
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'robots' => $request->input('robots'),
        ];

        $existingSeo = $content->seoMetadata;

        if ($existingSeo) {
            $existingSeo->update($seoData);
        } else {
            $content->seoMetadata()->create($seoData);
        }
    }
}
