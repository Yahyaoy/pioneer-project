@extends('website.master')
@section('styles')
<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .rounded-circle {
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }

</style>

@endsection

@section('content')

<div class="container py-5" style="margin-top: 80px;">
    <div class="row">
        <!-- Profile Information -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="https://placehold.co/600x400" class="rounded-circle mb-3" alt="Profile Picture">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->phone }}</p>
                    <div class="mt-3">
                        <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="mb-1"><strong>Role:</strong> {{ $user->role }}</p>

                        <button class="btn btn-sm btn-primary me-3"><a style="color: white;  text-decoration: none;" href="{{ route('user.initiative.requests') }}">All requests</a></button>


                        <form action="{{ route('user.logout',) }}" method="POST">
                            {{-- @method('DELETE') --}}
                            @csrf
                                            <button class="btn btn-sm btn-danger me-3" >Logout</button>
                                {{-- <button class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</button> --}}
                            </form>



                    </div>
                </div>
            </div>
        </div>
                         <!-- Initiative Grid -->
                         <div class="col-md-8">
                            <h4 class="mb-4">Initiatives</h4>
                            <div class="row g-3">
                                @forelse ($initiatives as $initiative)
                                    <!-- Initiative Card 1 -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative{{ $initiative->id }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $initiative->name }}</h5>
                                                <p class="card-text">{{ $initiative->details }}</p>          <button class="btn btn-sm btn-primary me-3"><a style="color: white;  text-decoration: none;" href="{{ route('details.initiative',$initiative->id) }}">More Details</a></button>


                                <form action="{{ route('initiatives.leave',$initiative->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                                    <button class="btn btn-sm btn-danger me-3">Leave Initiatives</button>
                                        {{-- <button class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</button> --}}
                                    </form>
                                                {{-- <button class="btn btn-lg btn-danger me-3"><a style="color: white;  text-decoration: none;"  href="{{ route('initiatives.leave',$initiative->id) }}">Leave Initiatives</a></button> --}}

                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <h4>No data found</h4>
                                @endforelse



                            </div>
                        </div>
    </div>

    <div class="col-md-8" style="padding-top: 50px">
        <h4 class="mb-4">All My Certiticate</h4>
        <div class="row g-3">

            @forelse ($certificates as $certificate)
            <div class="col-md-6">
                <div class="card">
                    {{-- <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative 1"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $certificate->title }}</h5>
                        <p class="card-text">{{ $certificate->description }}</p>
                    {{-- <button ><a href="{{ route('details.initiative') }}">More Details</a></button> --}}
                                {{-- <button ><a href="">More Details</a></button> --}}
                                <button class="btn btn-sm btn-warning me-3"><a style="color: white;  text-decoration: none;" href="">Dawonload Certificate</a></button>


                    </div>
                </div>
            </div>
            @empty

            <h5>User Dose Not Have Certificate</h5>

            @endforelse



        </div>
    </div>
</div>

@endsection


@section('scripts')

@endsection
