<!-- resources/views/studio-819/customer/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio 819 - My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile-style.css') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('Studio-819/index') }}">
            <img src="{{ asset('Images/logo.png') }}" alt="Studio 819 Logo" class="navbar-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('Studio-819/index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('Studio-819/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('Studio-819/booking') }}">Booking</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact.send') }}">Contact</a></li>

                <li class="nav-item ms-lg-3 dropdown">
                    <div class="nav-profile-pill dropdown-toggle" 
                         id="profileDropdown" 
                         data-bs-toggle="dropdown" 
                         aria-expanded="false" 
                         style="background-color: var(--brand-color); color: white; padding: 6px 16px; border-radius: 50px; cursor: pointer;">
                        <i class="fa-solid fa-bars me-2"></i>
                        <i class="fa-solid fa-circle-user fa-lg"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="profileDropdown" style="background-color: var(--header-bg-color);">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('user.profile') }}">
                                <i class="fa-solid fa-user-gear me-2"></i> Account Settings
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('user.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 text-danger fw-bold">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Sign Out
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
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="sidebar-card text-center p-4">
                <div class="profile-img-container mb-3 d-flex justify-content-center">
                    <div class="avatar-circle">
                        <img src="{{ asset('Images/' . auth()->user()->avatar) }}" alt="User Avatar">
                    </div>
                </div>
                <h5 class="fw-bold mb-1">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                <p class="small text-muted mb-0">{{ auth()->user()->email }}</p>
                <p class="small text-muted">{{ auth()->user()->phone_number }}</p>

                <div class="stats-list mt-4">
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="small fw-semibold">Bookings</span>
                        <span class="fw-bold">{{ $bookings->count() }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom">
                        <span class="small fw-semibold">Reviews</span>
                        <span class="fw-bold">{{ $reviews->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="content-card">
                <ul class="nav nav-tabs custom-tabs" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab">My Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button" role="tab">Bookings</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews</button>
                    </li>
                </ul>

                <div class="tab-content p-4" id="profileTabContent">
                    <!-- My Details -->
                    <div class="tab-pane fade show active" id="details" role="tabpanel">
                        <form action="{{ route('user.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="{{ auth()->user()->first_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ auth()->user()->last_name }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" value="{{ auth()->user()->phone_number }}">
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-brand">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Bookings Tab -->
                    <div class="tab-pane fade" id="bookings" role="tabpanel">
                        @forelse($bookings as $booking)
                        <div class="booking-item d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div>
                                <h6 class="fw-bold mb-0">{{ $booking->package_name }}</h6>
                                <p class="small text-muted mb-0">{{ $booking->booking_date }} {{ $booking->booking_time }}</p>
                                <p class="small fw-bold mb-0">Total paid: ₱ {{ $booking->total_paid }}</p>
                            </div>
                            <div class="text-end">
                                <a href="{{ route('booking.receipt', $booking->id) }}" class="btn btn-brand btn-sm mb-2">Receipt</a><br>
                                <span class="text-success fw-bold small">{{ $booking->status }}</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-muted text-center py-5">No bookings found.</p>
                        @endforelse
                    </div>

                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        @forelse($reviews as $review)
                        <div class="review-item p-3 border rounded mb-3 bg-white">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="small text-muted">{{ $review->created_at }}</span>
                                <div class="text-warning">
                                    @for($i=0; $i < $review->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                            <h6 class="fw-bold mb-1">{{ $review->package_name }}</h6>
                            <p class="small text-muted mb-0">Booking date: {{ $review->booking_date }}</p>
                            <p class="small mt-2">{{ $review->comment }}</p>
                        </div>
                        @empty
                        <p class="text-muted text-center py-5">No reviews found.</p>
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
