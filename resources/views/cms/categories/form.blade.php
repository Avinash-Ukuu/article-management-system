@extends('cms.layouts.master')
@section('title', $category->exists ? 'Edit Category' : 'Add Category')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cms.categories.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Category Form</li>
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
                            {{ $category->exists ? 'Edit Category' : 'Add Category' }}
                        </h3>

                        <div class="card-tools">
                            <a href="{{ route('cms.categories.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i>
                                Back
                            </a>
                        </div>
                    </div>

                    {!! Form::model($category, [
                        'route' => $category->exists ? ['cms.categories.update', $category->id] : ['cms.categories.store'],
                        'method' => $category->exists ? 'PUT' : 'POST',
                    ]) !!}

                    <div class="card-body">

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Please fix the following errors:</strong>

                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Name --}}
                        <div class="form-group">
                            {!! Form::label('name', 'Category Name') !!}

                            {!! Form::text('name', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Enter category name',
                            ]) !!}

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug') !!}

                            {!! Form::text('slug', null, [
                                'class' => 'form-control',
                                'placeholder' => 'category-slug',
                            ]) !!}

                            <small class="form-text text-muted">
                                Leave empty to automatically generate the slug.
                            </small>

                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}

                            {!! Form::textarea('description', null, [
                                'class' => 'form-control',
                                'rows' => 4,
                                'placeholder' => 'Enter category description',
                            ]) !!}

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="form-group">

                            <div class="custom-control custom-switch">

                                {!! Form::checkbox('status', 1, $category->exists ? $category->status : true, [
                                    'class' => 'custom-control-input',
                                    'id' => 'status',
                                ]) !!}

                                {!! Form::label('status', 'Active', ['class' => 'custom-control-label']) !!}

                            </div>

                        </div>

                    </div>

                    <div class="card-footer">

                        {!! Form::submit($category->exists ? 'Update Category' : 'Create Category', ['class' => 'btn btn-primary']) !!}

                        <a href="{{ route('cms.categories.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>

    </div>
@endsection
