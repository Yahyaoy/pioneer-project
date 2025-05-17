<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Initiative Details</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- AOS - Animate On Scroll -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    @include('website.layouts.css')
    @include('website.layouts.modal')
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
</head>
<body>
    <!-- Navigation Bar (Sticky) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">Pioneer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#news">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#initiatives">Initiatives</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    @if (auth()->user())
                    <li>
                        <button class="btn btn-join" style="background-color: white; color: #13639E; border: none; padding: 10px 20px; border-radius: 5px; margin-left: 10px;"><a style="text-decoration: none;" href="{{ route('user.profile') }}">Profile</a></button>
                    </li>
                    @else
                    <li>
                        <button class="btn btn-join" style="background-color: white; color: #13639E; border: none; padding: 10px 20px; border-radius: 5px; margin-left: 10px;"><a style="text-decoration: none;" href="{{ route('user.login') }}">User</a></button>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Initiative Details Section -->
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 mb-4" data-aos="fade-up">
                <img src="https://placehold.co/800x400" alt="Initiative Image" class="initiative-image mb-4">
                <h1 class="display-4 mb-3">Environmental Conservation Project</h1>
                <div class="d-flex align-items-center mb-4">
                    <span class="me-3"><i class="fas fa-calendar-alt"></i> Started: January 2023</span>
                    <span class="me-3"><i class="fas fa-users"></i> 150 Participants</span>
                    <span><i class="fas fa-map-marker-alt"></i> New York City</span>
                </div>
                <p class="lead">This initiative focuses on preserving local ecosystems and promoting sustainable practices within our community.</p>
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
                            <h5><i class="fas fa-tree"></i> Trees Planted</h5>
                            <p class="h2 mb-0">1,500+</p>
                        </div>
                        <div class="stats-card">
                            <h5><i class="fas fa-clock"></i> Hours Contributed</h5>
                            <p class="h2 mb-0">3,000+</p>
                        </div>
                        <div class="stats-card">
                            <h5><i class="fas fa-hand-holding-heart"></i> Volunteers</h5>
                            <p class="h2 mb-0">150</p>
                        </div>
                        <button class="join-button mt-4 w-100">
                            <a href="{{route('website.join')}}">Join Initiative</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
                <h3 class="mb-4">Comments & Reviews</h3>
                
                <!-- Add Comment Form -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="initiative_id" value="">
                            
                            <div class="mb-3">
                                <label class="form-label">Your Rating</label>
                                <div class="rating-stars mb-3">
                                    <div class="btn-group" role="group">
                                        @for($i = 1; $i <= 5; $i++)
                                            <input type="radio" class="btn-check" name="rating" id="rating{{ $i }}" value="{{ $i }}" required>
                                            <label class="btn btn-outline-warning" for="rating{{ $i }}">
                                                <i class="fas fa-star"></i>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Your Comment</label>
                                <textarea class="form-control" name="comment" rows="3" required placeholder="Share your thoughts about this initiative..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>

                <!-- Comments List -->
                <div class="comments-list">
                    <!-- Sample Comment 1 -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-subtitle mb-0">John Smith</h6>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <p class="card-text">This initiative has been amazing! I've learned so much about environmental conservation and met wonderful people.</p>
                            <small class="text-muted">Posted 2 days ago</small>
                        </div>
                    </div>

                    <!-- Sample Comment 2 -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-subtitle mb-0">Sarah Johnson</h6>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="card-text">The organization is very professional and the impact we're making is truly visible. Highly recommended!</p>
                            <small class="text-muted">Posted 5 days ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section id="contact" class="mt-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Contact Us</h2>
            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h4>Get in Touch</h4>
                    <p>Have questions about this initiative? We'd love to hear from you. Fill out the form and we'll get back to you as soon as possible.</p>
                    <div class="mt-4">
                        <p><i class="fas fa-map-marker-alt me-2"></i> 123 Main Street, New York, NY 10001</p>
                        <p><i class="fas fa-phone me-2"></i> +1 234 567 8900</p>
                        <p><i class="fas fa-envelope me-2"></i> info@example.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>About Us</h5>
                    <p>We are dedicated to making a positive impact through community initiatives and sustainable development projects.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">News</a></li>
                        <li><a href="#" class="text-white">Initiatives</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- AOS - Animate On Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
