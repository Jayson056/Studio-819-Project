<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW-ALEwIH" crossorigin="anonymous">
    
    <style>
        /* --- CSS VARIABLES --- */
        :root {
            /* Colors */
            --bg-nude: #e6d5c3;
            --header-bg-color: #ebdfd1;
            --text-color: #634832;
            --brand-color: #5a2025;
            --brand-color-hover: #45181c;
            --brand-color-rgb: 90, 32, 37;
            --navbar-height: 80px; 
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            /* Important: Push content down so it doesn't hide behind navbar */
            padding-top: var(--navbar-height);
            background-color: #f8f9fa; /* Light gray background for login page */
        }

        /* --- NAVBAR STYLES --- */
        .custom-navbar {
            background-color: var(--header-bg-color) !important;
            padding-top: 0.75rem; 
            padding-bottom: 0.75rem;
            position: fixed; 
            top: 0;
            width: 100%;
            height: var(--navbar-height); 
            z-index: 1030; 
        }

        .custom-navbar .container-fluid {
            height: 100%;
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

        /* Sign In Button in Navbar */
        .btn-sign-in {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            color: white !important;
            font-weight: 600;
            padding: 0.375rem 1.25rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-sign-in:hover {
            background-color: var(--brand-color-hover) !important;
            border-color: var(--brand-color-hover) !important;
            color: white !important;
        }

        /* --- LOGIN FORM STYLES --- */
        
        /* Primary Button (Form Submit) */
        .btn-primary {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--brand-color-hover) !important;
            border-color: var(--brand-color-hover) !important;
        }

        /* Links */
        .text-primary {
            color: var(--brand-color) !important;
            transition: color 0.2s ease;
        }

        .text-primary:hover {
            color: var(--brand-color-hover) !important;
        }

        /* Inputs & Checks */
        .form-control:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        .form-check-input:checked {
            background-color: var(--brand-color);
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        .form-check-input:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        /* Clean up password field icons */
        .input-group #loginPassword,
        .input-group #signupPassword,
        .input-group #confirmPassword {
            background-image: none !important;
            padding-right: 0.75rem !important;
        }

        /* Hide browser default password icons */
        .input-group input[type="password"]::-ms-reveal,
        .input-group input[type="password"]::-webkit-contacts-auto-fill-button,
        .input-group input[type="password"]::-webkit-inner-spin-button {
            display: none !important;
        }
        
        /* Centering Wrapper */
        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - var(--navbar-height));
            padding: 20px;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 p-3">

    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('Images/logo.png') }}" alt="Studio 819 Logo" class="navbar-brand-logo">
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-10 col-md-8 col-lg-5" id="formWrapper">

                <div class="card shadow-lg border-0 rounded-3" id="login-container">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark" id="loginTitle">Login</h2>
                            <p class="text-secondary small">Enter your credentials to access your account</p>
                        </div>
                        <form action="{{ route('login.submit') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            @if($errors->has('loginError'))
                            <div class="alert alert-danger">{{ $errors->first('loginError') }}</div>
                            @endif

                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail" name="email" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" required>
                                @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Sign In</button>
                        </form>






                        <div class="text-center mt-3 small">
                            <p class="mb-0 text-secondary">Don't have an account?
                                <a href="#" class="text-decoration-none text-primary fw-medium" id="showSignup">Create one</a>
                            </p>
                        </div>

                        <div class="alert alert-success mt-4 text-center d-none" role="alert" id="successMessage">
                            <h4 class="alert-heading mb-1">Success!</h4>
                            <p class="mb-0" id="successText"></p>
                        </div>

                    </div>
                </div>

                <div class="card shadow-lg border-0 rounded-3 d-none" id="signup-container">
                    <div class="card-body p-4 p-md-5">

                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark" id="signupTitle">Create Account</h2>
                            <p class="text-secondary small">Register to get started</p>
                        </div>

                        <form action="{{ route('signup.submit') }}" method="POST" novalidate>
                            @csrf

                            @csrf

                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                                <div class="invalid-feedback">Please enter your full name.</div>
                            </div>

                            <div class="mb-3">
                                <label for="signupEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="signupEmail" name="email" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>

                            <div class="mb-3">
                                <label for="signupPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="signupPassword" name="password" required>
                                <div class="invalid-feedback">Password is required and must be at least 8 characters.</div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                <div class="invalid-feedback">Passwords do not match.</div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Sign Up</button>
                        </form>



                        <div class="text-center mt-3 small">
                            <p class="mb-0 text-secondary">Already have an account?
                                <a href="#" class="text-decoration-none text-primary fw-medium" id="showLogin">Sign in here</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eE+R7ZOQ5M/b" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // DOM Elements
            const loginContainer = document.getElementById('login-container');
            const signupContainer = document.getElementById('signup-container');
            const pageTitle = document.getElementById('pageTitle');
            const formWrapper = document.getElementById('formWrapper');

            // Forms
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');

            // Success Message
            const successMessage = document.getElementById('successMessage');
            const successText = document.getElementById('successText');

            // Buttons/Inputs
            const loginBtn = document.getElementById('loginBtn');
            const signupBtn = document.getElementById('signupBtn');
            const passwordToggles = document.querySelectorAll('.login-password-toggle');
            const signupPasswordInput = document.getElementById('signupPassword');
            const confirmPasswordInput = document.getElementById('confirmPassword');

            // Form Toggling

            const toggleForm = (showLogin) => {
                // Hide success message whenever we switch forms
                successMessage.classList.add('d-none');

                if (showLogin) {
                    loginContainer.classList.remove('d-none');
                    signupContainer.classList.add('d-none');
                    pageTitle.textContent = 'Login';
                    formWrapper.classList.remove('col-lg-6');
                    formWrapper.classList.add('col-lg-5');
                } else {
                    loginContainer.classList.add('d-none');
                    signupContainer.classList.remove('d-none');
                    pageTitle.textContent = 'Sign Up';
                    formWrapper.classList.remove('col-lg-5');
                    formWrapper.classList.add('col-lg-6');
                }

                // Reset validation styles on both forms
                loginForm.classList.remove('was-validated');
                signupForm.classList.remove('was-validated');

            };

            document.getElementById('showSignup').addEventListener('click', (e) => {
                e.preventDefault();
                toggleForm(false); // Show Sign Up
            });

            document.getElementById('showLogin').addEventListener('click', (e) => {
                e.preventDefault();
                toggleForm(true); // Show Login
            });

            // Password Toggle Logic

            // Paths for the SVG icons
            const eyeFillPath = `<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>`;
            const eyeSlashPath = `<path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588M5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089Z"/><path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829Zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829Zm-2.458.79l.79-.79-.79.79Z"/><path d="M16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A6.2 6.2 0 0 1 8 3.5c4.142 0 6.5 4 6.5 4S12.79 12.378 8 12.5a6.2 6.2 0 0 1-2.032-.294l-.772.772A7.029 7.029 0 0 0 8 13.5c5 0 8-5.5 8-5.5Z"/>`;

            const swapIcon = (button, isPassword) => {

                const svg = button.querySelector('.password-icon');
                if (!svg) return;

                if (isPassword) {
                    // Switching to 'text' (eye-fill)
                    svg.innerHTML = eyeFillPath;
                    svg.classList.remove('bi-eye-slash-fill');
                    svg.classList.add('bi-eye-fill');
                } else {
                    // Switching to 'password' (eye-slash-fill)
                    svg.innerHTML = eyeSlashPath;
                    svg.classList.remove('bi-eye-fill');
                    svg.classList.add('bi-eye-slash-fill');
                }
            };

            passwordToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const targetId = toggle.getAttribute('data-target');
                    const targetInput = document.getElementById(targetId);

                    const isPassword = targetInput.type === 'password';
                    targetInput.type = isPassword ? 'text' : 'password';

                    // If toggling sign up password, toggle confirm password too
                    if (targetId === 'signupPassword') {
                        document.getElementById('confirmPassword').type = targetInput.type;
                    }

                    swapIcon(toggle, isPassword);
                });
            });

            // Sign Up Specific Validation (Password Match & Length)

            const checkPasswordsMatch = () => {
                const passwordValue = signupPasswordInput.value;
                const confirmValue = confirmPasswordInput.value;
                const passwordErrorElement = document.getElementById('signupPasswordError');
                const confirmErrorElement = document.getElementById('confirmPasswordError');

                // Reset custom validity messages first
                signupPasswordInput.setCustomValidity("");
                confirmPasswordInput.setCustomValidity("");

                // 1. Check Password Length (if not empty)
                if (passwordValue.length > 0 && passwordValue.length < 8) {
                    signupPasswordInput.setCustomValidity("Password too short.");
                    passwordErrorElement.textContent = "Password must be at least 8 characters.";
                    return false;
                } else if (passwordValue.length === 0) {
                    // Check if it's currently marked as required
                    if (signupPasswordInput.hasAttribute('required')) {
                        passwordErrorElement.textContent = "Password is required.";
                    }
                    // Let form.checkValidity handle the 'required' empty state
                }


                // 2. Check Password Match (only if both are non-empty)
                if (passwordValue !== confirmValue) {
                    confirmPasswordInput.setCustomValidity("Passwords do not match.");
                    confirmErrorElement.textContent = "Passwords do not match.";
                    return false;
                }

                // Set default messages back if valid
                if (signupPasswordInput.checkValidity()) {
                    passwordErrorElement.textContent = "Password is required and must be at least 8 characters."; // Default message for validation error
                }
                if (confirmPasswordInput.checkValidity()) {
                    confirmErrorElement.textContent = "Passwords do not match."; // Default message for validation error
                }


                return true;
            };

            confirmPasswordInput.addEventListener('input', checkPasswordsMatch);
            signupPasswordInput.addEventListener('input', checkPasswordsMatch);

            // Form Submission Handler

            // Update this specific block in your <script>
            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                const formData = new FormData(loginForm);

                try {
                    const response = await fetch("{{ route('login.submit') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json', // Add this to tell Laravel you want JSON or clear responses
                        },
                        body: formData
                    });

                    // Check if the response was successful (Redirects are followed by fetch automatically usually)
                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }

                    const result = await response.text();

                    // If there's a validation error, Laravel returns a 422 or returns the view.
                    // If not redirected, update the HTML
                    document.querySelector('#formWrapper').innerHTML = result;

                } catch (err) {
                    console.error('Login error:', err);
                    alert('An error occurred. Please try again.');
                }
            });


            // Sign Up Submission
            signupForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                // Run the custom validation check
                const passwordsValid = checkPasswordsMatch();

                if (!signupForm.checkValidity() || !passwordsValid) {
                    e.stopPropagation();
                    signupForm.classList.add('was-validated');
                    return;
                }

                signupForm.classList.add('was-validated');
                signupBtn.disabled = true;
                signupBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creating Account...';

                try {
                    // Simulate an API call delay
                    await new Promise(resolve => setTimeout(resolve, 2000));

                    // Mock form data submission
                    const formData = {
                        fullName: document.getElementById('fullName').value,
                        email: document.getElementById('signupEmail').value,
                        // Don't log password in a real app!
                    };
                    console.log('User Registered:', formData);

                    // On successful sign up simulation
                    signupContainer.style.display = 'none';
                    successText.textContent = 'Account created successfully! You can now sign in with your new account.';
                    successMessage.classList.remove('d-none');

                    setTimeout(() => {
                        signupForm.reset();
                        signupBtn.disabled = false;
                        signupBtn.innerHTML = 'Sign Up';
                        toggleForm(true); // Switch to login form
                    }, 3000);

                } catch (error) {
                    // Handle registration errors here
                    console.error('Registration error:', error);

                    signupBtn.disabled = false;
                    signupBtn.innerHTML = 'Sign Up';
                }
            });

        });
    </script>
</body>

</html>