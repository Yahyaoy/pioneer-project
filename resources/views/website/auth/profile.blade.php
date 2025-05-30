@extends('website.master')
@section('styles')
    <style>
        .profile-section {
            margin-top: 80px;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: transform 0.2s;
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .rounded-circle {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #f8f9fa;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .profile-actions {
            margin-top: 20px;
        }
        .btn-profile {
            margin: 5px;
            min-width: 120px;
        }
        .section-title {
            color: #343a40;
            padding-bottom: 10px;
            border-bottom: 2px solid #f8f9fa;
            margin-bottom: 20px;
        }
        .initiative-grid {
            margin-top: 30px;
        }
        .certificate-section {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }
        .empty-message {
            color: #6c757d;
            font-style: italic;
        }
    </style>
@endsection

@section('content')

    <div class="container py-5 profile-section">
        <div class="row">
            <!-- Profile Information -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://placehold.co/600x400' }}"
                             class="rounded-circle mb-3"
                             alt="Profile Picture"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400'">                        <h4 class="card-title">{{ $user->name }}</h4>
                        <p class="text-muted">{{ $user->phone }}</p>
                        <div class="mt-3">
                            <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="mb-1"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                            <div class="profile-actions">
                                <a href="{{ route('user.initiative.requests') }}" class="btn btn-primary btn-profile">
                                    All requests
                                </a>
                                <form action="{{ route('user.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-profile">Logout</button>
                                </form>
                                <a href="{{ route('profile.edit') }}" class="btn btn-warning mb-3">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Initiative Grid -->
            @if($user->role === 'normal_user')
            <div class="col-md-8">
                <h4 class="section-title">My Initiatives</h4>
                <div class="row g-3 initiative-grid">
                    @forelse ($initiatives as $initiative)
                        <div class="col-md-6">
                            <div class="card h-100">
                                <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative {{ $initiative->id }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $initiative->name }}</h5>
                                    <p class="card-text">{{ Str::limit($initiative->details, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="{{ route('details.initiative', $initiative->id) }}" class="btn btn-sm btn-primary me-2">
                                        More Details
                                    </a>
                                    @if($user->role === 'normal_user')
                                        <form action="{{ route('initiatives.leave', $initiative->id) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Leave Initiative</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="empty-message">No initiatives found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        @endif
        @if($user->role === 'normal_user')
            <!-- Certificates Section (only for normal users) -->
            <div class="row">
                <div class="col-md-8 offset-md-4 certificate-section">
                    <h4 class="section-title">My Certificates</h4>
                    <div class="row g-3">
                        @forelse ($certificates as $certificate)
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $certificate->title }}</h5>
                                        <p class="card-text">{{ $certificate->description }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <a href="#" class="btn btn-sm btn-warning">Download Certificate</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="empty-message">You don't have any certificates yet</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
@endsection
