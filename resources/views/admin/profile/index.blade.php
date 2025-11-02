@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="container py-4">
    <h3 class="mb-3">Profile Settings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card p-4">
                <h5>Update Profile</h5>
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Profile Image</label>
                        <input type="file" name="image" class="form-control">
                        @if($user->image)
                            <img src="{{ asset('uploads/profile/'.$user->image) }}" width="70" class="mt-2 rounded">
                        @endif
                    </div>
                    <button class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4">
                <h5>Change Password</h5>
                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>
                    <button class="btn btn-warning">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
