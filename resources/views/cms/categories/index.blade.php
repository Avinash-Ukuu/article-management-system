@extends('cms.layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('cms.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <div class="card-tools"><a href="{{ route('cms.categories.create') }}"><span class="btn btn-sm btn-info">Add
                            &nbsp;<span class="fa fa-plus"></span></span></a></div>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="70">ID</th>
                                <th>Move</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Position</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="220">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="category-sortable">
                            @foreach ($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <i class="fas fa-grip-vertical text-muted" style="cursor: move;"></i>
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td><code>{{ $category->slug }}</code></td>
                                    <td> <span class="badge badge-info">
                                            {{ $category->position }}
                                        </span></td>
                                    <td>{{ $category->contents_count }}</td>
                                    <td>
                                        @if ($category->status)
                                            <span class="badge badge-success">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge badge-secondary">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('cms.categories.edit', ['category' => $category->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('cms.categories.toggle-status', $category) }}"
                                                method="POST" class="d-inline">

                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-sm">

                                                    <i class="fas fa-toggle-on"></i>

                                                    {{ $category->status ? 'Disable' : 'Enable' }}

                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($categories->hasPages())
                <div class="card-footer">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
@section('footerScript')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script> --}}
    <script src="{{asset('assets/frontend/js/sortable.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sortable = document.getElementById('category-sortable');
            if (!sortable) {
                return;
            }
            new Sortable(sortable, {
                animation: 150,
                handle: '.fa-grip-vertical',
                onEnd: function() {
                    let categories = [];
                    document
                        .querySelectorAll('#category-sortable tr')
                        .forEach(function(row) {
                            categories.push(row.dataset.id);
                        });
                    fetch("{{ route('cms.categories.update-position') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                categories: categories
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log(data.message);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            });
        });
    </script>
@endsection
