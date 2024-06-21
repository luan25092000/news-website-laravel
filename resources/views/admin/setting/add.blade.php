@extends('admin.layouts.index')

@section('title', 'Setting')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Setting</h1>
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
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('ad.setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Logo <span class="text-danger">*</span></label>
                <input type="file" name="logo" accept="image/*" required>
            </div>
            <div class="form-group">
                <p>This is a old logo, if you want to edit logo, please choose the another logo</p>
                <img src="{{ asset($setting->logo) }}" width="200" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
