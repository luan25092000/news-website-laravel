@extends('admin.layouts.index')

@section('title', 'User')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">User List</h1>
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
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{!! $user->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}</td>
                            <td>
                                @if ($user->active == 1)
                                    <a href="{{ route('ad.staff.update-status', ['id' => $user->id, 'status' => 0]) }}" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Do you want to lock this user ?')">
                                        <i class="fas fa-lock"></i>
                                    </a>
                                @else
                                    <a href="{{ route('ad.staff.update-status', ['id' => $user->id, 'status' => 1]) }}" class="btn btn-success btn-sm btn-circle" onclick="return confirm('Do you want to unlock this user ?')">
                                        <i class="fas fa-unlock"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
