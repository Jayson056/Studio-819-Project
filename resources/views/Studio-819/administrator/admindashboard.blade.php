<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Studio 819</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --brand-maroon: #5a2025;
            --bg-beige: #dac0ab;
            --sidebar-beige: #ebe0d3;
            --sidebar-width: 250px;
            --text-dark: #634832;
            --card-brown: #3e2723;
            --card-text: #ffffff;
        }

        body {
            background-color: var(--bg-beige);
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-dark);
            margin: 0;
            overflow-x: hidden;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--sidebar-beige);
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1000;
        }

        .logo-section {
            margin-bottom: 40px;
            text-align: center;
        }

        .logo-section img {
            width: 180px;
            height: auto;
        }

        .nav-links-container {
            width: 100%;
        }

        .nav-btn {
            display: block;
            width: 100%;
            background-color: var(--brand-maroon);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 12px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background-color: var(--brand-maroon-hover);
            color: white;
            transform: scale(1.02);
        }

        .nav-btn.active {
            background-color: #401215;
        }

        /* Darker active state */

        .logout-btn {
            margin-top: auto;
            background-color: #3d1417;
            width: 140px;
            border-radius: 25px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 40px 60px;
        }

        /* --- ADMIN HEADER --- */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.1);
            padding-bottom: 15px;
        }

        .page-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #553e2d;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-pic {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        /* --- DASHBOARD CARDS --- */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--card-brown);
            color: var(--card-text);
            border-radius: 15px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 180px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .stat-value {
            font-size: 4rem;
            font-weight: 800;
            text-align: center;
            line-height: 1;
        }

        .full-width-card {
            grid-column: span 3;
            background-color: var(--card-brown);
            color: var(--card-text);
            border-radius: 15px;
            padding: 30px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .full-width-card .stat-value {
            font-size: 3.5rem;
        }

        @media (max-width: 992px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .full-width-card {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

    <nav class="sidebar">
        <div class="logo-section">
            <img src="Images/logo.png" alt="Studio 819 Logo">
        </div>

        <div class="nav-links-container">
            <a href="#" class="nav-btn active">Dashboard</a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn {{ Request::is('admin/bookings*') ? 'active' : '' }}">Bookings</a>
            <a href="{{ route('admin.customer') }}" class="nav-btn">Customers</a>
            <a href="{{ route('admin.packages') }}" class="nav-btn">Packages</a>
            <a href="{{ route('admin.payment') }}" class="nav-btn {{ Request::is('admin/payment*') ? 'active' : '' }}">Payment</a>
        </div>

        <a href="#" class="nav-btn logout-btn"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>

    <main class="main-content">

        <header class="admin-header">
            <div class="page-title">
                <i class="bi bi-house-door-fill"></i> Dashboard
            </div>

            <div class="admin-profile">
                <img src="Images/logo.png" class="profile-pic" alt="Admin Profile">
                <span>Hello, <strong>Admin!</strong></span>
            </div>
        </header>
        <div class="dashboard-grid">
            <div class="stat-card">
                <div class="stat-label">Customers</div>
                <div class="stat-value">{{ $totalUsers }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Bookings</div>
                <div class="stat-value">{{ $totalBookings }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Revenue</div>
                <div class="stat-value">₱{{ number_format($totalRevenue, 2) }}</div>
            </div>
        </div>

        <div class="full-width-card">
            <div class="stat-label">Available Packages</div>
            <div class="stat-value">{{ $totalPackages }}</div>
        </div>

        <div class="full-width-card">
            <div class="stat-label">Available Add Ons</div>
            <div class="stat-value">{{ $totalAddOns }}</div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>