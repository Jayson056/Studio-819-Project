<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid container">
            <a class="navbar-brand" href="{{ route('Studio-819/index') }}">
                <img src="Images/logo.png" alt="Studio 819 Logo" class="navbar-brand-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_index') }}">Home</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_about') }}">About</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_services') }}">Services</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_contact') }}">Contact</a></li>

                    <li class="nav-item">
                        <a class="btn btn-outline-dark px-3 me-2" href="{{ route('user.profile') }}">
                            <i class="bi bi-arrow-left me-1"></i> Back to Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7">
                    <div class="hero-content-box">
                        <div class="mb-3">
                            <div class="hero-box-brand">studio 819</div>
                            <div class="hero-box-tagline">SELF-PHOTO STUDIO</div>
                        </div>

                        <h1 class="hero-headline">
                            Make some good memories today
                        </h1>

                        <p class="hero-description">
                            Studio 819 turns your moments into memories you can keep forever. Choose from our self-shoot and photographer packages designed to fit every occasion.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="offer-section">
            <div class="container">
                <h2>What We Offer</h2>
                
                <div class="row justify-content-center g-4">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="offer-card">
                            <i class="bi bi-camera offer-icon"></i>
                            <h3>Self-Photo Studio</h3>
                            <p>Shoot freely with a remote in a private space</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="offer-card">
                            <i class="bi bi-people offer-icon"></i>
                            <h3>Photographer Sessions</h3>
                            <p>Guided shoots for polished, professional photos</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="offer-card">
                            <i class="bi bi-hand-thumbs-up offer-icon"></i> 
                            <h3>Accessible for Everyone</h3>
                            <p>Affordable packages with a quick, easy booking process.</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="offer-card">
                            <i class="bi bi-heart offer-icon"></i>
                            <h3>Memorable Experience</h3>
                            <p>A fun studio made for capturing your best moments</p>
                        </div>
                    </div>
                </div>

                <a href="services.php" class="btn-offer">View Our Services</a>

            </div>
        </section>
        <section class="testimonial-section-2">
            <div class="container">
                <h2>
                    What Our Clients Say About Us
                </h2>
                
                <div class="row justify-content-center g-4">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card-fixed">
                            <div class="testimonial-quote-icon-fix">“</div>
                            <p class="testimonial-text">
                                Very recommended, affordable price, free to use ng napaka raming props, hindi ka maiilang kasi you have privacy, maganda ang place kahit di ganun kalakihan, mabait din ang staff
                            </p>
                            <span class="testimonial-author">- Cheng Molina</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card-fixed">
                            <div class="testimonial-quote-icon-fix">“</div>
                            <p class="testimonial-text">
                                ang ganda ng outcome ng mga pictures at may privacy ka in taking photos as you have to it on your own maraming options for props at walang tapon sa pics ganda ng lightning surely na babalik at will do another year end photos. ang babait din ng mga staff.
                            </p>
                            <span class="testimonial-author">- Jenny Eyoy - Dauba</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card-fixed">
                            <div class="testimonial-quote-icon-fix">“</div>
                            <p class="testimonial-text">
                                Very considerate and accommodating staff, will definitely recommend this! Affordable and high quality photos. See you on our next booking!
                            </p>
                            <span class="testimonial-author">- Marineil Dela Cruz - Usi</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="location-section">
            <div class="container">
                <h2>Location & Contact</h2>
                
                <div class="row d-flex align-items-stretch">
                    <div class="col-lg-7 mb-4">
                        <div class="map-container">
                            <iframe 
                                class="map-iframe" 
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d341.16614999134043!2d120.94931020546436!3d14.66420467361465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b58c7293541d%3A0x4b714ce5af4c392f!2sStudio%20819%20Self-Photo%20Studio!5e0!3m2!1sen!2sph!4v1765383247167!5m2!1sen!2sph"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 mb-4">
                        <div class="contact-info-block">
                            <h3>Studio 819</h3>
                            <p>
                                172 General Luna St, Herrera, Malabon City<br>
                                (2nd Floor, Above Alfamart)
                            </p>
                            
                            <p>
                                <strong>Operating Hours</strong><br>
                                1:00 PM – 7:00 PM
                            </p>
                            
                            <div class="contact-detail">
                                <i class="bi bi-phone"></i> 
                                <a href="tel:09168502077" target="_blank">0916 850 2077</a>
                            </div>
                            <div class="contact-detail">
                                <i class="bi bi-envelope"></i> 
                                <a href="mailto:studio819ph@gmail.com" target="_blank">studio819ph@gmail.com</a>
                            </div>
                            <div class="contact-detail">
                                <i class="bi bi-facebook"></i> 
                                <a href="https://facebook.com/studio819ph" target="_blank">facebook.com/studio819ph</a>
                            </div>
                            <div class="contact-detail">
                                <i class="bi bi-instagram"></i> 
                                <a href="https://instagram.com/studio819ph" target="_blank">instagram.com/studio819ph</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </main>

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
</body>
</html>