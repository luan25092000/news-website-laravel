@extends('client.layouts.template')

@section('title', 'Sign In')

@section('main')
    <div class="container-fluid mb-4">
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
        <div class="container">
            <div class="col-12 text-center mt-3">
                <div class="text-center fh5co_heading py-2">Sign In</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <form class="row" action="{{ route('client.handle.login') }}" method="POST">

                        @csrf

                        <div class="col-12 py-3">
                            <input type="email" class="form-control fh5co_contact_text_box" placeholder="Enter email" name="email" required/>
                        </div>
                        <div class="col-12 py-3">
                            <input type="password" class="form-control fh5co_contact_text_box" placeholder="Enter password" name="password" required/>
                        </div>
                        <div class="col-12 py-3 text-center">
                            <button type="submit" class="btn contact_btn">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
