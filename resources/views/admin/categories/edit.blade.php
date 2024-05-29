@extends('admin.layouts.index')

@section('title', 'Edit Category')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Edit Category</h1>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('ad.category.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $category->name }}" required />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
