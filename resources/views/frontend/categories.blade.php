@extends('frontend.layouts.master')

@section('content')

<div class="container">

    {{-- PAGE HEADER --}}
    <div class="row">
        <div class="col-lg-12">

            <div class="section-title">

                <h1>All Categories</h1>

                <p>
                    Explore all categories and discover the latest
                    articles, stories and insights.
                </p>

            </div>

        </div>
    </div>


    {{-- CATEGORIES --}}
    <div class="row">

        @forelse($categories as $category)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="category-card">

                    <div class="category-card-content">

                        <h2 class="category-title">

                            <a href="{{ route('category.show', $category->slug) }}">

                                {{ $category->name }}

                            </a>

                        </h2>


                        @if($category->description)

                            <p class="category-description">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($category->description),
                                    120
                                ) }}

                            </p>

                        @endif


                        <div class="category-meta">

                            <span>
                                {{ $category->published_contents_count }}
                                {{ \Illuminate\Support\Str::plural('Post', $category->published_contents_count) }}
                            </span>

                        </div>


                        <a
                            href="{{ route('category.show', $category->slug) }}"
                            class="category-link"
                        >
                            Explore Category →
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-lg-12">

                <div class="text-center py-5">

                    <h2>No Categories Found</h2>

                    <p>
                        There are currently no active categories.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection
