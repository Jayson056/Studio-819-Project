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

        .btn-confirm,
        .btn-next {
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

        .btn-confirm:hover,
        .btn-next:hover {
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

        .step-name {
            margin-top: 5px;
        }

        .customer-info-title {
            color: var(--text-color);
            font-weight: 700;
            font-size: 1.2rem;
            text-align: left;
            margin-bottom: 1.5rem;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }


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

    <header class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">


            <form action="{{ route('booking.store') }}" method="POST" id="mainBookingForm">
                @csrf
                <input type="hidden" name="package_name" id="hidden_package">
                <input type="hidden" name="booking_date" id="hidden_date">
                <input type="hidden" name="booking_time" id="hidden_time">
                <input type="hidden" name="payment_status" id="hidden_payment_status" value="Pending">

                <div class="booking-card">
                    <div class="step-container mb-4">
                        <div class="step active" id="prog-1">
                            <div class="step-circle">1</div><span>Info</span>
                        </div>
                        <div class="step" id="prog-2">
                            <div class="step-circle">2</div><span>Session</span>
                        </div>
                        <div class="step" id="prog-3">
                            <div class="step-circle">3</div><span>Addons</span>
                        </div>
                        <div class="step" id="prog-4">
                            <div class="step-circle">4</div><span>Payment</span>
                        </div>
                        <div class="step" id="prog-5">
                            <div class="step-circle">5</div><span>Review</span>
                        </div>
                    </div>

                    <div id="step-1" class="step-content active">
                        <h2 class="booking-title">Step 1: Package & Time</h2>
                        <div class="mb-3">
                            <label class="form-label">Select Package</label>
                            <select id="package" class="form-select mb-3" required onchange="updateHiddenPrice()">
                                <option value="" disabled selected>Select Package</option>
                                @foreach($packages as $pkg)
                                <option value="{{ $pkg->package_name }}" data-price="{{ $pkg->base_price }}">
                                    {{ $pkg->package_name }} (₱{{ number_format($pkg->base_price, 2) }})
                                </option>
                                @endforeach
                            </select>

                            <input type="hidden" name="amount" id="hidden_amount" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" id="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Time</label>
                            <select id="time" class="form-select" required></select>
                        </div>
                        <button type="button" class="btn btn-next w-100" onclick="goToStep(2)">Next</button>
                    </div>






                    <div id="step-2" class="step-content">
                        <h2 class="booking-title">Step 2: Customer Details</h2>
                        <input type="text" name="first_name" id="firstName" class="form-control mb-2" placeholder="First Name" value="{{ Auth::user()->customer->first_name ?? '' }}">
                        <input type="text" name="last_name" id="lastName" class="form-control mb-2" placeholder="Last Name" value="{{ Auth::user()->customer->last_name ?? '' }}">
                        <input type="tel" name="phone_number" id="phone" class="form-control mb-2" placeholder="Phone" value="{{ Auth::user()->customer->phone_number ?? '' }}">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-back" onclick="goToStep(1)">Back</button>
                            <button type="button" class="btn btn-next" onclick="goToStep(3)">Next</button>
                        </div>
                    </div>







                    <div id="step-3" class="step-content">
                        <h2 class="booking-title">Step 3: Choose Addons</h2>
                        <div class="text-start">
                            @foreach($addons as $addon)
                            <div class="form-check mb-2">
                                <input class="form-check-input addon-check" type="checkbox" name="addons[]"
                                    value="{{ $addon->addon_id }}"
                                    data-name="{{ $addon->addon_name }}"
                                    data-price="{{ $addon->price }}"
                                    id="addon{{ $addon->addon_id }}">
                                <label class="form-check-label" for="addon{{ $addon->addon_id }}">
                                    {{ $addon->addon_name }} (₱{{ number_format($addon->price, 2) }})
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-back" onclick="goToStep(2)">Back</button>
                            <button type="button" class="btn btn-next" onclick="goToStep(4)">Next</button>
                        </div>
                    </div>






                    <div id="step-4" class="step-content">
                        <h2 class="booking-title">Step 4: Payment Method</h2>
                        <select name="payment_method" id="payment_method" class="form-select mb-3">
                            <option value="GCash">GCash</option>
                            <option value="Maya">Maya</option>
                            <option value="GoTyme Bank">GoTyme Bank</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <select id="pay_now_choice" class="form-select mb-3" onchange="document.getElementById('hidden_payment_status').value = this.value">
                            <option value="Pending">Pay Later (Pending)</option>
                            <option value="Paid">Paid Now (Verified)</option>
                        </select>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-back" onclick="goToStep(3)">Back</button>
                            <button type="button" class="btn btn-next" onclick="prepareReview()">Next</button>
                        </div>
                    </div>








                    <div id="step-5" class="step-content">
                        <h2 class="booking-title">Step 5: Review & Confirm</h2>
                        <div id="reviewArea" class="text-start p-3 bg-white border rounded mb-3">
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-back" onclick="goToStep(4)">Back</button>
                            <button type="submit" class="btn btn-confirm">Confirm & Submit</button>
                        </div>
                    </div>
                </div>
            </form>








        </div>
    </header>


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

    <script>
        let currentView = 1;

        /**
         * Navigation Controller
         */
        function goToStep(step) {
            // Validation when moving forward
            if (step > currentView) {
                if (currentView === 1 && !validateStep1()) return;
                if (currentView === 2 && !validateStep2()) return;
            }

            updateViews(step);
        }

        function updateViews(step) {
            currentView = step;

            // Toggle visibility for all step divs
            document.querySelectorAll('.step-content').forEach(el => el.classList.remove('active'));
            const targetStep = document.getElementById('step-' + step);
            if (targetStep) targetStep.classList.add('active');

            // Update Progress Bar
            for (let i = 1; i <= 4; i++) {
                const prog = document.getElementById('progress-step-' + i);
                if (prog) {
                    if (i < step - 1) prog.className = "step completed";
                    else if (i === step - 1) prog.className = "step active";
                    else prog.className = "step";
                }
            }
        }

        function validateStep1() {
            const pkg = document.getElementById('package').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;

            if (!pkg || !date || !time) {
                alert("Please select a package, date, and time.");
                return false;
            }

            document.getElementById('hidden_package').value = pkg;
            document.getElementById('hidden_date').value = date;
            document.getElementById('hidden_time').value = time;
            return true;
        }

        function validateStep2() {
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            if (!firstName || !lastName) {
                alert("Please provide your name.");
                return false;
            }
            return true;
        }


        /**
         * Captures the base package price whenever the package changes
         */
        function updateHiddenPrice() {
            const pkgSelect = document.getElementById('package');
            const selectedOption = pkgSelect.options[pkgSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price') || 0;
            document.getElementById('hidden_amount').value = price;
        }

       /**
 * Step 5 Transition: prepareReview
 * Now includes Total Amount Calculation
 */
function prepareReview() {
    const reviewArea = document.getElementById('reviewArea');
    if (!reviewArea) return;

    // 1. Get Package Details
    const pkgSelect = document.getElementById('package');
    const pkgName = pkgSelect.value;
    const pkgPrice = parseFloat(pkgSelect.options[pkgSelect.selectedIndex].getAttribute('data-price') || 0);

    // 2. Get Addons and Calculate Addon Total
    let selectedAddonNames = [];
    let addonsTotalPrice = 0;
    
    document.querySelectorAll('.addon-check:checked').forEach(checkbox => {
        selectedAddonNames.push(checkbox.getAttribute('data-name'));
        addonsTotalPrice += parseFloat(checkbox.getAttribute('data-price') || 0);
    });

    const totalBookingAmount = pkgPrice + addonsTotalPrice;

    // 3. Set values for Laravel (Payment Table Amount)
    document.getElementById('hidden_amount').value = totalBookingAmount;
    document.getElementById('hidden_payment_status').value = document.getElementById('pay_now_choice').value;

    // 4. Update Review UI
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const method = document.getElementById('payment_method').value;
    const status = document.getElementById('pay_now_choice').value;

    reviewArea.innerHTML = `
        <div class="review-details">
            <p><strong>Package:</strong> ${pkgName} (₱${pkgPrice.toFixed(2)})</p>
            <p><strong>Date & Time:</strong> ${date} at ${time}</p>
            <p><strong>Addons:</strong> ${selectedAddonNames.length > 0 ? selectedAddonNames.join(', ') : "None"} (₱${addonsTotalPrice.toFixed(2)})</p>
            <hr>
            <p class="h5"><strong>Total Amount: ₱${totalBookingAmount.toFixed(2)}</strong></p>
            <p><strong>Payment Method:</strong> ${method}</p>
            <p><strong>Status:</strong> ${status === 'Paid' ? '<span class="text-success">Verified (Paid Now)</span>' : '<span class="text-warning">Pending</span>'}</p>
        </div>
    `;

    goToStep(5);
}

        // Time Dropdown Initialization
        (function() {
            const timeSelect = document.getElementById('time');
            if (!timeSelect) return;
            timeSelect.innerHTML = '<option value="" disabled selected>Select Time</option>';
            for (let h = 13; h <= 19; h++) {
                for (let m of [0, 30]) {
                    if (h === 19 && m > 30) continue;
                    let h12 = h > 12 ? h - 12 : h;
                    let min = m === 0 ? '00' : m;
                    let val = `${String(h).padStart(2, '0')}:${min}`;
                    let label = `${h12}:${min} pm`;
                    const opt = document.createElement('option');
                    opt.value = val;
                    opt.textContent = label;
                    timeSelect.appendChild(opt);
                }
            }
        })();
    </script>


</body>

</html>