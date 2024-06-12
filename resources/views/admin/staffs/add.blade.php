@extends('admin.layouts.index')

@section('title', 'Create Staff')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Create Staff</h1>

<div class="row">
    <div class="col-md-12">
        <form action="{{ route('ad.staff.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" required />
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" required />
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Enter password" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
