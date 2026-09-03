<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        $home = Cache::remember(
            'frontend.home',
            now()->addMinutes(10),
            function () {
                $categories = Category::query()
                    ->select([
                        'id',
                        'name',
                        'slug',
                    ])
                    ->active()
                    ->orderBy('name')
                    ->get()
                    ->keyBy('id');

                $trendingPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'featured_image',
                        'published_at',
                    ])
                    ->published()
                    ->where('content_type', '!=', 'quote')
                    ->orderByDesc('published_at')
                    ->limit(6)
                    ->get();

                $quotes = Content::query()
                    ->select([
                        'id',
                        'title',
                        'slug',
                        'quote_author',
                        'published_at',
                    ])
                    ->published()
                    ->where('content_type', 'quote')
                    ->orderByDesc('published_at')
                    ->limit(5)
                    ->get();

                $featuredPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                        'is_featured',
                    ])
                    ->featured()
                    ->orderByDesc('published_at')
                    ->limit(2)
                    ->get();


                $featuredSmallPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'featured_image',
                        'published_at',
                    ])
                    ->published()
                    ->where('content_type', '!=', 'quote')
                    ->orderByDesc('published_at')
                    ->limit(4)
                    ->get();


                $recentPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                    ])
                    ->published()
                    ->where('content_type', '!=', 'quote')
                    ->orderByDesc('published_at')
                    ->limit(6)
                    ->get();


                $popularPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'featured_image',
                        'published_at',
                        'views_count',
                    ])
                    ->published()
                    ->where('content_type', '!=', 'quote')
                    ->orderByDesc('views_count')
                    ->orderByDesc('published_at')
                    ->limit(4)
                    ->get();


                $sportsPosts = $this->categoryPosts(
                    'sports',
                    5
                );


                $lifestylePosts = $this->categoryPosts(
                    'lifestyle',
                    6
                );


                $technologyPosts = $this->categoryPosts(
                    'technology',
                    4
                );

                $latestPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'author_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                    ])
                    ->published()
                    ->where('content_type', '!=', 'quote')
                    ->orderByDesc('published_at')
                    ->limit(3)
                    ->get();


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

                $allPosts = collect()
                    ->merge($trendingPosts)
                    ->merge($featuredPosts)
                    ->merge($featuredSmallPosts)
                    ->merge($recentPosts)
                    ->merge($popularPosts)
                    ->merge($sportsPosts)
                    ->merge($lifestylePosts)
                    ->merge($technologyPosts)
                    ->merge($latestPosts);

                $authorIds = $allPosts
                    ->pluck('author_id')
                    ->filter()
                    ->unique()
                    ->values();

                $authors = collect();

                if ($authorIds->isNotEmpty()) {

                    $authors = User::query()
                        ->select([
                            'id',
                            'name',
                        ])
                        ->whereIn('id', $authorIds)
                        ->get()
                        ->keyBy('id');
                }

                $attachRelations = function (Collection $posts) use (
                    $categories,
                    $authors
                ) {

                    return $posts->each(function ($post) use (
                        $categories,
                        $authors
                    ) {

                        $post->setRelation(
                            'category',
                            $categories->get($post->category_id)
                        );

                        $post->setRelation(
                            'author',
                            $authors->get($post->author_id)
                        );
                    });
                };


                $trendingPosts      = $attachRelations($trendingPosts);
                $featuredPosts      = $attachRelations($featuredPosts);
                $featuredSmallPosts = $attachRelations($featuredSmallPosts);
                $recentPosts        = $attachRelations($recentPosts);
                $popularPosts       = $attachRelations($popularPosts);
                $sportsPosts        = $attachRelations($sportsPosts);
                $lifestylePosts     = $attachRelations($lifestylePosts);
                $technologyPosts    = $attachRelations($technologyPosts);
                $latestPosts        = $attachRelations($latestPosts);

                return [
                    'categories'        => $categories,
                    'quotes'            => $quotes,
                    'trendingPosts'     => $trendingPosts,
                    'featuredPosts'     => $featuredPosts,
                    'featuredSmallPosts' => $featuredSmallPosts,
                    'recentPosts'       => $recentPosts,
                    'popularPosts'      => $popularPosts,
                    'sportsPosts'       => $sportsPosts,
                    'lifestylePosts'    => $lifestylePosts,
                    'technologyPosts'   => $technologyPosts,
                    'latestPosts'       => $latestPosts,
                    'tags'              => $tags,
                ];
            }
        );

        return view('frontend.home', $home);
    }


    /**
     * Get posts for a category.
     */
    private function categoryPosts(string $slug, int $limit): Collection
    {
        return Content::query()
            ->select([
                'contents.id',
                'contents.category_id',
                'contents.author_id',
                'contents.title',
                'contents.slug',
                'contents.content_type',
                'contents.excerpt',
                'contents.featured_image',
                'contents.published_at',
            ])
            ->published()
            ->where('content_type', '!=', 'quote')
            ->whereHas('category', function ($query) use ($slug) {
                $query
                    ->active()
                    ->where('slug', $slug);
            })
            ->orderByDesc('published_at')
            ->limit($limit)
            ->get();
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


        // $previousContent = Content::query()
        //     ->published()
        //     ->where(function ($query) use ($content) {
        //         $query
        //             ->where('published_at', '<', $content->published_at ?? now())
        //             ->orWhere(function ($query) use ($content) {
        //                 $query
        //                     ->where('published_at', $content->published_at)
        //                     ->where('id', '<', $content->id);
        //             });
        //     })
        //     ->latest('published_at')
        //     ->latest('id')
        //     ->first([
        //         'id',
        //         'title',
        //         'slug',
        //     ]);


        // $nextContent = Content::query()
        //     ->published()
        //     ->where(function ($query) use ($content) {
        //         $query
        //             ->where('published_at', '>', $content->published_at ?? now())
        //             ->orWhere(function ($query) use ($content) {
        //                 $query
        //                     ->where('published_at', $content->published_at)
        //                     ->where('id', '>', $content->id);
        //             });
        //     })
        //     ->oldest('published_at')
        //     ->oldest('id')
        //     ->first([
        //         'id',
        //         'title',
        //         'slug',
        //     ]);


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
            // 'previousContent',
            // 'nextContent',
            'latestPosts',
            'popularPosts',
            'sidebarTags'
        ));
    }
}
