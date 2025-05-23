@extends('website.master')

@section('content')
      <!-- Hero Section -->
      <header id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container position-relative h-100">
            <div class="row min-vh-100 align-items-center justify-content-center">
                <div class="col-lg-7 text-white hero-content" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="display-3 fw-bold mb-4">Empowering Change Through Community</h1>
                    <p class="lead mb-4">Join our vibrant community of changemakers and be part of initiatives that transform lives and create lasting impact across the globe.</p>
                    <div class="hero-buttons">
                        <a href="#initiatives" class="btn btn-lg btn-primary me-3">Explore Initiatives</a>
                        <a href="#contact" class="btn btn-lg btn-outline-light">Get Involved</a>
                    </div>
                    <div class="hero-buttons" style="padding: 15px">
                        {{-- <a href="#initiatives" class="btn btn-lg btn-primary me-3">Explore Initiatives</a> --}}
                        <a href="{{ route('recommendations.get') }}" class="btn btn-lg btn-outline-light">Get Recommendation</a>
                    </div>
                    <div class="hero-stats mt-5">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <h3 class="mb-2">{{ $initiatives->count() }}+</h3>
                                    <p class="mb-0">Active Initiatives</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <h3 class="mb-2">{{ $users->count() }}+</h3>
                                    <p class="mb-0">Community Members</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-item">
                                    <h3 class="mb-2">{{ $all_news->count() }}+</h3>
                                    <p class="mb-0">News Reached</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- News Section with Carousel -->
    <section id="news" class="news-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5" data-aos="fade-up">Latest News & Updates</h2>

            <div class="row mb-4">
                <div class="col-md-8 mx-auto">
                    <div class="news-filters text-center" data-aos="fade-up" data-aos-delay="100">
                        <button class="btn btn-filter active">All</button>
                        <button class="btn btn-filter">Initiatives</button>
                        <button class="btn btn-filter">Events</button>
                        <button class="btn btn-filter">Updates</button>
                    </div>
                </div>
            </div>

            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="200">
                <div class="carousel-inner">



                    @foreach ($all_news as $news)
                     @include('website.includes.news_slider')

                    @endforeach





                </div>
                <div class="carousel-indicators custom-indicators">
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <button class="carousel-control-prev custom-control" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-control-next custom-control" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>


    <!-- Initiatives Section -->
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
                 @include('website.includes.initiative_card')
                 @empty

                 <h4>No data found</h4>

                 @endforelse

                <!-- Repeat for other initiatives with the same structure -->
            </div>
        </div>


    </section>


    <!-- Users Section -->
    <section id="users" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5" data-aos="fade-up">Our Community Members</h2>

            <div class="row g-4" id="usersContainer" data-aos="fade-up" data-aos-delay="200">
                {{-- @foreach($users as $index => $user) --}}
                 @forelse ($users as $user)
                  @include('website.includes.user_card')

                 @empty
                 <h4>no users found</h4>

                 @endforelse
                <!-- Repeat for other users -->
            </div>
        </div>


    </section>


    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Contact Us</h2>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h4>Get in Touch</h4>
                    <p>Have questions or suggestions? We'd love to hear from you. Fill out the form and we'll get back to you as soon as possible.</p>
                    <div class="mt-4">
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main Street, New York, NY 10001</p>
                        <p><i class="fas fa-phone me-2"></i> +1 234 567 8900</p>
                        <p><i class="fas fa-envelope me-2"></i> info@example.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="contact-form" action="{{ route('user.contact') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="full_name" required class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="phone" name="phone" required class="form-control" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" required class="form-control" placeholder="Your Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" required name="message" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
