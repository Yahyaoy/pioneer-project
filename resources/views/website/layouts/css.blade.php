<style>
    :root {
        --primary-color: #13639E; /* Primary Color */
        --secondary-color: #2ecc71;
        --dark-color: #13639E;
        --light-color: #ecf0f1;
        --section-padding: 80px 0;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background-color: white
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        position: relative;
    }

    /* Top Footer (at very top) */
    .top-footer {
        background-color: var(--dark-color);
        color: white;
        padding: 15px 0;
        font-size: 0.9rem;
    }

    .top-footer a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
        transition: color 0.3s;
    }

    .top-footer a:hover {
        color: var(--secondary-color);
    }

    /* Header */
    header {
        /* background: linear-gradient(rgba(52, 73, 94, 0.8), rgba(52, 73, 94, 0.8)), url('/api/placeholder/1920/800') center/cover no-repeat; */
        color: white;
        text-align: center;
        padding: 150px 0;
    }

    header h1 {
        font-size: 3.5rem;
        margin-bottom: 20px;
    }

    header p {
        font-size: 1.2rem;
        max-width: 700px;
        margin: 0 auto 30px;
    }

    /* Navigation */
    .navbar {
        transition: all 0.3s;
    }

    .navbar.scrolled {
        background-color: var(--dark-color) !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        color: white !important;
        font-weight: 500;
        margin: 0 10px;
        position: relative;
    }

    .nav-link:after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: var(--secondary-color);
        bottom: 0;
        left: 0;
        transition: width 0.3s;
    }

    .nav-link:hover:after {
        width: 100%;
    }

    /* Section Styling */
    section {
        padding: var(--section-padding);
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .section-title:after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
        margin: 15px auto 0;
    }

    /* News Section - Carousel */
    #news {
        background-color: var(--light-color);
    }

    .carousel-item {
        height: 400px;
    }

    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        padding: 20px;
        bottom: 40px;
    }

    /* Initiatives Section */
    .initiative-card {
        margin-bottom: 30px;
        transition: transform 0.3s;
        height: 100%;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .initiative-card:hover {
        transform: translateY(-10px);
    }

    .initiative-image {
        height: 180px;
        background-size: cover;
        background-position: center;
    }

    .initiative-content {
        padding: 20px;
    }

    .initiative-title {
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--dark-color);
    }

    .initiative-description {
        color: #666;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 40px;
    }

    .btn-join {
        background-color: var(--primary-color);
        color: white;
        border: none;
        transition: background-color 0.3s;
    }

    .btn-join:hover {
        background-color: #2980b9;
    }

    /* Users Section */
    #users {
        background-color: var(--light-color);
    }

    .user-card {
        text-align: center;
        margin-bottom: 30px;
        transition: transform 0.3s;
        padding: 20px;
        border-radius: 8px;
        background-color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .user-card:hover {
        transform: translateY(-5px);
    }

    .user-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 15px;
        background-size: cover;
        background-position: center;
        border: 3px solid var(--primary-color);
    }

    .user-name {
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark-color);
    }

    .btn-view {
        background-color: var(--secondary-color);
        color: white;
        border: none;
        transition: background-color 0.3s;
    }

    .btn-view:hover {
        background-color: #27ae60;
    }

    /* Bottom Footer */
    .bottom-footer {
        background-color: var(--dark-color);
        color: white;
        padding: 50px 0 20px;
    }

    .footer-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: white;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: #bdc3c7;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover {
        color: var(--secondary-color);
    }

    .social-icons a {
        color: white;
        font-size: 1.5rem;
        margin-right: 15px;
        transition: color 0.3s;
    }

    .social-icons a:hover {
        color: var(--secondary-color);
    }

    .copyright {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Contact Form */
    .contact-form .form-control {
        margin-bottom: 15px;
        border-radius: 0;
    }

    .btn-submit {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 25px;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }

    /* Modal */
    .modal-content {
        border-radius: 8px;
    }

    .modal-header {
        background-color: var(--primary-color);
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .close {
        color: white;
    }

    /* Search bar */
    .search-container {
        margin-bottom: 30px;
    }

    #searchInput {
        border-radius: 30px;
        padding: 10px 20px;
        border: 1px solid #ddd;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        header {
            padding: 100px 0;
        }

        header h1 {
            font-size: 2.5rem;
        }

        .carousel-item {
            height: 300px;
        }
    }
</style>
