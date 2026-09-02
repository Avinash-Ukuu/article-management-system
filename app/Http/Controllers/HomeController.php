<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        $homeData = Cache::remember('frontend.home',now()->addMinutes(10),
            function () {
                $featuredPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                    ])->featured()->with('category:id,name,slug')->orderByDesc('published_at')->limit(5)->get();


                $recentPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                    ])->published()->with('category:id,name,slug')->orderByDesc('published_at')->limit(15)->get();


                $popularPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                        'views_count',
                    ])->published()->with('category:id,name,slug')->orderByDesc('views_count')->orderByDesc('published_at')->limit(5)->get();

                $categories = Category::query()
                    ->select([
                        'id',
                        'name',
                        'slug',
                    ])->active()->orderBy('name')->get();

                $categoryIds = $categories->pluck('id');

                $categoryPosts = Content::query()
                    ->select([
                        'id',
                        'category_id',
                        'title',
                        'slug',
                        'content_type',
                        'excerpt',
                        'featured_image',
                        'published_at',
                    ])->published()->whereIn('category_id', $categoryIds)->with('category:id,name,slug')->orderByDesc('published_at')
                    ->limit(50)->get()->groupBy('category_id');

                $categorySections = $categories->map(function ($category) use ($categoryPosts) {
                                            $posts = $categoryPosts
                                                ->get($category->id, collect())
                                                ->take(5)
                                                ->values();

                                            return [
                                                'category' => $category,
                                                'posts' => $posts,
                                            ];
                                        })
                                        ->filter(function ($section) {
                                            return $section['posts']->isNotEmpty();
                                        })->values();


                return [
                    'featuredPosts'    => $featuredPosts,
                    'recentPosts'      => $recentPosts,
                    'popularPosts'     => $popularPosts,
                    'categories'       => $categories,
                    'categorySections' => $categorySections,
                ];
            }
        );

        dd($homeData);


        return view('frontend.home', $homeData);
    }
}
