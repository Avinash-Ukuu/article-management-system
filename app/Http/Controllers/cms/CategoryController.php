<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->withCount('contents')->orderBy('position')->paginate(15);

        return view('cms.categories.index', compact('categories'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $category = new Category();

        return view('cms.categories.form', compact('category'));
    }

    /**
     * Store category.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['status'] = $request->boolean('status');

        Category::create($data);

        return redirect()
            ->route('cms.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Category $category)
    {
        return view('cms.categories.form', compact('category'));
    }

    /**
     * Update category.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        $data['status'] = $request->boolean('status');

        $category->update($data);

        return redirect()
            ->route('cms.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category.
     */
    public function destroy(Category $category)
    {
        if ($category->contents()->exists()) {
            return redirect()
                ->route('cms.categories.index')
                ->with('error', 'This category is being used by content and cannot be deleted.');
        }

        $category->delete();

        return redirect()
            ->route('cms.categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    /**
     * Toggle category status.
     */
    public function toggleStatus(Category $category)
    {
        $category->update([
            'status' => ! $category->status,
        ]);

        return redirect()
            ->route('cms.categories.index')
            ->with('success', 'Category status updated successfully.');
    }

    public function updatePosition(Request $request)
    {
        $validated  =   $request->validate([
                            'categories' => ['required', 'array'],
                            'categories.*' => ['integer', 'exists:categories,id'],
                        ]);

        DB::transaction(function () use ($validated) {

            foreach ($validated['categories'] as $position => $categoryId) {

                Category::where('id', $categoryId)
                    ->update([
                        'position' => $position + 1,
                    ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Category positions updated successfully.',
        ]);
    }
}
