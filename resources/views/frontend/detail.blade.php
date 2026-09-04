@extends('frontend.layouts.master')

@section('title', $content->seoMetadata?->meta_title ?: $content->title)
@push('meta')
    <meta name="description" content="{{ $content->seoMetadata?->meta_description ?: $content->excerpt }}">
    @if ($content->seoMetadata?->meta_keywords)
        <meta name="keywords" content="{{ $content->seoMetadata->meta_keywords }}">
    @endif
    <meta name="robots" content="{{ $content->seoMetadata?->robots ?: 'index, follow' }}">
    <link rel="canonical" href="{{ route('content.show', $content->slug) }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $content->seoMetadata?->meta_title ?: $content->title }}">
    <meta property="og:description" content="{{ $content->seoMetadata?->meta_description ?: $content->excerpt }}">
    <meta property="og:url" content="{{ route('content.show', $content->slug) }}">
    @if ($content->featured_image)
        <meta property="og:image" content="{{ asset('uploads/contents/' . $content->featured_image) }}">
    @endif
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $content->seoMetadata?->meta_title ?: $content->title }}">
    <meta name="twitter:description" content="{{ $content->seoMetadata?->meta_description ?: $content->excerpt }}">

@endpush


@section('content')
    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- Breadcrumb --}}
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a class="breadcrumbs__url" href="{{ url('/') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a class="breadcrumbs__url" href="{{ route('category.show', $content->category->slug) }}">
                                {{ $content->category->name }}
                            </a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            {{ $content->title }}
                        </li>
                    </ul>
                </div>

                <div class="col-md-8">
                    <div class="wrap__article-detail">

                        <div class="wrap__article-detail-title">
                            <h1>
                                {{ $content->title }}
                            </h1>
                            @if ($content->excerpt)
                                <h3>
                                    {{ $content->excerpt }}
                                </h3>
                            @endif
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <figure class="image-profile">
                                        <img src="{{ asset('assets/frontend/images/profile.png') }}"
                                            alt="{{ $content->author?->name ?? 'Author' }}">
                                    </figure>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        by
                                    </span>
                                    @if ($content->author)
                                        <span class="text-primary">
                                            {{ $content->author->name }}
                                        </span>
                                    @else
                                        <span class="text-primary">
                                            Admin
                                        </span>
                                    @endif
                                </li>
                                {{-- Date --}}
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ optional($content->published_at)->format('F d, Y') }}
                                    </span>
                                </li>

                                {{-- Category --}}
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        in
                                    </span>
                                    <a href="{{ route('category.show', $content->category->slug) }}">
                                        {{ $content->category->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{-- FEATURED IMAGE --}}
                        @if ($content->featured_image)
                            <div class="wrap__article-detail-image mt-4">
                                <figure>
                                    <img src="{{ asset('uploads/contents/' . $content->featured_image) }}"
                                        alt="{{ $content->title }}" class="img-fluid" loading="eager">
                                </figure>
                            </div>
                        @endif

                        {{-- ARTICLE CONTENT --}}
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ number_format($content->views_count) }}
                                    <span>
                                        views
                                    </span>
                                </div>

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('content.show', $content->slug)) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-facebook-f"></i>
                                            <span>
                                                facebook
                                            </span>
                                        </a>
                                    </li>


                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter"
                                            href="https://twitter.com/intent/tweet?url={{ urlencode(route('content.show', $content->slug)) }}&text={{ urlencode($content->title) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-twitter"></i>
                                            <span>
                                                twitter
                                            </span>
                                        </a>
                                    </li>


                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp"
                                            href="https://api.whatsapp.com/send?text={{ urlencode($content->title . ' ' . route('content.show', $content->slug)) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-whatsapp"></i>
                                            <span>
                                                whatsapp
                                            </span>
                                        </a>
                                    </li>


                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram"
                                            href="https://t.me/share/url?url={{ urlencode(route('content.show', $content->slug)) }}&text={{ urlencode($content->title) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-telegram"></i>
                                            <span>
                                                telegram
                                            </span>
                                        </a>
                                    </li>


                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin"
                                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('content.show', $content->slug)) }}"
                                            target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-linkedin"></i>
                                            <span>
                                                linkedin
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="article-content">
                                {!! $content->content !!}
                            </div>

                            @if ($content->content_type === 'quote' && $content->quote_author)
                                <blockquote class="block-quote">
                                    <p>
                                        {{ $content->title }}
                                    </p>
                                    <cite>
                                        {{ $content->quote_author }}
                                    </cite>
                                </blockquote>
                            @endif


                        </div>

                    </div>

                    @if ($content->tags->isNotEmpty())
                        <div class="blog-tags mb-30">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fa fa-tags"></i>
                                </li>
                                @foreach ($content->tags as $tag)
                                    <li class="list-inline-item">
                                        <a href="{{ route('tag.show', $tag->slug) }}">
                                            #{{ $tag->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- @if ($content->author)
                        <div class="wrap__profile">
                            <div class="wrap__profile-author">
                                <figure>
                                    <img src="{{ asset('assets/frontend/images/profile.png') }}"
                                        alt="{{ $content->author->name }}">
                                </figure>

                                <div class="wrap__profile-author-detail">
                                    <div class="wrap__profile-author-detail-name">
                                        author
                                    </div>
                                    <h4>
                                        {{ $content->author->name }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endif --}}

                    <div class="clearfix"></div>

                    @if ($relatedContents->isNotEmpty())
                        <div class="related-article">
                            <h4>
                                you may also like
                            </h4>

                            <div class="article__entry-carousel-three">
                                @foreach ($relatedContents as $related)
                                    <div class="item">
                                        <div class="article__entry">
                                            {{-- Image --}}
                                            @if ($related->featured_image)
                                                <div class="article__image">
                                                    <a href="{{ route('content.show', $related->slug) }}">
                                                        <img src="{{ asset('uploads/contents/' . $related->featured_image) }}"
                                                            alt="{{ $related->title }}" class="img-fluid"
                                                            loading="lazy">
                                                    </a>
                                                </div>
                                            @endif


                                            <div class="article__content">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by
                                                            {{ $related->author?->name ?? 'Author' }}
                                                        </span>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <span>
                                                            {{ optional($related->published_at)->format('F d, Y') }}
                                                        </span>
                                                    </li>
                                                </ul>
                                                <h5>
                                                    <a href="{{ route('content.show', $related->slug) }}">
                                                        {{ $related->title }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-4">
                    <div class="sidebar-sticky">
                        <aside class="wrapper__list__article">
                            <div class="mb-4">
                                <div class="widget__form-search-bar">
                                    <form action="#" method="GET">
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <input type="text" name="q"
                                                    class="form-control border-secondary border-right-0 rounded-0"
                                                    placeholder="Search" value="{{ request('q') }}">

                                            </div>
                                            <div class="col-auto">
                                                <button
                                                    class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                    type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <h4 class="border_section">
                                latest posts
                            </h4>
                            <div class="wrapper__list__article-small">
                                @foreach ($latestPosts as $latest)
                                    <div class="mb-3">
                                        <div class="card__post card__post-list">
                                            {{-- Image --}}
                                            <div class="image-sm">
                                                <a href="{{ route('content.show', $latest->slug) }}">

                                                    @if ($latest->featured_image)
                                                        <img src="{{ asset('uploads/contents/' . $latest->featured_image) }}"
                                                            class="img-fluid" alt="{{ $latest->title }}" loading="lazy">
                                                    @endif
                                                </a>
                                            </div>

                                            {{-- Body --}}
                                            <div class="card__post__body">
                                                <div class="card__post__content">
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    by
                                                                    {{ $latest->author?->name ?? 'Admin' }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                    {{ optional($latest->published_at)->format('F d, Y') }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="card__post__title">
                                                        <h6>
                                                            <a href="{{ route('content.show', $latest->slug) }}">
                                                                {{ $latest->title }}
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

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                popular posts
                            </h4>

                            <div class="wrapper__list__article-small">
                                @foreach ($popularPosts as $index => $popular)
                                    <div class="mb-3">
                                        <div class="card__post card__post-list">
                                            <div class="image-sm">
                                                <a href="{{ route('content.show', $popular->slug) }}">
                                                    @if ($popular->featured_image)
                                                        <img src="{{ asset('storage/' . $popular->featured_image) }}"
                                                            class="img-fluid" alt="{{ $popular->title }}"
                                                            loading="lazy">
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="card__post__body">
                                                <div class="card__post__content">
                                                    <div class="card__post__title">
                                                        <h6>
                                                            <a href="{{ route('content.show', $popular->slug) }}">
                                                                {{ $popular->title }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <small>
                                                        {{ number_format($popular->views_count) }}
                                                        views
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>



                        @if ($sidebarTags->isNotEmpty())
                            <aside class="wrapper__list__article">
                                <h4 class="border_section">
                                    tags
                                </h4>

                                <div class="blog-tags p-0">
                                    <ul class="list-inline">
                                        @foreach ($sidebarTags as $tag)
                                            <li class="list-inline-item">
                                                <a href="{{ route('tag.show', $tag->slug) }}">
                                                    #{{ $tag->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        @endif

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">
                                newsletter
                            </h4>

                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    The most important world news and events of the day.
                                </h6>

                                <p>
                                    <small>
                                        Get our daily newsletter in your inbox.
                                    </small>
                                </p>

                            </div>

                        </aside>

                        {{-- ADVERTISEMENT --}}

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
