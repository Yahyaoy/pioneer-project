@extends('website.master')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h3 class="mb-4">Edit Profile</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Profile Image</label><br>
                    @if($user->profile_image)
                        <img src="{{ asset('storage/' . $user->profile_image) }}" width="100" class="mb-2"><br>
                    @endif
                    <input type="file" class="form-control" name="profile_image">
                    @error('profile_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('user.profile') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
