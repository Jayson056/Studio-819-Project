<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="pageTitle">Admin Access - Studio 819</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --brand-color: #5a2025; /* Updated to match your Studio-819 brand red */
            --brand-color-hover: #45181c;
            --brand-color-rgb: 90, 32, 37;
        }

        body {
            background: url("{{ asset('Images/BG.png') }}") center/cover no-repeat;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            min-vh-100;
        }

        .btn-primary {
            background-color: var(--brand-color) !important;
            border-color: var(--brand-color) !important;
        }

        .btn-primary:hover {
            background-color: var(--brand-color-hover) !important;
        }

        .text-primary { color: var(--brand-color) !important; }

        .form-control:focus {
            border-color: var(--brand-color);
            box-shadow: 0 0 0 0.25rem rgba(var(--brand-color-rgb), 0.25);
        }

        .card { border-radius: 15px; overflow: hidden; }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100 p-3">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-5" id="formWrapper">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Login Card --}}
                <div class="card shadow-lg border-0" id="login-container">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark">Admin Login</h2>
                            <p class="text-secondary small">Access the administrative dashboard</p>
                        </div>

                        <form action="{{ route('admin.login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="loginPassword" required>
                                    <button class="btn btn-outline-secondary toggle-pass" type="button" data-target="loginPassword">
                                        <i class="bi bi-eye-slash"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Sign In</button>
                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0 small text-secondary">Need a new admin account? 
                                <a href="#" class="text-decoration-none text-primary fw-medium" id="showSignup">Create one</a>
                            </p>
                            <hr>
                            <a href="{{ route('Studio-819/loginsignup') }}" class="text-secondary small text-decoration-none">
                                <i class="bi bi-arrow-left"></i> Back to User Login
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sign Up Card --}}
                <div class="card shadow-lg border-0 d-none" id="signup-container">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-dark">Register Admin</h2>
                            <p class="text-secondary small">Authorized staff registration only</p>
                        </div>

                        <form action="{{ route('admin.register.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Admin Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="regPass" class="form-control" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Create Admin Account</button>
                        </form>

                        <div class="text-center mt-3">
                            <a href="#" class="text-decoration-none text-primary small fw-medium" id="showLogin">Already have an account? Sign in</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginCont = document.getElementById('login-container');
            const signupCont = document.getElementById('signup-container');
            const pageTitle = document.getElementById('pageTitle');

            // Toggle Between Login and Signup
            document.getElementById('showSignup').addEventListener('click', (e) => {
                e.preventDefault();
                loginCont.classList.add('d-none');
                signupCont.classList.remove('d-none');
                pageTitle.textContent = 'Admin Registration';
            });

            document.getElementById('showLogin').addEventListener('click', (e) => {
                e.preventDefault();
                signupCont.classList.add('d-none');
                loginCont.classList.remove('d-none');
                pageTitle.textContent = 'Admin Login';
            });

            // Password Visibility Toggle
            document.querySelectorAll('.toggle-pass').forEach(btn => {
                btn.addEventListener('click', function() {
                    const target = document.getElementById(this.dataset.target);
                    const icon = this.querySelector('i');
                    if (target.type === 'password') {
                        target.type = 'text';
                        icon.classList.replace('bi-eye-slash', 'bi-eye');
                    } else {
                        target.type = 'password';
                        icon.classList.replace('bi-eye', 'bi-eye-slash');
                    }
                });
            });
        });
    </script>
</body>
</html>