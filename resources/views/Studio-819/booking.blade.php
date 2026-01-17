<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Studio 819</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
:root {
    --header-bg-color: #ebdfd1;
    --text-color: #634832;
    --brand-color: #5a2025;
    --brand-color-hover: #45181c;
    --navbar-height: 80px; 
    --testimonial-bg: #ebdfd1; 
    --testimonial-card-bg: #5a3c39; 
    --heading-color: #634832; 
    --text-light: #f7f3ed; 
    --step-active-color: #724f48;
    --step-inactive-color: #c9c0b7; 
    --step-completed-color: #a0887e; 
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    color: #333; 
    padding-top: var(--navbar-height);
    background-color: var(--text-light);
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

.navbar-brand-logo { height: 55px; }

.custom-navbar .nav-link:hover { color: var(--brand-color) !important; }

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

/* --- HERO/Booking Section STYLES --- */
.hero-section {
    position: relative;
    width: 100%;
    background-image: none !important;
    background-color: var(--text-light); 
    min-height: calc(100vh - var(--navbar-height) - 50px); 
    display: flex;
    justify-content: center;
    align-items: center; 
    padding: 3rem 0;
}

/* --- BOOKING CARD STYLES --- */
.booking-card {
    background-color: #f7f3ed;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    margin: auto;
    text-align: center;
}

.booking-title {
    color: var(--text-color);
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 2rem;
}

.booking-form .form-label {
    color: var(--text-color);
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 8px;
    text-align: left;
    width: 100%;
}

.booking-form .form-control, 
.booking-form .form-select {
    padding: 12px 15px;
    border: 1px solid #c9c0b7; 
    border-radius: 5px;
    font-size: 1rem;
    color: #333;
    background-color: #ffffff;
    box-shadow: none;
}

.booking-form .form-control:focus,
.booking-form .form-select:focus {
    border-color: var(--text-color);
    box-shadow: 0 0 0 0.25rem rgba(99, 72, 50, 0.25);
}

.date-time-group .input-group-text {
    background-color: white;
    border: 1px solid #c9c0b7;
    border-right: none;
    color: var(--text-color);
    font-size: 1.2rem;
}

.btn-confirm, .btn-next {
    background-color: #724f48;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 2rem;
    transition: background-color 0.2s;
    width: 100%;
    max-width: 200px;
}

.btn-confirm:hover, .btn-next:hover {
    background-color: #5d423b;
    color: white;
}

.btn-back {
    background-color: #c9c0b7;
    color: var(--text-color);
    padding: 10px 30px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 2rem;
    transition: background-color 0.2s;
    width: 100%;
    max-width: 150px;
}

.btn-back:hover {
    background-color: #b0a79d;
}

/* --- STEP PROGRESS STYLES --- */
.step-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 30px;
    padding: 0 15px;
}

.step {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    text-align: center;
    color: var(--step-inactive-color);
    font-weight: 600;
    font-size: 0.9rem;
}

.step-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: var(--step-inactive-color);
    color: white;
    font-size: 1.1rem;
    line-height: 35px;
    font-weight: 700;
    margin-bottom: 5px;
    z-index: 10;
}

/* Active Step Styling */
.step.active .step-circle {
    background-color: var(--step-active-color);
}
.step.active {
    color: var(--step-active-color);
}

/* Completed Step Styling */
.step.completed .step-circle {
    background-color: var(--step-completed-color);
}
.step.completed {
    color: var(--step-completed-color);
}


.step:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 17px; 
    left: calc(50% + 17px); 
    width: calc(100% - 34px);
    height: 3px;
    background-color: var(--step-inactive-color);
    z-index: 5; 
}

#progress-step-1:not(:last-child)::after {
    left: calc(50% + 17px);
    width: calc(100% - 34px);
}

#progress-step-4::after {
    content: none !important;
}

.step-name { margin-top: 5px; }

.customer-info-title {
    color: var(--text-color);
    font-weight: 700;
    font-size: 1.2rem;
    text-align: left;
    margin-bottom: 1.5rem;
}

.step-content { display: none; }
.step-content.active { display: block; }


/* --- FOOTER STYLES --- */
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
        <a class="navbar-brand" href="index.html">
            <img src="Images/logo.png" alt="Studio 819 Logo" class="navbar-brand-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819') }}">Home</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="{{ url('/Studio-819-about') }}">About</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="services.html">Services</a></li>
                <li class="nav-item me-4"><a class="nav-link active" aria-current="page" href="{{ url('/Studio-819-booking') }}">Booking</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="contact.html">Contact</a></li>
                <li class="nav-item"><a class="btn btn-sign-in" href="loginsignup.html">Sign In</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
        
        <div class="booking-card">

            <div id="step-1" class="step-content active">
                <h2 class="booking-title">Request Booking</h2>

                <form class="booking-form" onsubmit="event.preventDefault(); nextStep();">
                    <div class="mb-4">
                        <label for="package" class="form-label">Package</label>
                        <select id="package" class="form-select" required>
                            <option value="" disabled selected>Select Package</option>
                            <option value="lite">Lite Package</option>
                            <option value="basic">Basic Package</option>
                            <option value="premium">Premium Package</option>
                            <option value="family-group">Family/Group Package</option>
                            <option value="yearbook">Yearbook Package</option>
                            <option value="photobox">Photobox</option>
                            <option value="xmas-duo">Christmas DUO (Self-Shoot)</option>
                            <option value="xmas-family">Christmas FAMILY/GROUP</option>
                            <option value="xmas-photographer">Christmas Photographer Session</option>
                        </select>
                    </div>

                    <div class="row date-time-group mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="date" class="form-label">Date</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                <input type="date" id="date" class="form-control" placeholder="Select a Date" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="time" class="form-label">Time</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                <select id="time" class="form-select" required>
                                    <option value="" disabled selected>Select Time</option>
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                         <button type="submit" class="btn btn-confirm">Confirm</button>
                    </div>
                </form>
            </div>


            <div id="step-2" class="step-content">
                
                <h2 class="booking-title">Complete your reservation</h2>

                <div class="step-container">
                    <div class="step active" id="progress-step-1">
                        <div class="step-circle">1</div>
                        <span class="step-name">Information</span>
                    </div>
                    <div class="step" id="progress-step-2">
                        <div class="step-circle">2</div>
                        <span class="step-name">Session Details</span>
                    </div>
                    <div class="step" id="progress-step-3">
                        <div class="step-circle">3</div>
                        <span class="step-name">Payment</span>
                    </div>
                    <div class="step" id="progress-step-4">
                        <div class="step-circle">4</div>
                        <span class="step-name">Review</span>
                    </div>
                </div>

                <form class="booking-form" onsubmit="event.preventDefault(); submitAndReset();">
                    <p class="customer-info-title">Customer Information</p>
                    
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" id="firstName" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" id="lastName" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-back" onclick="previousStep()">Back</button> 
                        <button type="submit" class="btn btn-next">Submit Booking</button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
</header>

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

<script>
    let currentView = 1; 


    function updateViews(newView) {
        document.getElementById('step-' + currentView).classList.remove('active');
        document.getElementById('step-' + newView).classList.add('active');

        const formalStep = newView - 1; 

        const steps = [1, 2, 3, 4];
        steps.forEach(stepNum => {
            const stepElement = document.getElementById('progress-step-' + stepNum);
            
            if (!stepElement) return;

            stepElement.classList.remove('active', 'completed');

            if (stepNum < formalStep) {
                stepElement.classList.add('completed');
            } else if (stepNum === formalStep) {
                stepElement.classList.add('active');
            }
        });

        currentView = newView; 

        document.querySelector('.booking-card').scrollIntoView({ behavior: 'smooth' });
    }

    /**
     * Handles progression from the current view (Request Booking) to Customer Info.
     */
    function nextStep() {
        if (currentView === 1) {
            
            // Basic validation for Request Booking fields
            const package = document.getElementById('package').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;

            if (package && date && time) {
                updateViews(2); 
            } else {
                alert("Please select a package, date, and time before proceeding.");
            }
        }
    }

    /**
     * Final Submission function for Activity 3/4 pause.
     * Validates Step 2 (Customer Info) and resets to the starting Request Booking view.
     */
    function submitAndReset() {
        // Basic validation for Customer Info fields
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        
        if (firstName && lastName && email && phone) {
            // 1. Simulate submission/database interaction
            alert("Booking Submitted! Your information has been captured. You will receive an email confirmation shortly.");
            
            // 2. Clear all form fields (including Step 1 fields) for a fresh start
            document.getElementById('firstName').value = '';
            document.getElementById('lastName').value = '';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
            
            // Reset Step 1 form fields as well (Package, Date, Time)
            document.getElementById('package').value = '';
            document.getElementById('date').value = '';
            document.getElementById('time').value = '';


            // 3. Reset view back to Request Booking (View 1)
            updateViews(1);
        } else {
            alert("Please fill in all customer information fields before submitting.");
        }
    }

    /**
     * Moves back one step.
     */
    function previousStep() {
        if (currentView > 1) {
            updateViews(currentView - 1); // Move back to the previous view (Request Booking)
        }
    }
    
    // --- TIME DROPDOWN POPULATION ---
    (function() {
        const timeSelect = document.getElementById('time');
        
        // Populate options from 1:00 pm (13:00) to 7:30 pm (19:30) in 30-minute increments
        for (let h = 13; h <= 19; h++) { 
            for (let m of [0, 30]) {
                if (h === 19 && m > 30) continue; 
                if (h > 19) break;

                let hour12 = h > 12 ? h - 12 : h;
                let minutes = m === 0 ? '00' : m;
                let ampm = 'pm';

                let timeValue = `${String(h).padStart(2, '0')}:${minutes}`;
                let timeLabel = `${hour12}:${minutes} ${ampm}`;

                const option = document.createElement('option');
                option.value = timeValue;
                option.textContent = timeLabel;
                
                timeSelect.appendChild(option);
            }
        }
    })();
</script>

</body>
</html>