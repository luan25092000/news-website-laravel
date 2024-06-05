@extends('admin.layouts.index')

@section('title', 'News')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">News List</h1>
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th width="100">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($news as $index => $new)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ asset($new->image) }}" target="_blank">
                                    <img src="{{ asset($new->image) }}" width="100">
                                </a>
                            </td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->getAuthor->name }}</td>
                            <td>{{ $new->getCategory->name }}</td>
                            <td>
                                <a href="{{ route('ad.news.edit', ['id' => $new->id]) }}" class="btn btn-primary btn-sm btn-circle">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ route('ad.news.delete', ['id' => $new->id]) }}" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Do you want to delete this news ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{ route('ad.news.show', ['id' => $new->id]) }}" class="btn btn-warning btn-sm btn-circle">
                                    <i class="fas fa-eye"></i>
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
