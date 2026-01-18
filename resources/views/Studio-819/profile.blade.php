<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio 819 - My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        :root {
            --brand-color: #5a2025;
            --brand-hover: #45181c;
            --accent-gold: #d4af37;
            --light-bg: #f8f9fa;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling (Matches profile.pdf) */
        .sidebar-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }

        .avatar-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid var(--brand-color);
            padding: 3px;
            margin: 0 auto;
            overflow: hidden;
        }

        .avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .stat-box {
            background: #fafafa;
            border-radius: 10px;
            padding: 10px;
            margin-top: 15px;
        }

        /* Tabs & Content Styling */
        .content-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .custom-tabs {
            background: #f1f1f1;
            border: none;
        }

        .custom-tabs .nav-link {
            border: none;
            padding: 1.2rem 1.5rem;
            color: #666;
            font-weight: 600;
            transition: 0.3s;
        }

        .custom-tabs .nav-link.active {
            background: white;
            color: var(--brand-color);
            border-bottom: 3px solid var(--brand-color);
        }

        .btn-brand {
            background-color: var(--brand-color);
            color: white;
            border-radius: 8px;
            padding: 10px 25px;
            border: none;
            transition: 0.3s;
        }

        .btn-brand:hover {
            background-color: var(--brand-hover);
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg custom-navbar bg-white border-bottom py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('Studio-819/index') }}">
                <img src="{{ asset('Images/logo.png') }}" alt="Studio 819 Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_index') }}">HOME</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_about') }}">ABOUT</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_services') }}">SERVICES</a></li>
                    <li class="nav-item me-4"><a class="nav-link" href="{{ route('Studio-819/cust_contact') }}">CONTACT</a></li>

                    <li class="nav-item dropdown">
                        <div class="dropdown-toggle d-flex align-items-center" id="profileDropdown" data-bs-toggle="dropdown"
                            style="background-color: var(--brand-color); color: white; padding: 8px 18px; border-radius: 50px; cursor: pointer;">
                            <i class="bi bi-list me-2"></i>
                            <i class="bi bi-person-circle fs-5"></i>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li><a class="dropdown-item py-2" href="{{ route('user.profile') }}"><i class="bi bi-person me-2"></i> My Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('user.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger fw-bold">
                                        <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-4 col-xl-3">
                <div class="sidebar-card">
                    <h5 class="fw-bold mb-4">My Details</h5>
                    <div class="avatar-circle mb-1">
                        <img src="{{ asset('Images/defprof.png') }}" alt="Profile Picture">
                    </div>
                    <div class="text-center mb-4">
                        <h5 class="fw-bold mb-1">{{ $user->customer->first_name ?? 'User' }} {{ $user->customer->last_name ?? '' }}</h5>
                        <p class="small text-muted mb-0">{{ $user->email }}</p>
                        <p class="small text-muted">{{ $user->customer->phone_number ?? 'No Phone' }}</p>
                    </div>

                    <div class="stat-box d-flex justify-content-between align-items-center mb-2">
                        <span class="small fw-bold">Bookings</span>
                        <span class="badge rounded-pill" style="background: var(--brand-color);">{{ $bookings->count() }}</span>
                    </div>
                    <div class="stat-box d-flex justify-content-between align-items-center">
                        <span class="small fw-bold">Reviews</span>
                        <span class="badge rounded-pill" style="background: var(--brand-color);">{{ $reviews->count() }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xl-9">
                <div class="content-card">
                    <ul class="nav nav-tabs custom-tabs" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#details" type="button">My Details</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#bookings" type="button">Bookings</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Reviews</button>
                        </li>
                    </ul>

                    <div class="tab-content p-4">
                        <div class="tab-pane fade show active" id="details">
                            <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $user->customer->first_name ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ $user->customer->last_name ?? '' }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">Email Address</label>
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" value="{{ $user->customer->phone_number ?? '' }}">
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-brand px-5">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                        <div class="tab-pane fade" id="bookings">
                            @forelse($bookings as $booking)
                            <div class="p-3 border rounded mb-3 bg-white d-flex justify-content-between align-items-center shadow-sm">
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">{{ $booking->package_name }}</h6>
                                    <p class="small text-muted mb-0">
                                        <i class="bi bi-calendar-event me-2"></i>
                                        {{ date('M d, Y', strtotime($booking->booking_date)) }} : {{ $booking->booking_time }}
                                    </p>

                                    <p class="small fw-bold mb-0 {{ ($booking->payment_status ?? 'Pending') == 'Verified' ? 'text-success' : 'text-warning' }}">
                                        Total paid: ₱ {{ number_format($booking->total_paid ?? 0, 2) }}
                                    </p>
                                </div>

                                <div class="text-end">
                                    @if($booking->status == 'Confirmed')
                                    <span class="badge bg-success mb-2">Booking Confirmed</span>
                                    @elseif($booking->status == 'Pending')
                                    <span class="badge bg-warning text-dark mb-2">Pending Verification</span>
                                    @else
                                    <span class="badge bg-dark mb-2">{{ $booking->status }}</span>
                                    @endif
                                    <br>

                                    <button class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-file-earmark-text me-1"></i>Receipt
                                    </button>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-5">
                                <i class="bi bi-calendar-x fs-1 text-muted"></i>
                                <p class="text-muted mt-2">No bookings yet.</p>
                                <div class="mt-3">
                                    <a href="{{ route('Studio-819/booking') }}" class="btn btn-brand px-4">
                                        <i class="bi bi-plus-circle me-2"></i>Book Now
                                    </a>
                                </div>
                            </div>
                            @endforelse

                            @if($bookings->count() > 0)
                            <div class="text-center mt-4">
                                <a href="{{ route('Studio-819/booking') }}" class="btn btn-outline-dark">
                                    Book another session
                                </a>
                            </div>
                            @endif
                        </div>




                        <div class="tab-pane fade" id="reviews">
                            @forelse($reviews as $review)
                            @empty
                            <div class="text-center py-5">
                                <p class="text-muted mb-1">No pending reviews.</p>
                                <h5 class="fw-bold mb-3">Time for a new photoshoot?</h5>
                                <a href="{{ route('Studio-819/booking') }}" class="btn btn-brand">Book a session today!</a>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>