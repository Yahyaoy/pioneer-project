@extends('website.master')

@section('styles')

<link rel="stylesheet" href="{{ asset('site/css/userInitiative.css') }}">

@endsection

@section('content')


<section id="initiatives" class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5" data-aos="fade-up">Our Initiatives</h2>

        <!-- Search and Filter Bar -->
        <div class="search-filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search initiatives...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select category-select">
                        <option value="">All Categories</option>
                        <option value="environment">Environment</option>
                        <option value="education">Education</option>
                        <option value="technology">Technology</option>
                        <option value="community">Community</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row g-4" id="initiativesContainer">
            <!-- Initiative Card -->
             @forelse ($initiatives as $initiative)
             <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="initiative-card">
                    <div class="initiative-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjXCe8-GSEA2tguLT435xF1CSW9K25iggXid09mQff56K2vUO2FUfTpdA_J42cwPgaUDo&usqp=CAU" alt="Initiative">
                        <div class="initiative-category">New</div>
                    </div>
                    <div class="initiative-content">
                        <div class="initiative-stats">
                            <span><i class="fas fa-users"></i> {{ $initiative->max_participants }}</span>
                            <span><i class="fas fa-calendar"></i> {{ $initiative->hours }}</span>
                        </div>
                        <h5 class="initiative-title">{{ $initiative->name }}</h5>
                        <p class="initiative-description">{{ $initiative->details }}.</p>
                        <div class="initiative-progress">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%"></div>
                            </div>
                            <span class="progress-text">75% Complete</span>
                        </div>
                        <a href="{{route('details.initiative',$initiative->id)}}" class="btn btn-join">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

             @empty

             <h4>No data found</h4>

             @endforelse

            <!-- Repeat for other initiatives with the same structure -->
        </div>
    </div>

</section>
@endsection
