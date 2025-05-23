<!DOCTYPE html>
<html lang="en">
@include('website.layouts.head')
<body>

    <!-- Navigation Bar (Sticky) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="" style="color:rgb(233, 171, 56)">Pioneer</a>
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
                    <li style="position: relative; display: inline-block;">
                        <button onclick="toggleDropdown()" style="background-color: white; color: #13639E; border: none; padding: 10px 20px; border-radius: 5px; margin-left: 10px;">
                            Admin/Owner
                        </button>
                        <ul id="loginDropdown" style="display: none; position: absolute; background-color: white; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); border-radius: 5px; padding: 0; margin-top: 5px; z-index: 1;">
                            <li style="list-style: none;">
                                <a href="{{ route('admin.login') }}" style="color: #13639E; padding: 12px 16px; text-decoration: none; display: block;">Admin</a>
                            </li>
                            <li style="list-style: none;">
                                <a href="{{ route('owner.login') }}" style="color: #13639E; padding: 12px 16px; text-decoration: none; display: block;">Owner</a>
                            </li>
                        </ul>
                    </li>

                    <script>
                        function toggleDropdown() {
                            var dropdown = document.getElementById("loginDropdown");
                            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
                        }
                    </script>




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


    <div class="content">
         @yield('content')
    </div>

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




    @include('website.layouts.js')

</body>
</html>

