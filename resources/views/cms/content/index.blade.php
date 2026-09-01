@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Content List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Content</h3>
                <div class="card-tools">
                    <a href="{{ route('cms.content.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>Add Content
                    </a>
                </div>
            </div>

            <div class="card-body border-bottom">
                {!! Form::open(['route' => 'cms.content.index','method' => 'GET','class' => 'row',]) !!}

                <div class="col-md-3 mb-2">
                    {!! Form::text('search', request('search'), [
                        'class' => 'form-control',
                        'placeholder' => 'Search title or slug...',
                    ]) !!}
                </div>

                <div class="col-md-2 mb-2">
                    {!! Form::select(
                        'content_type',
                        [
                            'blog' => 'Blog',
                            'article' => 'Article',
                            'quote' => 'Quote',
                        ],
                        request('content_type'),
                        [
                            'class' => 'form-control',
                            'placeholder' => 'All Types',
                        ],
                    ) !!}
                </div>


                <div class="col-md-2 mb-2">
                    {!! Form::select('category_id', $categories->pluck('name', 'id'), request('category_id'), [
                        'class' => 'form-control',
                        'placeholder' => 'All Categories',
                    ]) !!}

                </div>

                <div class="col-md-2 mb-2">

                    {!! Form::select(
                        'status',
                        [
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'scheduled' => 'Scheduled',
                        ],
                        request('status'),
                        [
                            'class' => 'form-control',
                            'placeholder' => 'All Status',
                        ],
                    ) !!}
                </div>

                <div class="col-md-2 mb-2">

                    {!! Form::date('date', request('date'), [
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="col-md-1 mb-2">

                    {!! Form::submit('Go', [
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>

                <div class="col-md-12 mt-2">

                    <a href="{{ route('cms.content.index') }}" class="btn btn-secondary btn-sm">
                        Reset Filters
                    </a>
                </div>

                {!! Form::close() !!}
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Views</th>
                                <th>Featured</th>
                                <th width="230">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contents as $content)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>
                                            {{ Str::limit($content->title, 50) }}
                                        </strong>
                                        <br>
                                        <small class="text-muted">
                                            {{ $content->slug }}
                                        </small>
                                    </td>
                                    <td>
                                        @if ($content->content_type === 'blog')
                                            <span class="badge badge-primary">
                                                Blog
                                            </span>
                                        @elseif($content->content_type === 'article')
                                            <span class="badge badge-info">
                                                Article
                                            </span>
                                        @else
                                            <span class="badge badge-warning">
                                                Quote
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $content->category?->name ?? '-' }}</td>
                                    <td>{{ $content->author?->name ?? '-' }}</td>
                                    <td>
                                        @if ($content->status === 'published')
                                            <span class="badge badge-success">
                                                Published
                                            </span>
                                        @elseif($content->status === 'scheduled')
                                            <span class="badge badge-warning">
                                                Scheduled
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $content->published_at ? $content->published_at->format('d M Y H:i') : '-' }}</td>
                                    <td>{{ number_format($content->views_count) }}</td>
                                    <td>
                                        @if ($content->is_featured)
                                            <span class="badge badge-success">
                                                Yes
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                No
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cms.content.edit', $content) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cms.content.toggle-status', $content) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-warning" title="Toggle Status">
                                                <i class="fas fa-sync"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('cms.content.toggle-featured', $content) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success" title="Toggle Featured">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        No content found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($contents->hasPages())
                <div class="card-footer">
                    {{ $contents->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
