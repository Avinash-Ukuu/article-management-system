@extends('frontend.layouts.master')
@section('content')
    @php
        $defaultImage = asset('assets/frontend/images/newsimage8.png');
        $imageUrl = function ($post) use ($defaultImage) {
            if (!$post->featured_image) {
                return $defaultImage;
            }
            if (filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
                return $post->featured_image;
            }
            return asset('uploads/contents/' . ltrim($post->featured_image, '/'));
        };

        $postUrl = function ($post) {
            return route('content.show', $post->slug);
        };

        $categoryUrl = function ($category) {
            return route('category.show', $category->slug);
        };

        $tagUrl = function ($tag) {
            return route('tag.show', $tag->slug);
        };
    @endphp

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapp__list__article-responsive wrapp__list__article-responsive-carousel">
                        @forelse ($trendingPosts as $post)
                            <div class="item">
                                <div class="card__post card__post-list">
                                    <div class="image-sm">
                                        <a href="{{ $postUrl($post) }}">
                                            <img src="{{ $imageUrl($post) }}" class="img-fluid" alt="{{ $post->title }}"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="card__post__body">
                                        <div class="card__post__content">
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    @if ($post->author)
                                                        <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                by {{ $post->author->name }}
                                                            </span>
                                                        </li>
                                                    @endif
                                                    @if ($post->published_at)
                                                        <li class="list-inline-item">
                                                            <span class="text-dark text-capitalize">
                                                                {{ $post->published_at->format('F d, Y') }}
                                                            </span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="card__post__title">
                                                <h6>
                                                    <a href="{{ $postUrl($post) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="item">
                                <div class="card__post">
                                    <div class="card__post__body">
                                        <div class="card__post__content">
                                            <h6>No trending posts available.</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END TRENDING NEWS --}}

    <section>
        <div class="popular__news-header">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card__post-carousel">
                            @foreach ($popularPosts->take(2) as $post)
                                <div class="item">
                                    <div class="card__post">
                                        <div class="card__post__body">
                                            <a href="{{ $postUrl($post) }}">
                                                <img src="{{ $imageUrl($post) }}" class="img-fluid"
                                                    alt="{{ $post->title }}">
                                            </a>
                                            <div class="card__post__content bg__post-cover">
                                                @if ($post->category)
                                                    <div class="card__post__category">
                                                        {{ $post->category->name }}
                                                    </div>
                                                @endif

                                                <div class="card__post__title">
                                                    <h2>
                                                        <a href="{{ $postUrl($post) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h2>
                                                </div>

                                                <div class="card__post__author-info">

                                                    <ul class="list-inline">

                                                        @if ($post->author)
                                                            <li class="list-inline-item">
                                                                <a href="#">
                                                                    by {{ $post->author->name }}
                                                                </a>
                                                            </li>
                                                        @endif

                                                        @if ($post->published_at)
                                                            <li class="list-inline-item">
                                                                <span>
                                                                    {{ $post->published_at->format('F d, Y') }}
                                                                </span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="popular__news-right">
                            @foreach ($popularPosts->slice(2, 2) as $post)
                                <div class="card__post">

                                    <div class="card__post__body card__post__transition">

                                        <a href="{{ $postUrl($post) }}">
                                            <img src="{{ $imageUrl($post) }}" class="img-fluid" alt="{{ $post->title }}">
                                        </a>

                                        <div class="card__post__content bg__post-cover">

                                            @if ($post->category)
                                                <div class="card__post__category">
                                                    {{ $post->category->name }}
                                                </div>
                                            @endif

                                            <div class="card__post__title">

                                                <h5>
                                                    <a href="{{ $postUrl($post) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>

                                            </div>

                                            <div class="card__post__author-info">

                                                <ul class="list-inline">

                                                    @if ($post->author)
                                                        <li class="list-inline-item">
                                                            <a href="#">
                                                                by {{ $post->author->name }}
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if ($post->published_at)
                                                        <li class="list-inline-item">
                                                            <span>
                                                                {{ $post->published_at->format('F d, Y') }}
                                                            </span>
                                                        </li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- POPULAR CAROUSEL --}}
        <div class="popular__news-header-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top__news__slider">
                            @foreach ($popularPosts as $post)
                                <div class="item">
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="{{ $postUrl($post) }}">
                                                <img src="{{ $imageUrl($post) }}" alt="{{ $post->title }}"
                                                    class="img-fluid" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <ul class="list-inline">
                                                @if ($post->author)
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $post->author->name }}
                                                        </span>
                                                    </li>
                                                @endif

                                                @if ($post->published_at)
                                                    <li class="list-inline-item">
                                                        <span>
                                                            {{ $post->published_at->format('F d, Y') }}
                                                        </span>
                                                    </li>
                                                @endif

                                            </ul>
                                            <h5>
                                                <a href="{{ $postUrl($post) }}">
                                                    {{ $post->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END POPULAR NEWS --}}


    @foreach ($categories as $category)
        @php
            $posts = $category->homepagePosts ?? collect();
        @endphp

        @if ($posts->isNotEmpty())
            <section class="{{ $loop->first ? 'pt-0' : 'mt-4' }}">
                <div class="popular__section-news">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-12 col-lg-8">
                                <aside class="wrapper__list__article mb-0">
                                    <h4 class="border_section">
                                        {{ $category->name }}
                                    </h4>

                                    {{-- FIRST 2 FEATURED POSTS --}}
                                    <div class="row">
                                        @foreach ($posts->take(2) as $post)
                                            <div class="col-sm-12 col-md-6 mb-4">
                                                <div class="card__post">
                                                    <div class="card__post__body card__post__transition">
                                                        <a href="{{ $postUrl($post) }}">
                                                            <img src="{{ $imageUrl($post) }}" class="img-fluid"
                                                                alt="{{ $post->title }}" loading="lazy">
                                                        </a>
                                                        <div class="card__post__content bg__post-cover">
                                                            <div class="card__post__category">
                                                                {{ $category->name }}
                                                            </div>
                                                            <div class="card__post__title">
                                                                <h5>
                                                                    <a href="{{ $postUrl($post) }}">
                                                                        {{ $post->title }}
                                                                    </a>
                                                                </h5>
                                                            </div>

                                                            <div class="card__post__author-info">
                                                                <ul class="list-inline">
                                                                    @if ($post->author)
                                                                        <li class="list-inline-item">
                                                                            <a href="#">
                                                                                by {{ $post->author->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                    @if ($post->published_at)
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                {{ $post->published_at->format('F d, Y') }}
                                                                            </span>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    @if ($posts->skip(2)->isNotEmpty())
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="wrapp__list__article-responsive">
                                                    @foreach ($posts->skip(2)->take(2) as $post)
                                                        <div class="mb-3">
                                                            <div class="card__post card__post-list">
                                                                <div class="image-sm">
                                                                    <a href="{{ $postUrl($post) }}">
                                                                        <img src="{{ $imageUrl($post) }}"
                                                                            class="img-fluid" alt="{{ $post->title }}"
                                                                            loading="lazy">
                                                                    </a>
                                                                </div>

                                                                <div class="card__post__body">
                                                                    <div class="card__post__content">
                                                                        <div class="card__post__author-info mb-2">
                                                                            <ul class="list-inline">
                                                                                @if ($post->author)
                                                                                    <li class="list-inline-item">
                                                                                        <span class="text-primary">
                                                                                            by {{ $post->author->name }}
                                                                                        </span>
                                                                                    </li>
                                                                                @endif

                                                                                @if ($post->published_at)
                                                                                    <li class="list-inline-item">
                                                                                        <span
                                                                                            class="text-dark text-capitalize">
                                                                                            {{ $post->published_at->format('F d, Y') }}
                                                                                        </span>
                                                                                    </li>
                                                                                @endif
                                                                            </ul>
                                                                        </div>

                                                                        <div class="card__post__title">
                                                                            <h6>
                                                                                <a href="{{ $postUrl($post) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </aside>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <aside class="wrapper__list__article">
                                    <h4 class="border_section">
                                        Popular Post
                                    </h4>
                                    <div class="wrapper__list-number">
                                        @foreach ($popularPosts->take(4) as $index => $popular)
                                            <div class="card__post__list">
                                                <div class="list-number">
                                                    <span>
                                                        {{ $index + 1 }}
                                                    </span>
                                                </div>
                                                @if ($popular->category)
                                                    <a href="{{ $categoryUrl($popular->category) }}" class="category">
                                                        {{ $popular->category->name }}
                                                    </a>
                                                @endif
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <h5>
                                                            <a href="{{ $postUrl($popular) }}">
                                                                {{ $popular->title }}
                                                            </a>
                                                        </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    {{-- END DYNAMIC CATEGORY SECTIONS --}}

    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">

                    @if ($quotes->isNotEmpty())
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                Quotes
                            </h4>
                            <div class="article__entry-carousel">

                                @foreach ($quotes as $quote)
                                    <div class="item">
                                        <div class="article__entry">
                                            <div class="article__content">
                                                <ul class="list-inline">
                                                    @if ($quote->published_at)
                                                        <li class="list-inline-item">
                                                            <span>
                                                                {{ $quote->published_at->format('F d, Y') }}
                                                            </span>
                                                        </li>
                                                    @endif
                                                </ul>
                                                <h5>
                                                    <a href="{{ $postUrl($quote) }}">
                                                        {{ $quote->title }}
                                                    </a>
                                                </h5>
                                                @if ($quote->quote_author)
                                                    <p class="text-primary mb-0">
                                                        — {{ $quote->quote_author }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    @endif


                    @if ($trendingPosts->isNotEmpty())
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                Latest Post
                            </h4>
                            <div class="wrapper__list__article-small">
                                @foreach ($trendingPosts->take(4) as $post)
                                    <div class="mb-3">
                                        <div class="card__post card__post-list">
                                            <div class="image-sm">
                                                <a href="{{ $postUrl($post) }}">
                                                    <img src="{{ $imageUrl($post) }}" class="img-fluid"
                                                        alt="{{ $post->title }}" loading="lazy">
                                                </a>
                                            </div>
                                            <div class="card__post__body">
                                                <div class="card__post__content">
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            @if ($post->author)
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $post->author->name }}
                                                                    </span>
                                                                </li>
                                                            @endif
                                                            @if ($post->published_at)
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ $post->published_at->format('F d, Y') }}
                                                                    </span>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h6>
                                                            <a href="{{ $postUrl($post) }}">
                                                                {{ $post->title }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    @endif
                </div>


                {{-- ====================================================
                    RIGHT SIDEBAR
                ==================================================== --}}
                <div class="col-md-12 col-lg-4">
                    <div class="sidebar-sticky">
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                Popular Post
                            </h4>
                            <div class="wrapper__list-number">
                                @foreach ($popularPosts as $index => $post)
                                    <div class="card__post__list">
                                        <div class="list-number">
                                            <span>
                                                {{ $index + 1 }}
                                            </span>
                                        </div>


                                        @if ($post->category)
                                            <a href="{{ $categoryUrl($post->category) }}" class="category">
                                                {{ $post->category->name }}
                                            </a>
                                        @endif

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <h5>
                                                    <a href="{{ $postUrl($post) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </aside>

                        {{-- <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                Stay Connected
                            </h4>

                            <div class="wrap__social__media">

                                <a href="#" target="_blank" rel="noopener">

                                    <div class="social__media__widget facebook">

                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-facebook"></i>
                                        </span>

                                        <span class="social__media__widget-counter">
                                            19,243 fans
                                        </span>

                                        <span class="social__media__widget-name">
                                            like
                                        </span>

                                    </div>

                                </a>


                                <a href="#" target="_blank" rel="noopener">

                                    <div class="social__media__widget twitter">

                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-twitter"></i>
                                        </span>

                                        <span class="social__media__widget-counter">
                                            2.076 followers
                                        </span>

                                        <span class="social__media__widget-name">
                                            follow
                                        </span>

                                    </div>

                                </a>


                                <a href="#" target="_blank" rel="noopener">

                                    <div class="social__media__widget youtube">

                                        <span class="social__media__widget-icon">
                                            <i class="fa fa-youtube"></i>
                                        </span>

                                        <span class="social__media__widget-counter">
                                            15,200 followers
                                        </span>

                                        <span class="social__media__widget-name">
                                            subscribe
                                        </span>

                                    </div>

                                </a>

                            </div>

                        </aside> --}}

                        @if ($tags->isNotEmpty())
                            <aside class="wrapper__list__article">
                                <h4 class="border_section">
                                    Tags
                                </h4>
                                <div class="blog-tags p-0">
                                    <ul class="list-inline">
                                        @foreach ($tags as $tag)
                                            <li class="list-inline-item">
                                                <a href="{{ $tagUrl($tag) }}">
                                                    #{{ $tag->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        @endif


                        {{-- ====================================================
                            ADVERTISE
                        ==================================================== --}}
                        <aside class="wrapper__list__article">

                            <h4 class="border_section">
                                Advertise
                            </h4>

                            <a href="#">

                                <figure>

                                    <img src="{{ asset('assets/frontend/images/banner2.jpg') }}" alt="Advertisement"
                                        class="img-fluid" loading="lazy">

                                </figure>

                            </a>

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
