@extends('cms.layouts.master')
@section('content')
    <div class="container-fluid">
        {{-- Flash Messages --}}
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
                <h3 class="card-title">Tags</h3>
                <div class="card-tools">
                    <a href="{{ route('cms.tags.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>Add Tag</a>
                </div>
            </div>
            {{-- Search --}}
            <div class="card-body border-bottom">
                {!! Form::open(['route' => 'cms.tags.index', 'method' => 'GET', 'class' => 'row',]) !!}
                <div class="col-md-6">
                    {!! Form::text('search', request('search'), [
                        'class' => 'form-control',
                        'placeholder' => 'Search tag...',
                    ]) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::submit('Search', [
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>
                <div class="col-md-2">
                    <a href="{{ route('cms.tags.index') }}" class="btn btn-secondary">Reset</a>
                </div>
                {!! Form::close() !!}
            </div>
            {{-- Table --}}
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th width="70">ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Created</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><strong>{{ $tag->name }}</strong></td>
                                    <td><code>{{ $tag->slug }}</code></td>
                                    <td>{{ $tag->contents_count }}</td>
                                    <td>{{ $tag->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('cms.tags.edit', $tag) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cms.tags.destroy', $tag) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        No tags found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Pagination --}}
            @if ($tags->hasPages())
                <div class="card-footer">
                    {{ $tags->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
