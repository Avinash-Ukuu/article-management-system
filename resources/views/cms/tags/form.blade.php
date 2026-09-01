@extends('cms.layouts.master')
@section('title', $tag->exists ? 'Edit Tag' : 'Add Tag')
@section('content')
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.tags.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Tag Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $tag->exists ? 'Edit Tag' : 'Add Tag' }}
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('cms.tags.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>

                    {!! Form::model($tag, [
                        'route' => $tag->exists ? ['cms.tags.update', $tag->id] : ['cms.tags.store'],
                        'method' => $tag->exists ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="card-body">



                        {{-- Tag Name --}}
                        <div class="form-group">

                            {!! Form::label('name', 'Tag Name') !!}

                            {!! Form::text('name', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Enter tag name',
                            ]) !!}

                            @error('name')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Slug --}}
                        <div class="form-group">

                            {!! Form::label('slug', 'Slug') !!}

                            {!! Form::text('slug', null, [
                                'class' => 'form-control',
                                'placeholder' => 'tag-slug',
                            ]) !!}

                            <small class="form-text text-muted">
                                Leave empty to automatically generate the slug.
                            </small>

                            @error('slug')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                    </div>


                    <div class="card-footer">
                        {!! Form::submit($tag->exists ? 'Update Tag' : 'Create Tag', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('cms.tags.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
