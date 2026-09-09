@extends('frontend.layouts.master')
@section('content')
    @php
        $defaultImage = asset('assets/frontend/images/newsimage8.png');
    @endphp
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    @if ($type === 'search')
                        <h1>
                            Search Results
                        </h1>
                        @if ($search)
                            <p>
                                Results for:
                                <strong>"{{ $search }}"</strong>
                            </p>
                        @endif
                    @elseif($type === 'category')
                        <h1>
                            {{ $category->name }}
                        </h1>
                        @if ($category->description)
                            <p>
                                {{ $category->description }}
                            </p>
                        @endif
                    @elseif($type === 'tag')
                        <h1>
                            #{{ $tag->name }}
                        </h1>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                @forelse($posts as $post)
                    @php
                        $image = $post->featured_image
                            ? asset('uploads/contents/' . ltrim($post->featured_image, '/'))
                            : $defaultImage;
                    @endphp
                    <article class="news-post mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ route('content.show', [ 'category' => $post->category->slug,'slug' => $post->slug,]) }}">
                                    <img src="{{ $image }}" alt="{{ $post->title }}" class="img-fluid"
                                        loading="lazy">
                                </a>
                            </div>

                            <div class="col-md-8">
                                @if ($post->category)
                                    <div class="post-category mb-2">
                                        <a href="{{ route('category.show', $post->category->slug) }}">
                                            {{ $post->category->name }}
                                        </a>
                                    </div>
                                @endif

                                <h2 class="post-title">
                                    <a href="{{ route('content.show', [ 'category' => $post->category->slug,'slug' => $post->slug,]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                @if ($post->excerpt)
                                    <p class="post-excerpt">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 150) }}
                                    </p>
                                @endif

                                <div class="post-meta">
                                    @if ($post->author)
                                        <span>
                                            By {{ $post->author->name }}
                                        </span>
                                    @endif

                                    @if ($post->published_at)
                                        <span>
                                            {{ $post->published_at->format('M d, Y') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @empty

                    <div class="no-results text-center py-5">
                        @if ($type === 'search')
                            <h2>
                                No results found
                            </h2>
                            <p>
                                We couldn't find any content matching
                                <strong>"{{ $search }}"</strong>.
                            </p>

                            <a href="{{ url('/') }}" class="btn btn-primary">
                                Back to Home
                            </a>
                        @elseif($type === 'category')
                            <h2>
                                No posts found
                            </h2>
                            <p>
                                There are currently no published posts
                                in this category.
                            </p>
                        @elseif($type === 'tag')
                            <h2>
                                No posts found
                            </h2>
                            <p>
                                There are currently no published posts
                                with this tag.
                            </p>
                        @endif
                    </div>
                @endforelse

                @if ($posts->hasPages())
                    <div class="pagination-wrapper mt-4">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    {{-- Latest Posts --}}
                    <div class="sidebar-widget">
                        <h3 class="widget-title">
                            Latest Posts
                        </h3>
                        @php
                            $latestPosts = \App\Models\Content::query()
                                ->published()
                                ->where('content_type', '!=', 'quote')
                                ->with('category:id,name,slug')
                                ->select(['id', 'category_id', 'title', 'slug', 'featured_image', 'published_at'])
                                ->latest('published_at')
                                ->limit(5)
                                ->get();
                        @endphp
                        @foreach ($latestPosts as $latest)
                            @php
                                $latestImage = $latest->featured_image
                                    ? asset('uploads/contents/' . ltrim($latest->featured_image, '/'))
                                    : $defaultImage;
                            @endphp
                            <div class="sidebar-post mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{ route('content.show', [ 'category' => $latest->category->slug,'slug' => $latest->slug,]) }}">
                                            <img src="{{ $latestImage }}" alt="{{ $latest->title }}" class="img-fluid"
                                                loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col-8">
                                        <h4>
                                            <a href="{{ route('content.show', [ 'category' => $latest->category->slug,'slug' => $latest->slug,]) }}">
                                                {{ $latest->title }}
                                            </a>
                                        </h4>
                                        @if ($latest->published_at)
                                            <small>
                                                {{ $latest->published_at->format('M d, Y') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
