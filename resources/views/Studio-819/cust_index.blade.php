<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <a href="booking.php" class="btn btn-primary btn-book-now mt-4">Book Now</a>
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