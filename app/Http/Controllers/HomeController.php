<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        // Quotes
        $quotes = Content::query()
            ->published()
            ->where('content_type', 'quote')
            ->select([
                'id',
                'title',
                'slug',
                'excerpt',
                'featured_image',
                'quote_author',
                'published_at',
            ])->latest('published_at')->limit(5)->get();

        $trendingPosts = Content::query()
            ->published()
            ->where('content_type', '!=', 'quote')
            ->select([
                'id',
                'category_id',
                'title',
                'slug',
                'excerpt',
                'featured_image',
                'author_id',
                'published_at',
                'views_count',
            ])
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->latest('published_at')
            ->limit(5)
            ->get();

        $popularPosts = Content::query()
            ->published()
            ->where('content_type', '!=', 'quote')
            ->select([
                'id',
                'category_id',
                'title',
                'slug',
                'excerpt',
                'featured_image',
                'author_id',
                'published_at',
                'views_count',
            ])
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->orderByDesc('views_count')
            ->limit(5)
            ->get();

        $categories = Category::query()
            ->activeOrdered()
            ->get([
                'id',
                'name',
                'slug',
                'position',
            ]);


        $categoryIds = $categories->pluck('id');

        $categoryPosts = Content::query()
            ->published()
            ->whereIn('category_id', $categoryIds)
            ->where('content_type', '!=', 'quote')
            ->select([
                'id',
                'category_id',
                'title',
                'slug',
                'excerpt',
                'featured_image',
                'author_id',
                'published_at',
                'views_count',
            ])
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->latest('published_at')
            ->get()
            ->groupBy('category_id');

        $categories->each(function ($category) use ($categoryPosts) {

            $category->homepagePosts = $categoryPosts
                ->get($category->id, collect())
                ->take(4)
                ->values();
        });

        $tags = Tag::query()
            ->select([
                'tags.id',
                'tags.name',
                'tags.slug',
            ])->whereHas('contents', function ($query) {
                $query->published();
            })->withCount([
                'contents as published_contents_count' => function ($query) {
                    $query->published();
                }
            ])->orderByDesc('published_contents_count')
            ->limit(15)
            ->get();


        return view('frontend.home', compact(
            'quotes',
            'trendingPosts',
            'popularPosts',
            'tags',
            'categories'
        ));
    }


    public function show(string $slug)
    {
        $content = Content::query()->published()->where('slug', $slug)
            ->with([
                'category:id,name,slug',
                'author:id,name',
                'tags:id,name,slug',
                'seoMetadata:id,content_id,meta_title,meta_description,meta_keywords,robots',
            ])
            ->firstOrFail();

        Content::whereKey($content->id)->increment('views_count');

        $relatedContents = Content::query()
            ->published()
            ->where('category_id', $content->category_id)
            ->whereKeyNot($content->id)
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->latest('published_at')
            ->limit(5)
            ->get([
                'id',
                'category_id',
                'author_id',
                'title',
                'slug',
                'featured_image',
                'content_type',
                'published_at',
            ]);


        $latestPosts = Cache::remember(
            'frontend.sidebar.latest_posts',
            now()->addMinutes(10),
            function () {

                return Content::query()
                    ->published()
                    ->with([
                        'author:id,name',
                    ])
                    ->latest('published_at')
                    ->limit(4)
                    ->get([
                        'id',
                        'author_id',
                        'title',
                        'slug',
                        'featured_image',
                        'published_at',
                    ]);
            }
        );


        $popularPosts = Cache::remember(
            'frontend.sidebar.popular_posts',
            now()->addMinutes(10),
            function () {

                return Content::query()
                    ->published()
                    ->with([
                        'category:id,name,slug',
                    ])
                    ->orderByDesc('views_count')
                    ->limit(5)
                    ->get([
                        'id',
                        'category_id',
                        'title',
                        'slug',
                        'featured_image',
                        'views_count',
                        'published_at',
                    ]);
            }
        );

        $sidebarTags = Cache::remember(
            'frontend.sidebar.tags',
            now()->addMinutes(30),
            function () {

                return Tag::query()
                    ->whereHas('contents', function ($query) {
                        $query->published();
                    })
                    ->withCount([
                        'contents as published_contents_count' => function ($query) {
                            $query->published();
                        }
                    ])
                    ->orderByDesc('published_contents_count')
                    ->limit(20)
                    ->get([
                        'id',
                        'name',
                        'slug',
                    ]);
            }
        );



        return view('frontend.detail', compact(
            'content',
            'relatedContents',
            'latestPosts',
            'popularPosts',
            'sidebarTags'
        ));
    }

    public function search(Request $request)
    {
        $search = trim($request->input('q', ''));
        $posts  = Content::query()->published()->when($search !== '', function ($query) use ($search) {
                                $query->where(function ($query) use ($search) {
                                    $query
                                        ->where('title', 'like', "%{$search}%")
                                        ->orWhere('excerpt', 'like', "%{$search}%")
                                        ->orWhere('content', 'like', "%{$search}%");
                                });
                            })->with([
                                'category:id,name,slug',
                                'author:id,name',
                            ])
                            ->select([
                                'id',
                                'category_id',
                                'title',
                                'slug',
                                'excerpt',
                                'featured_image',
                                'author_id',
                                'published_at',
                                'views_count',
                            ])
                            ->latest('published_at')
                            ->paginate(12)
                            ->withQueryString();

        return view('frontend.results', [
            'posts' => $posts,
            'title' => $search !== ''
                ? 'Search Results for "' . $search . '"'
                : 'Search Results',
            'type' => 'search',
            'search' => $search,
        ]);
    }

    public function category(string $slug)
    {
        $category   = Category::query()->where('slug', $slug)->where('status', true)->firstOrFail();

        $posts      = Content::query()->published()
                        ->where('content_type', '!=', 'quote')
                        ->where('category_id', $category->id)
                        ->with([
                            'category:id,name,slug',
                            'author:id,name',
                        ])
                        ->select([
                            'id',
                            'category_id',
                            'title',
                            'slug',
                            'excerpt',
                            'featured_image',
                            'author_id',
                            'published_at',
                            'views_count',
                        ])
                        ->latest('published_at')
                        ->paginate(12);

        return view('frontend.results', [
            'posts' => $posts,
            'title' => $category->name,
            'type' => 'category',
            'category' => $category,
            'search' => null,
        ]);
    }

    public function tag(string $slug)
    {
        $tag    =   Tag::query()->where('slug', $slug)->firstOrFail();

        $posts = Content::query()->published()->where('content_type', '!=', 'quote')
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })
            ->with([
                'category:id,name,slug',
                'author:id,name',
            ])
            ->select([
                'id',
                'category_id',
                'title',
                'slug',
                'excerpt',
                'featured_image',
                'author_id',
                'published_at',
                'views_count',
            ])
            ->latest('published_at')
            ->paginate(12);

        return view('frontend.results', [
            'posts' => $posts,
            'title' => $tag->name,
            'type' => 'tag',
            'tag' => $tag,
            'search' => null,
        ]);
    }

    public function categories()
    {
        $categories = Category::query()->activeOrdered()->withCount([
                'contents as published_contents_count' => function ($query) {
                    $query->published()
                        ->where('content_type', '!=', 'quote');
                }
            ])
            ->orderBy('position')
            ->orderBy('id')
            ->get([
                'id',
                'name',
                'slug',
                'description',
                'position',
            ]);

        return view('frontend.categories', compact('categories'));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
