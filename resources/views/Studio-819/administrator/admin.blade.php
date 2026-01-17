<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW-ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background: url("Images/BG.png") center/cover no-repeat;
        }


        /* login */
        :root {
            --brand-color: #205A55;
            --brand-color-hover: #184541;
            --brand-color-rgb: 90, 32, 37;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
        }

        /* Button (Sign In) */
        .btn-primary {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--brand-color-hover) !important;
            border-color: var(--brand-color-hover) !important;
        }

        /* Link Overrides (Forgot Password, Create One) */
        .text-primary {
            color: var(--brand-color) !important;
            transition: color 0.2s ease;
        }

        .text-primary:hover {
            color: var(--brand-color-hover) !important;
        }

        /* Form and Checkbox --- */

        /* Border Color */
        .form-control:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        /* Checkbox Color */
        .form-check-input:checked {
            background-color: var(--brand-color);
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        .form-check-input:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        /* Override for password field appearance */
        .input-group #loginPassword,
        .input-group #signupPassword,
        .input-group #confirmPassword {
            /* Targeting the specific password input IDs for styling */
            background-image: none !important;
            padding-right: 0.75rem !important;
        }

        .input-group input[type="password"]::-webkit-contacts-auto-fill-button,
        .input-group input[type="password"]::-webkit-inner-spin-button,
        .input-group input[type="password"]::-webkit-outer-spin-button,
        .input-group input[type="password"]::-webkit-search-cancel-button,
        .input-group input[type="password"]::-webkit-search-results-button,
        .input-group input[type="password"]::-webkit-clear-button {
            -webkit-appearance: none !important;
            display: none !important;
        }

        .input-group input[type="password"]::-ms-reveal {
            display: none !important;
        }

        .input-group input[type="password"]:-webkit-autofill,
        .input-group input[type="password"]:-webkit-autofill:hover,
        .input-group input[type="password"]:-webkit-autofill:focus,
        .input-group input[type="password"]:-webkit-autofill:active {
            background-image: none !important;
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 p-3">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-5" id="formWrapper">

                {{-- Login Card --}}
                <div class="card shadow-lg border-0 rounded-3" id="login-container">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark" id="loginTitle">Admin Login</h2>
                            <p class="text-secondary small">Enter your credentials to access your account</p>
                        </div>

                        {{-- Login Form --}}
                        <form action="{{ route('admin.login.submit') }}" method="POST" class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="loginEmail" name="email" required autocomplete="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="loginPassword" name="password" required autocomplete="current-password">
                                    <button class="btn btn-outline-secondary login-password-toggle" type="button"
                                        aria-label="Toggle password visibility" data-target="loginPassword">
                                        <!-- Eye-slash SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-eye-slash-fill password-icon" viewBox="0 0 16 16">
                                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588M5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089Z" />
                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829Zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829Zm-2.458.79l.79-.79-.79.79Z" />
                                            <path d="M16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A6.2 6.2 0 0 1 8 3.5c4.142 0 6.5 4 6.5 4S12.79 12.378 8 12.5a6.2 6.2 0 0 1-2.032-.294l-.772.772A7.029 7.029 0 0 0 8 13.5c5 0 8-5.5 8-5.5Z" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-secondary small" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small text-primary fw-medium">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold" id="loginBtn">
                                Sign In
                            </button>
                        </form>

                        <div class="text-center mt-3 small">
                            <p class="mb-0 text-secondary">Don't have an account?
                                <a href="#" class="text-decoration-none text-primary fw-medium" id="showSignup">Create one</a>
                            </p>
                        </div>

                        <div class="text-center mt-3 small">
                            <p class="mt-2 mb-0">
                                <a href="{{ route('Studio-819/loginsignup') }}" class="text-secondary fw-medium">&lt; User Login</a>
                            </p>
                        </div>

                        {{-- Success Message --}}
                        @if(session('success'))
                        <div class="alert alert-success mt-4 text-center" role="alert">
                            <h4 class="alert-heading mb-1">Success!</h4>
                            <p class="mb-0">{{ session('success') }}</p>
                        </div>
                        @endif

                        {{-- Error Message --}}
                        @if($errors->any())
                        <div class="alert alert-danger mt-4 text-center">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                </div>

                {{-- Sign Up Card (Optional for admin registration) --}}
                <div class="card shadow-lg border-0 rounded-3 d-none" id="signup-container">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark" id="signupTitle">Create Account</h2>
                            <p class="text-secondary small">Register to get started</p>
                        </div>

                        @csrf

                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" required value="{{ old('fullName') }}">
                            @error('fullName')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="signupEmail" name="email" required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="signupPassword"
                                    name="password"
                                    required>
                                <button class="btn btn-outline-secondary login-password-toggle"
                                    type="button"
                                    data-target="signupPassword">
                                    <!-- Eye-slash SVG -->
                                </button>
                            </div>
                            @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="confirmPassword"
                                name="password_confirmation"
                                required>
                            @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold" id="signupBtn">
                            Sign Up
                        </button>
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

            // Login Submission
            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if (!loginForm.checkValidity()) {
                    e.stopPropagation();
                    loginForm.classList.add('was-validated');
                    return;
                }

                loginForm.classList.add('was-validated');
                loginBtn.disabled = true;
                loginBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Signing In...';

                try {
                    // Simulate an API call delay
                    await new Promise(resolve => setTimeout(resolve, 1500));

                    // Redirect to dashboard
                    window.location.href = 'admindashboard.php';


                } catch (error) {
                    // Handle actual login errors here (e.g., bad credentials)
                    console.error('Login error:', error);

                    loginBtn.disabled = false;
                    loginBtn.innerHTML = 'Sign In';
                }
            });

            // Sign Up Submission
            signupForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                const passwordsValid = checkPasswordsMatch();

                if (!signupForm.checkValidity() || !passwordsValid) {
                    e.stopPropagation();
                    signupForm.classList.add('was-validated');
                    return;
                }

                signupForm.classList.add('was-validated');
                signupBtn.disabled = true;
                signupBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm"></span> Creating Account...';

                try {
                    // Simulate API delay
                    await new Promise(resolve => setTimeout(resolve, 2000));

                    // RESET SIGNUP FORM
                    signupForm.reset();
                    signupForm.classList.remove('was-validated');

                    // SWITCH BACK TO LOGIN FORM
                    toggleForm(true);

                    // SHOW SUCCESS MESSAGE ON LOGIN FORM
                    successText.textContent = 'Account created successfully! Please sign in.';
                    successMessage.classList.remove('d-none');

                    // RESET BUTTON
                    signupBtn.disabled = false;
                    signupBtn.innerHTML = 'Sign Up';

                } catch (error) {
                    console.error('Registration error:', error);
                    signupBtn.disabled = false;
                    signupBtn.innerHTML = 'Sign Up';
                }
            });


        });
    </script>
</body>

</html>