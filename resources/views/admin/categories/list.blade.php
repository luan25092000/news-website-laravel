@extends('admin.layouts.index')

@section('title', 'Category')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category List</h1>
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible mt-4">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible mt-4">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{Session::get('error')}}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('ad.category.edit', ['id' => $category->id]) }}" class="btn btn-primary btn-sm btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('ad.category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Do you want to delete this category ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
