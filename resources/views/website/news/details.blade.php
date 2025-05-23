@extends('website.master')

@section('styles')
<style>
    .initiative-image {
        height: 400px;
        object-fit: cover;
        width: 100%;
        border-radius: 10px;
    }
    .stats-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin: 10px 0;
        transition: transform 0.3s;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .join-button {
        background-color: #13639E;
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        border: none;
        font-size: 18px;
        transition: all 0.3s;
    }
    .join-button:hover {
        background-color: #0d4d7a;
        transform: scale(1.05);
    }

    .rating-stars .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
        padding: 8px 12px;
    }

    .rating-stars .btn-check:checked + .btn-outline-warning {
        background-color: #ffc107;
        color: white;
    }

    .comments-list .card {
        transition: transform 0.2s;
    }

    .comments-list .card:hover {
        transform: translateY(-3px);
    }
</style>
@endsection


@section('content')
  <!-- Initiative Details Section -->
  <div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-12 mb-6" data-aos="fade-up">
            <img src="https://placehold.co/800x400" alt="Initiative Image" class="initiative-image mb-4">
            <h1 class="display-4 mb-3">{{ $news->title }}</h1>
            <div class="d-flex align-items-center mb-4">
                <span class="me-3"><i class="fas fa-calendar-alt"></i> Created At: {{ $news->news_date }}</span>
                {{-- <span class="me-3"><i class="fas fa-users"></i> {{ $initiative->participants->count() }} Participants</span> --}}
                {{-- <span><i class="fas fa-map-marker-alt"></i> {{ $initiative->organization->city }}</span> --}}
            </div>
            <div class="mb-4">
                <h3>About This News</h3>
                <p>{{ $news->details }}</p>
            </div>
        </div>


    </div>
</div>

@endsection
