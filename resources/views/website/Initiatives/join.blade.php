


@extends('website.master')

@section('styles')
<style>
    .form-section {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .form-control {
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 15px;
    }
    .submit-button {
        background-color: #13639E;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        border: none;
        font-size: 18px;
        transition: all 0.3s;
    }
    .submit-button:hover {
        background-color: #0d4d7a;
        transform: scale(1.05);
    }
    .initiative-preview {
        border-radius: 15px;
        overflow: hidden;
    }
    .initiative-preview img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
  <!-- Join Form Section -->
  <div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-8 mb-4" data-aos="fade-up">
            <h1 class="display-4 mb-4">Join Our Initiative</h1>
            <div class="form-section">
                <form action="{{ route('website.join',$initiative->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" disabled class="form-control" value="{{ auth()->user()->name }}" name="full_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" disabled value="{{ auth()->user()->email }}" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" disabled class="form-control" value="{{ auth()->user()->phone }}" name="phone">
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Why do you want to join?</label>
                        <textarea class="form-control" name="motivation" rows="4"  placeholder="Share your motivation for joining this initiative"></textarea>
                    </div>

                    <button type="submit" class="submit-button">Submit Application</button>
                </form>
            </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="sticky-top" style="top: 100px;">
                <div class="initiative-preview card">
                    <img src="https://placehold.co/600x400" alt="Initiative Image">
                    <div class="card-body">
                        <h4>{{ $initiative->name }}</h4>
                        <p class="text-muted">{{ $initiative->details }}</p>
                        <div class="mb-3">
                            {{-- <i class="fas fa-calendar-alt me-2"></i> Duration: {{ $initiative->start_date - $initiative->end_date }} --}}
                            <i class="fas fa-calendar-alt me-2"></i> Start Date: {{ $initiative->start_date }}
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i> Location: {{ $initiative->location }}
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-users me-2"></i> Max Participants: {{ $initiative->max_participants }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



