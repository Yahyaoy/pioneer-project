 <!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
 <!-- AOS - Animate On Scroll -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

 <!-- Custom JavaScript -->
 <script>
     // Initialize AOS
     AOS.init();

     // Navbar color change on scroll
     window.addEventListener('scroll', function() {
         const navbar = document.querySelector('.navbar');
         if (window.scrollY > 100) {
             navbar.classList.add('scrolled');
         } else {
             navbar.classList.remove('scrolled');
         }
     });

 </script>


@yield('scripts')
