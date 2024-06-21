@extends('admin.layouts.index')

@section('title', 'Comment')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Comment</h1>
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
                        <th>User</th>
                        <th>News</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>News</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($comments as $index => $comment)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $comment->getUser->name }}</td>
                            <td>{{ $comment->getNews->title }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>
                                <a href="{{ route('ad.comment.delete', ['id' => $comment->id]) }}" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Do you want to delete this comment ?')">
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
