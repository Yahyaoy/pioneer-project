<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive One-Page Website</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- AOS - Animate On Scroll -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
      @include('website.layouts.css')
      @include('website.layouts.modal')

</head>
<body>

    <!-- Modal HTML (Dialog) -->
<div class="modal" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="joinModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="joinModalLabel">Join Initiative</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="initiativeName">Clean Ocean Initiative</h5>
                <p id="initiativeDescription">Working to remove plastic from oceans and promoting sustainable practices.</p>
                <div class="form-group">
                    <label for="joinMessage">Why do you want to join?</label>
                    <textarea id="joinMessage" class="form-control" rows="3" placeholder="Tell us why you're interested..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                <button type="button" class="btn btn-primary" onclick="confirmJoin()">Confirm Join</button>
            </div>
        </div>
    </div>
</div>

    <!-- Top Footer (placed at the very top) -->
    {{-- <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span><i class="fas fa-envelope"></i> info@example.com</span>
                    <span class="ms-3"><i class="fas fa-phone"></i> +1 234 567 8900</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Navigation Bar (Sticky) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
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
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" style="background-image: url('https://assets.rbl.ms/27044751/origin.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height: 100vh; display: flex; align-items: center;">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h1>Welcome to Our Platform</h1>
                <p>Join our community and be part of amazing initiatives that change the world</p>
                <a href="#initiatives" class="btn btn-lg btn-outline-light">Explore Initiatives</a>
            </div>
        </div>
    </header>



    <!-- News Section with Carousel -->
    <section id="news" style="background-color: #f8f9fa; ">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Latest News</h2>
            <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="200">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div style="height: 400px; overflow: hidden;">
                          <img src="https://www.thrivecyn.ca/wp-content/uploads/2024/11/Education-Initiatives.png"
                               class="d-block w-100 h-100 object-fit-cover" alt="News 1">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                          <h5>New Environmental Initiative Launched</h5>
                          <p>We're excited to announce our latest initiative focused on sustainable city development.</p>
                          <button class="btn btn-primary">Read More</button>
                        </div>
                      </div>

                      <div class="carousel-item active">
                        <div style="height: 400px; overflow: hidden;">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi4bYQZQHCzXawhYUiaU0MF8Rr8MEjl-pXeQ&s"
                               class="d-block w-100 h-100 object-fit-cover" alt="News 1">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                          <h5>New Environmental Initiative Launched</h5>
                          <p>We're excited to announce our latest initiative focused on sustainable city development.</p>
                          <button class="btn btn-primary">Read More</button>
                        </div>
                      </div>

                      <div class="carousel-item active">
                        <div style="height: 400px; overflow: hidden;">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQURGHh2xObdpdwawRQ-JwiuKXxp9bhnOndGQ&s"
                               class="d-block w-100 h-100 object-fit-cover" alt="News 1">
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                          <h5>New Environmental Initiative Launched</h5>
                          <p>We're excited to announce our latest initiative focused on sustainable city development.</p>
                          <button class="btn btn-primary">Read More</button>
                        </div>
                      </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Initiatives Section -->
    @include('website.layouts.initiative')

    <!-- Users Section -->
    @include('website.layouts.users')

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
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Footer -->
    <footer class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="footer-title">About Us</h4>
                    <p>We're dedicated to connecting people with meaningful initiatives that make a difference in communities around the world.</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="footer-title">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#news">News</a></li>
                        <li><a href="#initiatives">Initiatives</a></li>
                        <li><a href="#users">Community</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4 class="footer-title">Newsletter</h4>
                    <p>Subscribe to our newsletter to stay updated.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your Email" aria-label="Email" aria-describedby="button-addon2">
                        <button class="btn btn-outline-light" type="button" id="button-addon2">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="text-center copyright">
                <p>© 2025 Your Company. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Modal for Initiatives -->
    <div class="modal fade" id="userInitiativesModal" tabindex="-1" aria-labelledby="userInitiativesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userInitiativesModalTitle">User's Initiatives</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="userInitiativesModalBody">
                    <!-- Content will be populated via JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
   @include('website.layouts.js')
