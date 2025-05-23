
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
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-lg-8 mb-4" data-aos="fade-up">
            <img src="https://placehold.co/800x400" alt="Initiative Image" class="initiative-image mb-4">
            <h1 class="display-4 mb-3">{{ $initiative->name }}</h1>
            <div class="d-flex align-items-center mb-4">
                <span class="me-3"><i class="fas fa-calendar-alt"></i> Started: {{ $initiative->start_date }}</span>
                <span class="me-3"><i class="fas fa-users"></i> {{ $initiative->participants->count() }} Participants</span>
                <span><i class="fas fa-map-marker-alt"></i> {{ $initiative->organization->city }}</span>
            </div>
            <p class="lead">{{ $initiative->details }}.</p>
            <div class="mb-4">
                <h3>About This Initiative</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="sticky-top" style="top: 100px;">
                <div class="card p-4 mb-4">
                    <h4>Initiative Stats</h4>
                    <div class="stats-card">
                        <h5><i class="fas fa-tree"></i> Location</h5>
                        <p class="h2 mb-0">{{ $initiative->location }}</p>
                    </div>
                    <div class="stats-card">
                        <h5><i class="fas fa-clock"></i> Hours Contributed</h5>
                        <p class="h2 mb-0">{{ $initiative->hours }}+</p>
                    </div>
                    <div class="stats-card">
                        <h5><i class="fas fa-hand-holding-heart"></i> Max Participants </h5>
                        <p class="h2 mb-0">{{ $initiative->max_participants }}</p>
                    </div>
                    <button class="join-button mt-4 w-100">
                        <a href="{{route('website.join.index',$initiative->id)}}" style="color: white">Join Initiative</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
      <!-- Users Joined Section -->
    {{-- @include('website.layouts.users') --}}

    <!-- Timeline Section -->
    <div class="row mt-5" data-aos="fade-up">
        <div class="col-12">
            <h3 class="mb-4">Initiative Timeline</h3>
            <div class="timeline">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-flag"></i> Phase 1: Planning</h5>
                        <p>Initial assessment and community engagement</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-seedling"></i> Phase 2: Implementation</h5>
                        <p>Beginning the planting process and volunteer coordination</p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5><i class="fas fa-chart-line"></i> Phase 3: Growth</h5>
                        <p>Monitoring progress and maintaining planted areas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comments and Rating Section -->
<div class="container mt-5">
    <div class="row" data-aos="fade-up">
        <div class="col-12">


<h3>Add New Review</h3>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<form method="post" action="{{ route('site.product_review', $initiative->id) }}">
    @csrf
    <input type="hidden" name="initiative_id" value="{{ $initiative->id }}">
    <div class="star-rating">
        <div class="star-rating__wrap">
          <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
          <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
          <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
          <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
          <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
          <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
          <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
          <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
        </div>
      </div>
    <textarea name="comment" class="form-control" placeholder="Comment" rows="4"></textarea>

    <button class="btn btn-main mt-20">Post Review</button>
</form>


            <!-- Comments List -->
            <div class="comments-list">
                <!-- Sample Comment 1 -->


                @forelse ($reviews as $review)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="card-subtitle mb-0">{{ $review->user->name }}</h6>
                            <div class="text-warning">

                            @if ($review->star == 1)
                                <i class="fas fa-star"></i>

                            @elseif($review->star == 2)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($review->star == 3)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            @elseif($review->star == 4)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                            @endif
                        </div>

                        </div>
                        <p class="card-text">{{ $review->comment }}</p>
                        <small class="text-muted">{{ $review->created_at }}</small>
                    </div>
                </div>

                @empty
                <h4>No Reviews Yet :)</h4>

                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- AOS - Animate On Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>


@endsection
