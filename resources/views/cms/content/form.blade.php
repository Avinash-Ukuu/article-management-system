@extends('cms.layouts.master')
@section('title', $content->exists ? 'Edit Content' : 'Add Content')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.content.index') }}">Content</a></li>
                        <li class="breadcrumb-item active">Content Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="container-fluid">
        {!! Form::model($content, [
            'route' => $content->exists ? ['cms.content.update', $content->id] : ['cms.content.store'],
            'method' => $content->exists ? 'PUT' : 'POST',
            'files' => true,
        ]) !!}

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>
                    Please fix the following errors:
                </strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-file-alt mr-1"></i>Basic Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('content_type', 'Content Type') !!}
                            {!! Form::select('content_type', ['blog' => 'Blog', 'article' => 'Article', 'quote' => 'Quote'], null, [
                                'class' => 'form-control',
                                'id' => 'content_type',
                                'placeholder' => 'Select content type',
                            ]) !!}

                            @error('content_type')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter content title']) !!}
                            @error('title')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'content-slug']) !!}
                            <small class="text-muted">
                                Leave empty to automatically generate a slug.
                            </small>
                            @error('slug')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', $categories, null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select category',
                            ]) !!}
                            @error('category_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Tags') !!}
                            {!! Form::select('tags[]', $tags, $content->exists ? $content->tags->pluck('id')->toArray() : [], [
                                'class' => 'form-control select2',
                                'multiple' => true,
                                'data-placeholder' => 'Select tags',
                            ]) !!}
                            <small class="text-muted">
                                You can select multiple tags.
                            </small>
                            @error('tags')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('excerpt', 'Excerpt') !!}
                            {!! Form::textarea('excerpt', null, [
                                'class' => 'form-control',
                                'rows' => 4,
                                'placeholder' => 'Short description of the content',
                            ]) !!}

                            <small class="text-muted">
                                Recommended for SEO and content previews.
                            </small>

                            @error('excerpt')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit mr-1"></i>
                            Content
                        </h3>
                    </div>

                    <div class="card-body">
                        {!! Form::textarea('content', null, [
                            'class' => 'form-control',
                            'rows' => 18,
                            'id' => 'summernote',
                            'placeholder' => 'Write your content here...',
                        ]) !!}

                        @error('content')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card" id="quote-card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-quote-left mr-1"></i>Quote Information</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-0">
                            {!! Form::label('quote_author', 'Quote By') !!}
                            {!! Form::text('quote_author', null, [
                                'class' => 'form-control',
                                'placeholder' => 'e.g. Winston Churchill',
                            ]) !!}
                            @error('quote_author')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-search mr-1"></i> SEO Settings</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('meta_title', 'Meta Title') !!}
                            {!! Form::text('meta_title', $content->seoMetadata->meta_title ?? null, [
                                'class' => 'form-control',
                                'maxlength' => 255,
                            ]) !!}
                            <small class="text-muted">
                                Recommended around 50–60 characters.
                            </small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_description', 'Meta Description') !!}
                            {!! Form::textarea('meta_description', $content->seoMetadata->meta_description ?? null, [
                                'class' => 'form-control',
                                'rows' => 4,
                                'maxlength' => 500,
                            ]) !!}
                            <small class="text-muted">
                                Recommended around 150–160 characters.
                            </small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_keywords', 'Meta Keywords') !!}
                            {!! Form::text('meta_keywords', $content->seoMetadata->meta_keywords ?? null, [
                                'class' => 'form-control',
                            ]) !!}

                        </div>

                        <hr>
                        {{-- Robots --}}
                        <div class="form-group">
                            {!! Form::label('robots', 'Robots') !!}
                            {!! Form::select(
                                'robots',
                                [
                                    'index,follow' => 'Index, Follow',
                                    'noindex,follow' => 'Noindex, Follow',
                                    'index,nofollow' => 'Index, Nofollow',
                                    'noindex,nofollow' => 'Noindex, Nofollow',
                                ],
                                $content->seoMetadata->robots ?? 'index,follow',
                                [
                                    'class' => 'form-control',
                                ],
                            ) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-image mr-1"></i>
                            Featured Image
                        </h3>
                    </div>

                    <div class="card-body">
                        @if ($content->featured_image)
                            <div class="mb-3">
                                <img style="background:thistle;max-height: 150px;"
                                    src={{ asset('uploads/contents/' . $content->featured_image) }} alt="{{ $content->title }}" class="img-fluid img-thumbnail"/>
                            </div>
                        @endif

                        {!! Form::file('featured_image', [
                            'class' => 'form-control-file',
                        ]) !!}

                        <small class="text-muted d-block mt-2">
                            JPG, JPEG, PNG or WEBP. Maximum 5MB.
                        </small>

                        @error('featured_image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-calendar mr-1"></i>
                            Publishing
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select(
                                'status',
                                [
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                    'scheduled' => 'Scheduled',
                                ],
                                $content->exists ? $content->status : 'draft',
                                [
                                    'class' => 'form-control',
                                    'id' => 'status',
                                ],
                            ) !!}

                            @error('status')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('published_at', 'Published At') !!}
                            {!! Form::datetimeLocal(
                                'published_at',
                                $content->published_at ? $content->published_at->format('Y-m-d\TH:i') : null,
                                [
                                    'class' => 'form-control',
                                    'id' => 'published_at',
                                ],
                            ) !!}

                            <small class="text-muted">
                                Required for scheduled publishing.
                            </small>

                            @error('published_at')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                {!! Form::checkbox('is_featured', 1, $content->exists ? $content->is_featured : false, [
                                    'class' => 'custom-control-input',
                                    'id' => 'is_featured',
                                ]) !!}

                                {!! Form::label('is_featured', 'Featured Content', [
                                    'class' => 'custom-control-label',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        {!! Form::submit($content->exists ? 'Update Content' : 'Create Content', [
                            'class' => 'btn btn-primary btn-block',
                        ]) !!}
                        <a href="{{ route('cms.content.index') }}" class="btn btn-secondary btn-block">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('footerScript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const type = document.getElementById('content_type');
            const quoteCard = document.getElementById('quote-card');

            function toggleQuoteCard() {
                if (!type || !quoteCard) {
                    return;
                }
                quoteCard.style.display =
                    type.value === 'quote' ?
                    'block' :
                    'none';
            }
            if (type) {
                type.addEventListener('change', toggleQuoteCard);
                toggleQuoteCard();
            }
        });
    </script>
@endsection
