<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function home()
    {
        $postSelect     = [
            'id',
            'category_id',
            'title',
            'slug',
            'excerpt',
            'featured_image',
            'author_id',
            'published_at',
            'views_count',
        ];

        $trendingPosts  = Content::query()->published()->where('content_type', '!=', 'quote')
            ->select($postSelect)->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->latest('published_at')
            ->latest('id')
            ->limit(5)
            ->get();


        $bannerPostIds  = $trendingPosts->pluck('id');

        $popularPosts   = Content::query()->published()
            ->where('content_type', '!=', 'quote')
            ->where('is_featured', true)
            ->when(
                $bannerPostIds->isNotEmpty(),
                function ($query) use ($bannerPostIds) {
                    $query->whereNotIn('id', $bannerPostIds);
                }
            )
            ->select($postSelect)
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->orderByDesc('views_count')
            ->latest('published_at')
            ->latest('id')
            ->limit(15)
            ->get();

        $excludedPostIds = $bannerPostIds
            ->merge($popularPosts->pluck('id'))
            ->unique()
            ->values();

        $categories     = Category::query()->activeOrdered()
            ->where('slug', '!=', 'quote')
            ->get([
                'id',
                'name',
                'slug',
                'position',
            ]);


        $categoryIds = $categories->pluck('id');
        $categoryPosts = collect();

        if ($categoryIds->isNotEmpty()) {

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
        }

        $categories->each(function ($category) use ($categoryPosts) {

            $category->homepagePosts = $categoryPosts
                ->get($category->id, collect())
                ->take(4)
                ->values();
        });

        $quoteCategory = Category::query()
            ->where('slug', 'quote')
            ->where('status', true)
            ->first();

        $quotes = collect();

        if ($quoteCategory) {

            $quotes = Content::query()
                ->published()
                ->where('category_id', $quoteCategory->id)
                ->where('content_type', 'quote')
                ->select([
                    'id',
                    'category_id',
                    'title',
                    'slug',
                    'excerpt',
                    'featured_image',
                    'quote_author',
                    'published_at',
                ])
                ->with([
                    'category:id,name,slug',
                ])
                ->latest('published_at')
                ->latest('id')
                ->limit(5)
                ->get();
        }


        $tags = Tag::query()
            ->select([
                'tags.id',
                'tags.name',
                'tags.slug',
            ])
            ->whereHas('contents', function ($query) {
                $query->published();
            })
            ->withCount([
                'contents as published_contents_count' => function ($query) {
                    $query->published();
                }
            ])
            ->orderByDesc('published_contents_count')
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


    public function show(string $categorySlug, string $contentSlug)
    {
        $content = Content::query()->published()->where('slug', $contentSlug)
            ->whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug)
                    ->where('status', true);
            })
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


        $latestPosts = Content::query()
            ->published()
            ->with([
                'author:id,name',
                'category:id,name,slug',
            ])
            ->latest('published_at')
            ->limit(4)
            ->get([
                'id',
                'category_id',
                'author_id',
                'title',
                'slug',
                'featured_image',
                'published_at',
            ]);



        $popularPosts =  Content::query()
            ->published()
            ->with([
                'category:id,name,slug',
            ])
            ->where('is_featured', true)
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


        $sidebarTags = Tag::query()
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
            'category' => null,
            'search' => $search,
        ]);
    }

    public function category(string $slug)
    {
        $category   = Category::query()->where('slug', $slug)->where('status', true)->firstOrFail();

        $posts      = Content::query()->published()
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
            'category' => null,
            'tag' => $tag,
            'search' => null,
        ]);
    }

    public function categories()
    {
        $categories = Category::query()->activeOrdered()->withCount([
            'contents as published_contents_count' => function ($query) {
                $query->published();
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

    public function sitemap()
    {
        $urls = [];
        $fixedPages = [
            [
                'loc' => url('/'),
                'lastmod' => Carbon::now()->toAtomString(),
                'priority' => '1.0',
            ],
            [
                'loc' => url('/about'),
                'lastmod' => Carbon::now()->toAtomString(),
                'priority' => '0.8',
            ],
            [
                'loc' => url('/categories'),
                'lastmod' => Carbon::now()->toAtomString(),
                'priority' => '0.8',
            ],
        ];

        $urls = array_merge($urls, $fixedPages);

        $categories = Category::query()
            ->where('status', true)
            ->whereHas('contents', function ($query) {
                $query->published()
                    ->where('content_type', '!=', 'quote');
            })
            ->orderBy('position')
            ->orderBy('id')
            ->get([
                'id',
                'name',
                'slug',
                'updated_at',
            ]);
        foreach ($categories as $category) {
            $urls[] = [
                'loc' => route('category.show', $category->slug),
                'lastmod' => optional($category->updated_at)
                    ->toAtomString(),
                'priority' => '0.8',
            ];
        }

        $tags = Tag::query()
            ->whereHas('contents', function ($query) {
                $query->published()
                    ->where('content_type', '!=', 'quote');
            })
            ->get([
                'id',
                'name',
                'slug',
                'updated_at',
            ]);

        foreach ($tags as $tag) {

            $urls[] = [
                'loc' => route('tag.show', $tag->slug),
                'lastmod' => optional($tag->updated_at)
                    ->toAtomString(),
                'priority' => '0.5',
            ];
        }

        $contents = Content::query()
            ->published()
            ->with([
                'category:id,name,slug',
            ])
            ->whereHas('category', function ($query) {
                $query->where('status', true);
            })
            ->get([
                'id',
                'category_id',
                'slug',
                'content_type',
                'updated_at',
            ]);

        foreach ($contents as $content) {
            if (!$content->category) {
                continue;
            }
            $urls[] = [
                'loc' => route('content.show', [
                    'category' => $content->category->slug,
                    'slug' => $content->slug,
                ]),
                'lastmod' => optional($content->updated_at)
                    ->toAtomString(),
                'priority' => $content->content_type === 'quote'
                    ? '0.5'
                    : '0.7',
            ];
        }

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
}
