<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Studio 819 Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
    <style>
        .mesh-bg {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(90, 32, 37, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(162, 58, 67, 0.1) 0%, transparent 40%);
            z-index: -1;
        }
        
        .sidebar {
            width: 280px;
            height: 100vh;
            background: rgba(13, 13, 13, 0.8) !important;
            backdrop-filter: blur(20px);
            position: fixed;
            left: 0; top: 0;
            padding: 40px 20px;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        .main-content {
            margin-left: 280px;
            padding: 60px;
            position: relative;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: -1px;
            background: linear-gradient(to right, #fff, #999);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .table {
            color: white !important;
            background: transparent !important;
        }

        .table thead th {
            background: rgba(255,255,255,0.05) !important;
            border-bottom: 1px solid var(--glass-border) !important;
            color: var(--text-dim) !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .table td {
            border-color: var(--glass-border) !important;
            vertical-align: middle;
        }

        .glass-input {
            background: rgba(255,255,255,0.05) !important;
            border: 1px solid var(--glass-border) !important;
            border-radius: 12px !important;
            color: white !important;
            padding: 10px 15px !important;
        }

        .glass-input:focus {
            box-shadow: 0 0 15px rgba(162, 58, 67, 0.2) !important;
            border-color: #a23a43 !important;
        }
    </style>
    @yield('styles')
</head>
<body class="dark-mode">
    <div class="mesh-bg"></div>

    <nav class="sidebar">
        <div class="logo-section mb-5">
            <h1 class="text-white fw-bold" style="letter-spacing: -2px;">S819 <span class="text-secondary opacity-50">Admin</span></h1>
        </div>

        <div class="nav-links-container">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn {{ Request::is('admin/dashboard*') || Request::is('Studio-819-dashboard*') ? 'active' : '' }} mb-3">
                <i class="bi bi-grid-1x2-fill me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn {{ Request::is('admin/bookings*') ? 'active' : '' }} mb-3">
                <i class="bi bi-calendar-event-fill me-2"></i> Bookings
            </a>
            <a href="{{ route('admin.customer') }}" class="nav-btn {{ Request::is('admin/customer*') ? 'active' : '' }} mb-3">
                <i class="bi bi-people-fill me-2"></i> Customers
            </a>
            <a href="{{ route('admin.packages') }}" class="nav-btn {{ Request::is('admin/packages*') ? 'active' : '' }} mb-3">
                <i class="bi bi-box-seam-fill me-2"></i> Packages
            </a>
            <a href="{{ route('admin.payment') }}" class="nav-btn {{ Request::is('admin/payment*') ? 'active' : '' }} mb-3">
                <i class="bi bi-wallet2 me-2"></i> Payments
            </a>
        </div>

        <a href="#" class="nav-btn logout-btn mt-auto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background: rgba(255,255,255,0.05) !important;">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>

    <main class="main-content">
        @if(session('success'))
            <div class="alert glass-card border-success text-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
