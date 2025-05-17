<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Initiative</title>
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

    <!-- Join Form Section -->
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 mb-4" data-aos="fade-up">
                <h1 class="display-4 mb-4">Join Our Initiative</h1>
                <div class="form-section">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" class="form-control" name="age" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Skills & Experience</label>
                            <textarea class="form-control" name="skills" rows="3" placeholder="Tell us about your relevant skills and experience"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Availability</label>
                            <select class="form-control" name="availability" required>
                                <option value="">Select your availability</option>
                                <option value="weekdays">Weekdays</option>
                                <option value="weekends">Weekends</option>
                                <option value="both">Both Weekdays & Weekends</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Why do you want to join?</label>
                            <textarea class="form-control" name="motivation" rows="4" required placeholder="Share your motivation for joining this initiative"></textarea>
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
                            <h4>Environmental Conservation Project</h4>
                            <p class="text-muted">Join us in making a difference for our environment</p>
                            <div class="mb-3">
                                <i class="fas fa-calendar-alt me-2"></i> Duration: 6 months
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i> Location: New York City
                            </div>
                            <div class="mb-3">
                                <i class="fas fa-users me-2"></i> Current Participants: 150
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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