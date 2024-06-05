@extends('admin.layouts.index')

@section('title')
    {{ $news->title }}
@endsection

@section('content')
    <table class="table table-bordered mt-3">
        <tr>
            <td>Image</td>
            <td>
                <img src="{{ asset($news->image) }}" width="200">
            </td> 
        </tr>
        <tr>
            <td>Title</td>
            <td>{{ $news->title }}</td>
        </tr>
        <tr>
            <td>Author</td>
            <td>${{ $news->getAuthor->name }}</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>{{ $news->getCategory->name }}</td>
        </tr>
        <tr>
            <td>Content</td>
            <td>{!! $news->content !!}</td>
        </tr>
    </table>
@endsection
