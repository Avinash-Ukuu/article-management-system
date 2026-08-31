<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $tags = Tag::query()->withCount('contents')->when($search, function ($query, $search) {
                    $query->where(function ($query) use ($search) {
                        $query->where('name', 'like', "%{$search}%")
                            ->orWhere('slug', 'like', "%{$search}%");
                    });
                })->latest()->paginate(15)->withQueryString();

        return view('cms.tags.index', compact('tags'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $tag = new Tag();

        return view('cms.tags.form', compact('tag'));
    }

    /**
     * Store tag.
     */
    public function store(TagRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['name']);

        Tag::create($data);

        return redirect()->route('cms.tags.index')->with('success', 'Tag created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Tag $tag)
    {
        return view('cms.tags.form', compact('tag'));
    }

    /**
     * Update tag.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $data['slug'] = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['name']);

        $tag->update($data);

        return redirect()->route('cms.tags.index')->with('success', 'Tag updated successfully.');
    }

    /**
     * Delete tag.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('cms.tags.index')->with('success', 'Tag deleted successfully.');
    }
}
