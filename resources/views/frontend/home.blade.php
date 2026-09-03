@extends('frontend.layouts.master')
@section('content')
    @php
        $postUrl = fn($post) => route('content.show', $post->slug);
        $imageUrl = function ($post) {
            return $post->featured_image
                ? asset('uploads/contents/' . $post->featured_image)
                : asset('assets/frontend/images/news1.jpg');
        };
    @endphp
    {{-- @if ($quotes->isNotEmpty())
        <section class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrapp__list__article-responsive quote-slider">
                            @foreach ($quotes as $quote)
                                <div class="item">
                                    <div class="card__post card__post-list">
                                        <div class="card__post__body">
                                            <div class="card__post__content">
                                                <div class="card__post__title">
                                                    <h6>
                                                        <a href="{{ $postUrl($quote) }}">
                                                            “{{ $quote->title }}”
                                                        </a>
                                                    </h6>
                                                </div>
                                                @if ($quote->quote_author)
                                                    <div class="card__post__author-info">
                                                        <span class="text-primary">
                                                            — {{ $quote->quote_author }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

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
                                            <img
                                                src="{{ $imageUrl($post) }}"
                                                class="img-fluid"
                                                alt="{{ $post->title }}"
                                                loading="lazy"
                                                decoding="async"
                                            >
                                        </a>
                                    </div>
                                    <div class="card__post__body">
                                        <div class="card__post__content">
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $post->author?->name ?? 'Admin' }}
                                                        </span>
                                                    </li>
                                                    @if ($post->published_at)
                                                        <li class="list-inline-item">
                                                            <span class="text-dark text-capitalize">
                                                                {{ $post->published_at->format('M d, Y') }}
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
                                <p class="mb-0">
                                    No trending posts available.
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- =========================================================
        POPULAR / FEATURED NEWS
    ========================================================== --}}
    <section>

        {{-- =====================================================
            MAIN FEATURED HEADER
        ====================================================== --}}

        <div class="popular__news-header">

            <div class="container">

                <div class="row no-gutters">

                    {{-- =================================================
                        MAIN HERO
                    ================================================== --}}

                    <div class="col-md-8">

                        <div class="card__post-carousel">

                            @forelse ($featuredPosts as $post)

                                <div class="item">

                                    <div class="card__post">

                                        <div class="card__post__body">

                                            <a href="{{ $postUrl($post) }}">

                                                <img
                                                    src="{{ $imageUrl($post) }}"
                                                    class="img-fluid"
                                                    alt="{{ $post->title }}"
                                                    @if ($loop->first)
                                                        fetchpriority="high"
                                                    @else
                                                        loading="lazy"
                                                    @endif
                                                    decoding="async"
                                                >

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

                                                        <li class="list-inline-item">

                                                            <a href="#">

                                                                by {{ $post->author?->name ?? 'Admin' }}

                                                            </a>

                                                        </li>

                                                        @if ($post->published_at)

                                                            <li class="list-inline-item">

                                                                <span>

                                                                    {{ $post->published_at->format('M d, Y') }}

                                                                </span>

                                                            </li>

                                                        @endif

                                                    </ul>

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

                                                <h2>
                                                    No featured content available.
                                                </h2>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endforelse

                        </div>

                    </div>


                    {{-- =================================================
                        RIGHT FEATURED POSTS
                    ================================================== --}}

                    <div class="col-md-4">

                        <div class="popular__news-right">

                            @foreach ($featuredSmallPosts->take(2) as $post)

                                <div class="card__post">

                                    <div class="card__post__body card__post__transition">

                                        <a href="{{ $postUrl($post) }}">

                                            <img
                                                src="{{ $imageUrl($post) }}"
                                                class="img-fluid"
                                                alt="{{ $post->title }}"
                                                loading="lazy"
                                                decoding="async"
                                            >

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

                                                    <li class="list-inline-item">

                                                        <a href="#">

                                                            by {{ $post->author?->name ?? 'Admin' }}

                                                        </a>

                                                    </li>

                                                    @if ($post->published_at)

                                                        <li class="list-inline-item">

                                                            <span>

                                                                {{ $post->published_at->format('M d, Y') }}

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


        {{-- =====================================================
            FEATURED SMALL CAROUSEL
        ====================================================== --}}

        <div class="popular__news-header-carousel">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="top__news__slider">

                            @foreach ($featuredSmallPosts as $post)

                                <div class="item">

                                    <div class="article__entry">

                                        <div class="article__image">

                                            <a href="{{ $postUrl($post) }}">

                                                <img
                                                    src="{{ $imageUrl($post) }}"
                                                    alt="{{ $post->title }}"
                                                    class="img-fluid"
                                                    loading="lazy"
                                                    decoding="async"
                                                >

                                            </a>

                                        </div>

                                        <div class="article__content">

                                            <ul class="list-inline">

                                                <li class="list-inline-item">

                                                    <span class="text-primary">

                                                        by {{ $post->author?->name ?? 'Admin' }}

                                                    </span>

                                                </li>

                                                @if ($post->published_at)

                                                    <li class="list-inline-item">

                                                        <span>

                                                            {{ $post->published_at->format('M d, Y') }}

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


    {{-- =========================================================
        RECENT POSTS + POPULAR POSTS
    ========================================================== --}}
    <section class="pt-0">

        <div class="popular__section-news">

            <div class="container">

                <div class="row">

                    {{-- =================================================
                        RECENT POSTS
                    ================================================== --}}

                    <div class="col-md-12 col-lg-8">

                        <div class="wrapper__list__article">

                            <h4 class="border_section">
                                Recent Post
                            </h4>

                        </div>

                        <div class="row">

                            @foreach ($recentPosts as $post)

                                <div class="col-sm-12 col-md-6 mb-4">

                                    <div class="card__post">

                                        <div class="card__post__body card__post__transition">

                                            <a href="{{ $postUrl($post) }}">

                                                <img
                                                    src="{{ $imageUrl($post) }}"
                                                    class="img-fluid"
                                                    alt="{{ $post->title }}"
                                                    loading="lazy"
                                                    decoding="async"
                                                >

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

                                                        <li class="list-inline-item">

                                                            <a href="#">

                                                                by {{ $post->author?->name ?? 'Admin' }}

                                                            </a>

                                                        </li>

                                                        @if ($post->published_at)

                                                            <li class="list-inline-item">

                                                                <span>

                                                                    {{ $post->published_at->format('M d, Y') }}

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


                    {{-- =================================================
                        POPULAR POSTS
                    ================================================== --}}

                    <div class="col-md-12 col-lg-4">

                        <aside class="wrapper__list__article">

                            <h4 class="border_section">
                                Popular Post
                            </h4>

                            <div class="wrapper__list-number">

                                @foreach ($popularPosts as $post)

                                    <div class="card__post__list">

                                        <div class="list-number">

                                            <span>

                                                {{ $loop->iteration }}

                                            </span>

                                        </div>

                                        @if ($post->category)

                                            <a
                                                href="{{ route('category.show', $post->category->slug) }}"
                                                class="category"
                                            >

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

                    </div>

                </div>


                {{-- =====================================================
                    SPORTS
                ====================================================== --}}

                <div class="row">

                    <div class="col-md-12">

                        <aside class="wrapper__list__article">

                            <h4 class="border_section">
                                Sports
                            </h4>

                        </aside>

                    </div>

                    <div class="col-md-12">

                        <div class="article__entry-carousel">

                            @foreach ($sportsPosts as $post)

                                <div class="item">

                                    <div class="article__entry">

                                        <div class="article__image">

                                            <a href="{{ $postUrl($post) }}">

                                                <img
                                                    src="{{ $imageUrl($post) }}"
                                                    alt="{{ $post->title }}"
                                                    class="img-fluid"
                                                    loading="lazy"
                                                    decoding="async"
                                                >

                                            </a>

                                        </div>

                                        <div class="article__content">

                                            <ul class="list-inline">

                                                <li class="list-inline-item">

                                                    <span class="text-primary">

                                                        by {{ $post->author?->name ?? 'Admin' }}

                                                    </span>

                                                </li>

                                                @if ($post->published_at)

                                                    <li class="list-inline-item">

                                                        <span>

                                                            {{ $post->published_at->format('M d, Y') }}

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


            {{-- =========================================================
                LIFESTYLE + TECHNOLOGY + LATEST SIDEBAR
            ========================================================== --}}

            <div class="mt-4">

                <div class="container">

                    <div class="row">

                        {{-- =================================================
                            LEFT CONTENT
                        ================================================== --}}

                        <div class="col-md-8">

                            {{-- =================================================
                                LIFESTYLE
                            ================================================== --}}

                            <aside class="wrapper__list__article mb-0">

                                <h4 class="border_section">
                                    Lifestyle
                                </h4>

                                <div class="row">

                                    @foreach ($lifestylePosts as $post)

                                        <div class="col-md-6">

                                            <div class="mb-4">

                                                <div class="article__entry">

                                                    <div class="article__image">

                                                        <a href="{{ $postUrl($post) }}">

                                                            <img
                                                                src="{{ $imageUrl($post) }}"
                                                                alt="{{ $post->title }}"
                                                                class="img-fluid"
                                                                loading="lazy"
                                                                decoding="async"
                                                            >

                                                        </a>

                                                    </div>

                                                    <div class="article__content">

                                                        <ul class="list-inline">

                                                            <li class="list-inline-item">

                                                                <span class="text-primary">

                                                                    by {{ $post->author?->name ?? 'Admin' }}

                                                                </span>

                                                            </li>

                                                            @if ($post->published_at)

                                                                <li class="list-inline-item">

                                                                    <span>

                                                                        {{ $post->published_at->format('M d, Y') }}

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

                                        </div>

                                    @endforeach

                                </div>

                            </aside>


                            {{-- =================================================
                                TECHNOLOGY
                            ================================================== --}}

                            <aside class="wrapper__list__article">

                                <h4 class="border_section">
                                    Technology
                                </h4>

                                <div class="wrapp__list__article-responsive">

                                    @foreach ($technologyPosts as $post)

                                        <div class="card__post card__post-list card__post__transition mt-30">

                                            <div class="row">

                                                <div class="col-md-5">

                                                    <div class="card__post__transition">

                                                        <a href="{{ $postUrl($post) }}">

                                                            <img
                                                                src="{{ $imageUrl($post) }}"
                                                                class="img-fluid w-100"
                                                                alt="{{ $post->title }}"
                                                                loading="lazy"
                                                                decoding="async"
                                                            >

                                                        </a>

                                                    </div>

                                                </div>

                                                <div class="col-md-7 my-auto pl-0">

                                                    <div class="card__post__body">

                                                        <div class="card__post__content">

                                                            @if ($post->category)

                                                                <div class="card__post__category">

                                                                    {{ $post->category->name }}

                                                                </div>

                                                            @endif

                                                            <div class="card__post__author-info mb-2">

                                                                <ul class="list-inline">

                                                                    <li class="list-inline-item">

                                                                        <span class="text-primary">

                                                                            by {{ $post->author?->name ?? 'Admin' }}

                                                                        </span>

                                                                    </li>

                                                                    @if ($post->published_at)

                                                                        <li class="list-inline-item">

                                                                            <span class="text-dark text-capitalize">

                                                                                {{ $post->published_at->format('M d, Y') }}

                                                                            </span>

                                                                        </li>

                                                                    @endif

                                                                </ul>

                                                            </div>

                                                            <div class="card__post__title">

                                                                <h5>

                                                                    <a href="{{ $postUrl($post) }}">

                                                                        {{ $post->title }}

                                                                    </a>

                                                                </h5>

                                                                @if ($post->excerpt)

                                                                    <p class="d-none d-lg-block d-xl-block mb-0">

                                                                        {{ \Illuminate\Support\Str::limit($post->excerpt, 130) }}

                                                                    </p>

                                                                @endif

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </aside>

                        </div>


                        {{-- =================================================
                            RIGHT SIDEBAR
                        ================================================== --}}

                        <div class="col-md-4">

                            <div class="sidebar-sticky">

                                {{-- =================================================
                                    LATEST POST
                                ================================================== --}}

                                <aside class="wrapper__list__article">

                                    <h4 class="border_section">
                                        Latest Post
                                    </h4>

                                    @if ($latestPosts->isNotEmpty())

                                        @php
                                            $latestMain = $latestPosts->first();
                                            $latestSmall = $latestPosts->skip(1);
                                        @endphp


                                        {{-- Main Latest Post --}}

                                        <div class="wrapper__list__article-small">

                                            <div class="article__entry">

                                                <div class="article__image">

                                                    <a href="{{ $postUrl($latestMain) }}">

                                                        <img
                                                            src="{{ $imageUrl($latestMain) }}"
                                                            alt="{{ $latestMain->title }}"
                                                            class="img-fluid"
                                                            loading="lazy"
                                                            decoding="async"
                                                        >

                                                    </a>

                                                </div>

                                                <div class="article__content">

                                                    @if ($latestMain->category)

                                                        <div class="article__category">

                                                            {{ $latestMain->category->name }}

                                                        </div>

                                                    @endif

                                                    <ul class="list-inline">

                                                        <li class="list-inline-item">

                                                            <span class="text-primary">

                                                                by {{ $latestMain->author?->name ?? 'Admin' }}

                                                            </span>

                                                        </li>

                                                        @if ($latestMain->published_at)

                                                            <li class="list-inline-item">

                                                                <span class="text-dark text-capitalize">

                                                                    {{ $latestMain->published_at->format('M d, Y') }}

                                                                </span>

                                                            </li>

                                                        @endif

                                                    </ul>

                                                    <h5>

                                                        <a href="{{ $postUrl($latestMain) }}">

                                                            {{ $latestMain->title }}

                                                        </a>

                                                    </h5>

                                                    @if ($latestMain->excerpt)

                                                        <p>

                                                            {{ \Illuminate\Support\Str::limit($latestMain->excerpt, 160) }}

                                                        </p>

                                                    @endif

                                                    <a
                                                        href="{{ $postUrl($latestMain) }}"
                                                        class="btn btn-outline-primary mb-4 text-capitalize"
                                                    >

                                                        Read More

                                                    </a>

                                                </div>

                                            </div>

                                        </div>


                                        {{-- Small Latest Posts --}}

                                        @foreach ($latestSmall as $post)

                                            <div class="mb-3">

                                                <div class="card__post card__post-list">

                                                    <div class="image-sm">

                                                        <a href="{{ $postUrl($post) }}">

                                                            <img
                                                                src="{{ $imageUrl($post) }}"
                                                                class="img-fluid"
                                                                alt="{{ $post->title }}"
                                                                loading="lazy"
                                                                decoding="async"
                                                            >

                                                        </a>

                                                    </div>

                                                    <div class="card__post__body">

                                                        <div class="card__post__content">

                                                            <div class="card__post__author-info mb-2">

                                                                <ul class="list-inline">

                                                                    <li class="list-inline-item">

                                                                        <span class="text-primary">

                                                                            by {{ $post->author?->name ?? 'Admin' }}

                                                                        </span>

                                                                    </li>

                                                                    @if ($post->published_at)

                                                                        <li class="list-inline-item">

                                                                            <span class="text-dark text-capitalize">

                                                                                {{ $post->published_at->format('M d, Y') }}

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

                                    @else

                                        <p>
                                            No latest posts available.
                                        </p>

                                    @endif

                                </aside>


                                {{-- =================================================
                                    SOCIAL MEDIA
                                ================================================== --}}

                                <aside class="wrapper__list__article">

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

                                                    Like

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

                                                    Follow

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

                                                    Subscribe

                                                </span>

                                            </div>

                                        </a>

                                    </div>

                                </aside>


                                {{-- =================================================
                                    TAGS
                                ================================================== --}}

                                <aside class="wrapper__list__article">

                                    <h4 class="border_section">
                                        Tags
                                    </h4>

                                    <div class="blog-tags p-0">

                                        <ul class="list-inline">

                                            @forelse ($tags as $tag)

                                                <li class="list-inline-item">

                                                    <a href="{{ route('tag.show', $tag->slug) }}">

                                                        #{{ $tag->name }}

                                                    </a>

                                                </li>

                                            @empty

                                                <li class="list-inline-item">

                                                    <span>
                                                        No tags available.
                                                    </span>

                                                </li>

                                            @endforelse

                                        </ul>

                                    </div>

                                </aside>


                                {{-- =================================================
                                    ADVERTISEMENT
                                ================================================== --}}

                                <aside class="wrapper__list__article">

                                    <h4 class="border_section">
                                        Advertise
                                    </h4>

                                    <a href="#">

                                        <figure>

                                            <img
                                                src="{{ asset('assets/frontend/images/banner2.jpg') }}"
                                                alt="Advertisement"
                                                class="img-fluid"
                                                loading="lazy"
                                                decoding="async"
                                            >

                                        </figure>

                                    </a>

                                </aside>


                                {{-- =================================================
                                    NEWSLETTER
                                ================================================== --}}

                                <aside class="wrapper__list__article">

                                    <h4 class="border_section">
                                        Newsletter
                                    </h4>

                                    <div class="widget__form-subscribe bg__card-shadow">

                                        <h6>

                                            The most important world news and events of the day.

                                        </h6>

                                        <p>

                                            <small>

                                                Get our daily newsletter on your inbox.

                                            </small>

                                        </p>

                                        <form
                                            action="#"
                                            method="POST"
                                        >

                                            @csrf

                                            <div class="input-group">

                                                <input
                                                    type="email"
                                                    name="email"
                                                    class="form-control"
                                                    placeholder="Your email address"
                                                    required
                                                >

                                                <div class="input-group-append">

                                                    <button
                                                        class="btn btn-primary"
                                                        type="submit"
                                                    >

                                                        Sign Up

                                                    </button>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </aside>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


@endsection
