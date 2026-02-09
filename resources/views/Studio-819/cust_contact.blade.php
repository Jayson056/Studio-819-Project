<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Studio 819</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --header-bg-color: #ebdfd1;
            --text-color: #634832;
            --brand-color: #5a2025;
            --brand-color-hover: #45181c;
            --navbar-height: 80px;
            --section-bg: #f7f3ed;
            --form-input-bg: #5a3c39;
            /* Dark brown from booking footer */
            --text-light: #f7f3ed;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: var(--text-color);
            padding-top: var(--navbar-height);
            background-color: var(--section-bg);
        }

        /* --- Navigation (Identical to booking.html) --- */
        .custom-navbar {
            background-color: var(--header-bg-color) !important;
            height: var(--navbar-height);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            display: flex;
            align-items: center;
        }

        .navbar-brand-logo {
            height: 55px;
        }

        .custom-navbar .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: color 0.2s ease;
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
            border-radius: 4px;
        }

        /* --- Main Contact Section --- */
        .contact-hero {
            padding: 60px 0;
            min-height: calc(100vh - var(--navbar-height) - 100px);
            display: flex;
            align-items: center;
        }

        .contact-card {
            background-color: #f7f3ed;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
        }

        .section-title {
            color: var(--text-color);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        /* --- Form Styles (Matching Booking Footer) --- */
        .contact-form .form-control {
            background-color: var(--form-input-bg);
            color: var(--text-light) !important;
            border: none;
            border-radius: 0;
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
            box-shadow: none;
        }

        .contact-form .form-control::placeholder {
            color: var(--text-light);
            opacity: 0.7;
        }

        .contact-form .form-control:focus {
            background-color: var(--form-input-bg);
            box-shadow: 0 0 0 0.25rem rgba(90, 32, 37, 0.3);
        }

        .btn-send {
            background-color: var(--brand-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 2.5rem;
            text-transform: uppercase;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-send:hover {
            background-color: var(--brand-color-hover);
            color: white;
        }

        /* --- Info Side Styles --- */
        .info-label {
            color: var(--text-color);
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
            opacity: 0.8;
        }

        .info-detail a {
            color: var(--text-color);
            font-weight: 700;
            font-size: 1.5rem;
            text-decoration: none;
            display: block;
            margin-bottom: 30px;
            transition: color 0.2s;
        }

        .info-detail a:hover {
            color: var(--brand-color);
        }

        .social-links-contact a {
            color: var(--text-color);
            font-size: 2.2rem;
            margin-right: 1.5rem;
            transition: color 0.2s;
        }

        .social-links-contact a:hover {
            color: var(--brand-color);
        }

        /* --- Footer (Matching Booking Footer Color) --- */
        .footer-simple {
            background-color: var(--header-bg-color);
            padding: 40px 0;
            color: var(--text-color);
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid container">
            <a class="navbar-brand" href="{{ route('Studio-819/index') }}">
                <img src="{{ asset('Images/logo.png') }}" alt="Studio 819 Logo" class="navbar-brand-logo">
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

    <section class="contact-hero">
        <div class="container">
            <div class="contact-card">
                <div class="row g-5">
                    <div class="col-lg-7">
                        <h4 class="section-title">Message Us</h4>
                        <form class="contact-form" id="contactForm">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                            <input type="email" class="form-control" placeholder="Your Email" required>
                            <textarea class="form-control" placeholder="Your Message" rows="6" required></textarea>
                            <button type="submit" class="btn btn-send">Send Message</button>
                        </form>
                    </div>

                    <div class="col-lg-5">
                        <div class="ps-lg-4">
                            <h4 class="section-title">Get In Touch</h4>

                            <div>
                                <p class="info-label">Call Us On</p>
                                <div class="info-detail">
                                    <a href="tel:09168502077">0916 850 2077</a>
                                </div>
                            </div>

                            <div>
                                <p class="info-label">Or Email Us</p>
                                <div class="info-detail">
                                    <a href="mailto:studio819ph@gmail.com">studio819ph@gmail.com</a>
                                </div>
                            </div>

                            <div>
                                <p class="info-label">Social Us</p>
                                <div class="social-links-contact">
                                    <a href="https://facebook.com/studio819ph" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://instagram.com/studio819ph" target="_blank"><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-simple">
        <div class="container">
            <img src="{{ asset('Images/logo.png') }}" alt="Studio 819" height="40" class="mb-3" style="opacity: 0.8;">
            <p class="mb-2">172 General Luna St., Herrera, Malabon City</p>
            <p class="small opacity-75">&copy; 2026 Studio 819. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you! Your message has been sent to Studio 819.');
            this.reset();
        });
    </script>

</body>

</html>