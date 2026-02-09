<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings - Studio 819</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --brand-maroon: #5a2025;
            --brand-maroon-hover: #45181c;
            --bg-beige: #dac0ab;
            --sidebar-beige: #ebe0d3;
            --sidebar-width: 250px;
            --text-dark: #634832;
        }
        body { background-color: var(--bg-beige); font-family: 'Segoe UI', sans-serif; color: var(--text-dark); margin: 0; }
        .sidebar { width: var(--sidebar-width); height: 100vh; background-color: var(--sidebar-beige); position: fixed; padding: 30px 20px; display: flex; flex-direction: column; align-items: center; z-index: 1000; }
        .nav-btn { display: block; width: 100%; background-color: var(--brand-maroon); color: white; padding: 12px; border-radius: 10px; margin-bottom: 12px; text-transform: uppercase; text-decoration: none; text-align: center; font-weight: 700; }
        .nav-btn.active { background-color: var(--brand-maroon-hover); }
        .main-content { margin-left: var(--sidebar-width); padding: 40px 60px; }
        .table-wrapper { background: white; border-radius: 8px; overflow: hidden; margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .booking-table { width: 100%; border-collapse: collapse; }
        .booking-table th { background-color: #7a5c44; color: white; padding: 15px; text-align: center; }
        .booking-table td { padding: 15px; text-align: center; border-bottom: 1px solid #eee; }
        
        /* Status Colors */
        .status-select { border-radius: 20px; padding: 5px 15px; font-weight: bold; border: 1px solid #ccc; cursor: pointer; }
        .status-completed { color: #28a745; border-color: #28a745; }
        .status-confirmed { color: #ffc107; border-color: #ffc107; }
        .status-pending { color: #007bff; border-color: #007bff; }
        .status-cancelled { color: #dc3545; border-color: #dc3545; }

        .btn-add-booking { background-color: var(--brand-maroon); color: white; border: none; padding: 10px 25px; border-radius: 5px; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>

    <nav class="sidebar">
        <div class="logo-section mb-4"><img src="{{ asset('Images/logo.png') }}" style="width:180px;"></div>
        <div class="nav-links-container w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn">Dashboard</a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn active">Bookings</a>
            <a href="{{ route('admin.customer') }}" class="nav-btn">Customers</a>
            <a href="{{ route('admin.packages') }}" class="nav-btn">Packages</a>
            <a href="{{ route('admin.payment') }}" class="nav-btn {{ Request::is('admin/payment*') ? 'active' : '' }}">Payment</a>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="nav-btn" style="background-color: #3d1417; border: none;">Logout</button>
        </form>
    </nav>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold"><i class="bi bi-calendar-check"></i> Bookings</h1>
            <div>Hello, <strong>{{ $adminName ?? 'Admin' }}!</strong></div>
        </header>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between mb-4">
            <form action="{{ route('admin.bookings') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name or ID" value="{{ request('search') }}" style="width:300px;">
                <button type="submit" class="btn btn-dark">SEARCH</button>
            </form>
            <button class="btn-add-booking" data-bs-toggle="modal" data-bs-target="#addBookingModal">
                <i class="bi bi-plus-lg"></i> ADD BOOKING
            </button>
        </div>

        <div class="table-wrapper">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Booking ID</th>
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>#{{ $b->booking_id }}</td>
                        <td>{{ $b->first_name }} {{ $b->last_name }}</td>
                        <td>{{ $b->package_name }}</td>
                        <td>{{ date('M d, Y', strtotime($b->booking_date)) }}</td>
                        <td>{{ date('h:i A', strtotime($b->booking_time)) }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.update-status', $b->booking_id) }}" method="POST">
                                @csrf @method('PATCH')
                                <select name="status" class="status-select status-{{ strtolower($b->status) }}" onchange="this.form.submit()">
                                    <option value="Pending" {{ $b->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Confirmed" {{ $b->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="Completed" {{ $b->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Cancelled" {{ $b->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7">No bookings found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="addBookingModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.bookings.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Booking</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Customer Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Existing user email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Package</label>
                            <select name="package_name" class="form-select" required>
                                @foreach($packages as $pkg)
                                    <option value="{{ $pkg->package_name }}">{{ $pkg->package_name }} - ₱{{ $pkg->base_price }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="booking_date" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Time</label>
                                <input type="time" name="booking_time" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-add-booking">Create Booking</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
