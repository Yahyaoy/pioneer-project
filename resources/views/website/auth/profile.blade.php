<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

    <div class="container py-5" style="margin-top: 80px;">
        <div class="row">
            <!-- Profile Information -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://placehold.co/600x400" class="rounded-circle mb-3" alt="Profile Picture">
                        <h4 class="card-title">John Doe</h4>
                        <p class="text-muted">Administrator</p>
                        <div class="mt-3">
                            <p class="mb-1"><strong>Email:</strong> john.doe@example.com</p>
                            <p class="mb-1"><strong>Role:</strong> Admin</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Initiative Grid -->
            <div class="col-md-8">
                <h4 class="mb-4">Initiatives</h4>
                <div class="row g-3">
                    <!-- Initiative Card 1 -->
                    <div class="col-md-6">
                        <div class="card">
                            <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative 1">
                            <div class="card-body">
                                <h5 class="card-title">Initiative 1</h5>
                                <p class="card-text">Description of the first initiative project.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Initiative Card 2 -->
                    <div class="col-md-6">
                        <div class="card">
                            <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative 2">
                            <div class="card-body">
                                <h5 class="card-title">Initiative 2</h5>
                                <p class="card-text">Description of the second initiative project.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Initiative Card 3 -->
                    <div class="col-md-6">
                        <div class="card">
                            <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative 3">
                            <div class="card-body">
                                <h5 class="card-title">Initiative 3</h5>
                                <p class="card-text">Description of the third initiative project.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Initiative Card 4 -->
                    <div class="col-md-6">
                        <div class="card">
                            <img src="https://placehold.co/300x200" class="card-img-top" alt="Initiative 4">
                            <div class="card-body">
                                <h5 class="card-title">Initiative 4</h5>
                                <p class="card-text">Description of the fourth initiative project.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <footer class="bg-dark text-white py-4">
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
