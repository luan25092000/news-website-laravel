@extends('admin.layouts.index')

@section('title', 'Edit News')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit News</h1>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('ad.news.update', ['id' => $news->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Category <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{ $news->title }}" required />
            </div>
            <div class="form-group">
                <label>Content <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="content">{{ $news->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <p>This is a old image, if you want to edit image, please choose the another image</p>
                <img src="{{ asset($news->image) }}" width="200" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
