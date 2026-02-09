<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --header-bg-color: #ebdfd1;
            --text-color: #634832;
            --brand-color: #5a2025;
            --brand-color-hover: #45181c;
            --navbar-height: 80px; 
            --offer-section-bg: #e6d3c6; 
            --offer-card-bg: #f7f3ed; 
            --testimonial-bg: #ebdfd1; 
            --testimonial-card-bg: #5a3c39; 
            --heading-color: #634832; 
            --text-light: #f7f3ed; 
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333; 
            padding-top: var(--navbar-height);
        }

        .custom-navbar {
            background-color: var(--header-bg-color) !important;
            padding-top: 0.75rem; 
            padding-bottom: 0.75rem;
            position: fixed; 
            top: 0;
            width: 100%;
            z-index: 1030; 
            height: var(--navbar-height); 
        }

        .custom-navbar .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .navbar-brand-logo {
            height: 55px; 
        }
        
        .custom-navbar .nav-link:hover {
            color: var(--brand-color) !important;
        }

        .btn-sign-in {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            color: white !important;
            font-weight: 600;
            padding: 0.375rem 1.25rem;
            transition: all 0.2s ease;
        }

        .btn-sign-in:hover {
            background-color: var(--brand-color-hover) !important;
            border-color: var(--brand-color-hover) !important;
        }

        .hero-section {
            position: relative;
            width: 100%;
            background-image: url('Images/studio-bg.png'); 
            background-size: 120% auto; 
            background-position: 40% 50%; 
            min-height: calc(100vh - var(--navbar-height)); 
            display: flex;
            align-items: center; 
            padding: 6rem 0;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1); 
        }

        .hero-content-box {
            position: relative; 
            background-color: #f7f3ed; 
            padding: 3rem 3.5rem; 
            max-width: 500px; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .hero-headline {
            font-size: 3.5rem; 
            font-weight: 600;
            line-height: 1.1;
            color: var(--text-color);
            margin-bottom: 1.25rem;
        }

        .hero-box-brand {
            color: var(--text-color) !important;
            font-size: 1.2rem;
            font-weight: 700;
        }
        .hero-box-tagline {
            color: var(--text-color) !important;
            font-size: 0.8rem;
            margin-top: -5px;
            margin-bottom: 1rem;
        }

        .hero-description {
            color: var(--text-color);
            font-size: 1.1rem; 
        }
        
        .offer-section {
            background-color: var(--offer-section-bg);
            padding: 5rem 0;
            text-align: center;
        }

        .offer-section h2 {
            color: var(--heading-color);
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }

        .offer-card {
            background-color: var(--offer-card-bg);
            border-radius: 12px;
            padding: 2.5rem 1.5rem; 
            height: 280px; 
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center; 
            text-align: center; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }
        
        .offer-card:hover {
            transform: translateY(-5px); 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); 
            cursor: pointer; 
        }

        .offer-icon {
            color: var(--heading-color);
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
        }
        
        .offer-card h3 {
            color: var(--heading-color);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .offer-card p {
            color: var(--heading-color);
            font-size: 0.9rem;
            line-height: 1.4;
            opacity: 0.8;
            margin-bottom: 0; 
        }
        
        .btn-offer {
            background-color: var(--brand-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2.5rem;
            text-transform: uppercase;
            border-radius: 4px;
            transition: background-color 0.2s;
            margin-top: 3rem;
            display: inline-block;
            text-decoration: none; 
        }

        .btn-offer:hover {
            background-color: var(--brand-color-hover);
            color: white;
        }

        .testimonial-section-2 {
            background-color: var(--testimonial-bg);
            padding: 5rem 0;
            text-align: center;
        }

        .testimonial-section-2 h2 {
            color: var(--heading-color);
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }
        .testimonial-section-2 h2 span {
            display: block;
            font-size: 1.5rem;
            font-weight: 400;
            margin-top: -0.5rem;
        }

        .testimonial-card-fixed {
            background-color: var(--testimonial-card-bg);
            border-radius: 6px;
            padding: 2rem;
            height: 380px; 
            text-align: left;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column; 
            transition: all 0.3s ease-in-out;
        }
        
        .testimonial-card-fixed:hover {
            transform: translateY(-5px); 
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25); 
            cursor: pointer;
        }
        
        .testimonial-quote-icon-fix {
            font-size: 3rem;
            line-height: 1;
            color: var(--text-light);
            font-family: serif; 
            display: block;
            margin-bottom: 0.5rem;
            opacity: 1;
        }
        
        .testimonial-card-fixed .testimonial-text {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: auto; 
        }
        
        .testimonial-card-fixed .testimonial-author {
            color: var(--text-light);
            font-weight: 600;
            font-size: 1rem;
            margin-top: 1rem; 
            line-height: 1.2; 
        }

        .location-section {
            background-color: var(--offer-section-bg); 
            padding: 5rem 0;
        }

        .location-section h2 {
            color: var(--heading-color);
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .map-container {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .map-iframe {
            width: 100%;
            height: 400px; 
            border: 0;
        }

        .contact-info-block {
            padding-left: 1.5rem;
            color: var(--text-color);
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%; 
        }

        .contact-info-block h3 {
            color: var(--heading-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .contact-detail a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .contact-detail a:hover {
            color: var(--brand-color);
        }

        .contact-detail {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .contact-detail i {
            color: var(--brand-color);
            font-size: 1.2rem;
            margin-right: 10px;
            width: 20px;
        }

        .footer-section {
            background-color: var(--testimonial-bg); 
            padding: 2.5rem 0; 
            color: var(--text-color); 
        }
        
        .footer-section h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem; 
            text-transform: uppercase;
        }

        .contact-form .form-control {
            background-color: var(--testimonial-card-bg); 
            color: var(--text-light); 
            border: none;
            border-radius: 0; 
            padding: 0.65rem 1rem; 
            margin-bottom: 0.75rem; 
            line-height: 1.5;
            box-shadow: none;
            height: 45px; 
            display: flex;
            align-items: center;
        }
        
        .contact-form textarea.form-control {
            height: 100px; 
        }

        .contact-form .form-control::placeholder {
            color: var(--text-light); 
            opacity: 1; 
            line-height: 1.5; 
        }
        
        .contact-form .form-control:focus {
            background-color: var(--testimonial-card-bg);
            color: var(--text-light);
            box-shadow: 0 0 0 0.25rem rgba(90, 32, 37, 0.5); 
        }

        .btn-send {
            background-color: var(--brand-color); 
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.65rem 1.5rem; 
            text-transform: uppercase;
            border-radius: 4px; 
            transition: background-color 0.2s;
            display: inline-block; 
            width: auto;
            min-width: 100px;
            margin-top: 1rem; 
        }

        .btn-send:hover {
            background-color: var(--brand-color-hover);
            color: white;
        }

        .contact-details-footer {
            display: flex;
            flex-direction: column;
            justify-content: center; 
            padding-right: 0; 
            height: 100%;
        }

        .contact-details-inner {
            max-width: 250px; 
            width: 100%;
            margin-left: auto;
            
            & > div:not(:last-child) {
                margin-bottom: 1.5rem; 
            }
        }
        
        .contact-details-footer h4 {
            color: var(--text-color);
            font-weight: 700;
            margin-bottom: 0.5rem; 
            margin-top: 0; 
            text-align: left; 
        }

        .contact-details-footer .detail a {
            color: var(--text-color);
            font-weight: 700;
            font-size: 1.3rem; 
            text-decoration: none;
            transition: color 0.2s;
            display: block;
            text-align: left; 
        }
        
        .social-links {
            margin-top: 0.5rem; 
            text-align: left; 
        }
        
        .social-links a {
            color: var(--text-color);
            font-size: 2rem; 
            margin-right: 1.2rem; 
            margin-left: 0;
            transition: color 0.2s;
            text-decoration: none;
        }
        
        .social-links a:hover {
            color: var(--brand-color);
        }
        
        @media (max-width: 991.98px) {
            .footer-section {
                padding: 2rem 0;
            }
            .contact-details-footer {
                padding-left: 0;
                margin-top: 2rem; 
            }
            .contact-form .form-control {
                width: 100%; 
            }
            .contact-details-inner {
                max-width: 100%;
                margin-left: auto !important;
                margin-right: auto !important;
                text-align: center; 
            }
            .contact-details-footer h4,
            .contact-details-footer .detail a,
            .social-links {
                text-align: center; 
            }
            .social-links a {
                margin: 0 0.6rem; 
            }
        }
    </style>
</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index.php">
                <img src="Images/logo.png" alt="Studio 819 Logo" class="navbar-brand-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819') }}">Home</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-about') }}">About</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-services') }}">Services</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-sign-in" href="{{ url('/Studio-819-login-singup') }}">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container-fluid p-0 d-flex hero-content-wrapper">
            <div class="hero-content-left col-lg-6 col-md-12">
                <div class="hero-text-container">
                    <div class="mb-3">
                        <div class="hero-box-brand">studio 819</div>
                        <div class="hero-box-tagline">SELF-PHOTO STUDIO</div>
                    </div>
                    <h1 class="hero-headline">Make some good memories today</h1>
                    <p class="hero-description hero-home-text">
                        Studio 819 turns moments into memories. Capture love, life, and everything in between.
                    </p>
                    <a href="{{ url('/Studio-819-login-singup') }}" class="btn btn-primary btn-book-now mt-4">Book Now</a>
                </div>
            </div>
            <div class="hero-image-right col-lg-6 d-none d-lg-block">
                <img src="Images/studio_home-bg.png" alt="Studio interior with lighting equipment" class="img-fluid hero-full-image">
            </div>
        </div>
    </header>

    <main>
        <!-- About Section -->
        <section class="about-preview-section">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="Images/about-preview.png" alt="DSLR camera on a tripod head" class="img-fluid about-preview-image">
                    </div>
                    <div class="col-lg-6 about-preview-content">
                        <h2 class="about-headline">About Us</h2>
                        <p class="about-text">
                            At Studio 819, we believe every frame captures more than the eye can see — it carries a moment, a feeling, a story meant to be. We craft visuals that feel personal and intentional, shaped with passion and design, so every image you keep becomes a memory that shines.
                        </p>
                        <a href="about.php" class="btn btn-primary btn-know-more">Know More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Services Section -->
        <section class="popular-services-section">
            <div class="container-fluid popular-services-wrapper">
                <div class="d-flex justify-content-between align-items-center mb-5 popular-services-header">
                    <h2 class="popular-services-headline">Popular Services</h2>
                    <a href="services.php" class="view-more-services-link">VIEW MORE SERVICES</a>
                </div>
                <div class="services-carousel-wrapper">

                    <!-- Left Arrow -->
                    <button class="carousel-arrow left-arrow" id="carousel-prev" aria-label="Previous services">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <!-- Track -->
                    <div class="services-track" id="services-track">

                        <!-- BASIC PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-6 mb-4">
                            <div class="service-card">
                                <img src="Images/basic-preview.png" alt="Basic Package" class="card-img-top service-img"> 
                                <div class="card-content">
                                    <h3 class="card-title">Basic Package</h3>
                                    <p class="card-detail">1-2 pax</p>
                                    <p class="card-detail">30 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 650.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- FAMILY PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-6 mb-4">
                            <div class="service-card">
                                <img src="Images/family-preview.png" alt="Family Package" class="card-img-top service-img">
                                <div class="card-content">
                                    <h3 class="card-title">Family Package</h3>
                                    <p class="card-detail">Up to 4 pax</p>
                                    <p class="card-detail">45 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 1,400.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- PHOTOBOX PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-6 mb-4">
                            <div class="service-card">
                                <img src="Images/photobox-preview.png" alt="Photobox Package" class="card-img-top service-img">
                                <div class="card-content">
                                    <h3 class="card-title">Photobox Package</h3>
                                    <p class="card-detail">1-2 pax</p>
                                    <p class="card-detail">15 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 650.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- LITE PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-6 mb-4">
                            <div class="service-card">
                                <img src="Images/lite-preview.png" alt="Lite Package" class="card-img-top service-img"> 
                                <div class="card-content">
                                    <h3 class="card-title">Lite Package</h3>
                                    <p class="card-detail">1-2 pax</p>
                                    <p class="card-detail">30 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 650.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- CHRISTMAS PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-6 mb-4">
                            <div class="service-card">
                                <img src="Images/christmas-family-preview.png" alt="Christmas Family Package" class="card-img-top service-img">
                                <div class="card-content">
                                    <h3 class="card-title">Christmas Family/Group</h3>
                                    <p class="card-detail">Up to 5 pax</p>
                                    <p class="card-detail">45 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 1,400.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- YEARBOOK PACKAGE -->
                        <div class="service-card-item col-lg-4 col-md-12 mb-4">
                            <div class="service-card">
                                <img src="Images/yearbook-preview.png" alt="Yearbook Package" class="card-img-top service-img">
                                <div class="card-content">
                                    <h3 class="card-title">Yearbook Package</h3>
                                    <p class="card-detail">1-3 pax</p>
                                    <p class="card-detail">15 minutes</p>
                                    <a href="booking.php" class="btn btn-package">P 650.00 <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Arrow -->
                    <button class="carousel-arrow right-arrow" id="carousel-next" aria-label="Next services">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                </div>

                <!-- Pagination Dots -->
                <div class="d-flex justify-content-center mt-3" id="carousel-dots-container">
                    <span class="pagination-dot active-dot" data-index="0"></span>
                    <span class="pagination-dot" data-index="1"></span>
                    <span class="pagination-dot" data-index="2"></span>
                    <span class="pagination-dot" data-index="3"></span>
                    <span class="pagination-dot" data-index="4"></span>
                    <span class="pagination-dot" data-index="5"></span>
                </div>

            </div>
        </section>

    </main>

    <!-- How to Book Section -->
    <section class="how-to-book-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="how-to-book-headline">How to Book?</h2>
            <p class="how-to-book-subtext">Reserve your session in just a few simple steps!</p>
        </div>

        <div class="row justify-content-center how-to-book-steps-container">
            <div class="how-to-book-step">
                <div class="step-number">1</div>
                <div class="step-text-content">
                    <h3 class="step-title">Choose Your Package</h3>
                    <p class="step-description">Select the photo package that fits your needs.</p>
                </div>
            </div>

            <div class="step-arrow-container d-none d-lg-flex">
                <i class="bi bi-chevron-right step-arrow"></i>
            </div>
            
            <div class="how-to-book-step">
                <div class="step-number">2</div>
                <div class="step-text-content">
                    <h3 class="step-title">Pick a Date & Time</h3>
                    <p class="step-description">Check availability and reserve your preferred slot.</p>
                </div>
            </div>

            <div class="step-arrow-container d-none d-lg-flex">
                <i class="bi bi-chevron-right step-arrow"></i>
            </div>

            <div class="how-to-book-step final-step">
                <div class="step-number">3</div>
                <div class="step-text-content">
                    <h3 class="step-title">Book & Pay Online</h3>
                    <p class="step-description">Fill out the form and secure your session in seconds.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="booking.php" class="btn btn-book-now">BOOK NOW</a>
        </div>
    </div>
</section>

<!-- Location Section -->
<section class="location-section">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-6 mb-4 mb-lg-0 location-details-wrapper">
                <h2 class="location-headline">Where can you find us?</h2>
                
                <div class="location-detail-block">
                    <p class="location-title">Studio 819</p>
                    <p class="location-text">
                        172 General Luna St., Herrera, Malabon City
                        <br>(2nd Floor, Above Alfamart)
                    </p>
                </div>

                <div class="location-contact-item mt-4">
                    <i class="bi bi-telephone-fill"></i>
                    <p class="location-text">0916 850 2077</p>
                </div>

                <div class="location-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <p class="location-text"><a href="mailto:studio819ph@gmail.com">studio819ph@gmail.com</a></p>
                </div>
            </div>

            <div class="col-lg-6 location-map-wrapper">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d341.16614999134043!2d120.94931020546436!3d14.66420467361465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b58c7293541d%3A0x4b714ce5af4c392f!2sStudio%20819%20Self-Photo%20Studio!5e0!3m2!1sen!2sph!4v1765383247167!5m2!1sen!2sph" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="location-map">
                </iframe>
            </div>

        </div>
    </div>
</section>

 <!-- Footer Section -->
    <section class="footer-section">

    <section class="footer-section">
        <div class="container">
            <div class="row align-items-center"> 
                
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h4 class="mb-4">Message Us</h4>
                    <form class="contact-form">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                        <input type="email" class="form-control" placeholder="Your Email" required>
                        <textarea class="form-control" placeholder="Your Message" rows="5" required></textarea>
                        <button type="submit" class="btn btn-send">SEND</button>
                    </form>
                </div>
                
                <div class="col-lg-6 contact-details-footer">
                    
                    <div class="contact-details-inner ms-auto">
                        <div>
                            <h4>Call Us On</h4>
                            <div class="detail">
                                <a href="tel:09168502077">0916 850 2077</a>
                            </div>
                        </div>

                        <div>
                            <h4>Or Email Us</h4>
                            <div class="detail">
                                <a href="mailto:studio819ph@gmail.com">studio819ph@gmail.com</a>
                            </div>
                        </div>
                        
                        <div>
                            <h4>Social Us</h4>
                            <div class="social-links">
                                <a href="https://facebook.com/studio819ph" target="_blank" aria-label="Facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="https://instagram.com/studio819ph" target="_blank" aria-label="Instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>