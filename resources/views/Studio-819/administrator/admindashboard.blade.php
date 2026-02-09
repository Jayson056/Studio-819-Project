@extends('layouts.admin_glass')

@section('title', 'Dashboard')

@section('content')
    <header class="admin-header border-0 mb-5 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title mb-0">Overview</h1>
            <p class="text-secondary mt-2">Welcome back to Studio 819's command center.</p>
        </div>

        <div class="admin-profile glass-card px-4 py-2 d-flex align-items-center">
            <div class="text-end">
                <p class="mb-0 small text-secondary">Authorized User</p>
                <p class="mb-0 fw-bold">System Admin</p>
            </div>
            <div class="ms-3 rounded-circle" style="width: 45px; height: 45px; background: var(--primary-gradient);"></div>
        </div>
    </header>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="stat-card glass-card p-4 h-100">
                <div class="d-flex justify-content-between mb-4">
                    <div class="icon-box glass-card p-3" style="background: rgba(255,255,255,0.03);">
                        <i class="bi bi-people text-secondary fs-4"></i>
                    </div>
                    <span class="text-success small fw-bold">+12% <i class="bi bi-arrow-up-right"></i></span>
                </div>
                <p class="text-secondary mb-1">Total Customers</p>
                <h2 class="stat-value mb-0">{{ $totalUsers }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card glass-card p-4 h-100">
                <div class="d-flex justify-content-between mb-4">
                    <div class="icon-box glass-card p-3" style="background: rgba(255,255,255,0.03);">
                        <i class="bi bi-journal-check text-secondary fs-4"></i>
                    </div>
                    <span class="text-warning small fw-bold">Active</span>
                </div>
                <p class="text-secondary mb-1">Total Bookings</p>
                <h2 class="stat-value mb-0">{{ $totalBookings }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card glass-card p-4 h-100">
                <div class="d-flex justify-content-between mb-4">
                    <div class="icon-box glass-card p-3" style="background: rgba(255,255,255,0.03);">
                        <i class="bi bi-currency-dollar text-secondary fs-4"></i>
                    </div>
                    <span class="text-success small fw-bold">Verified</span>
                </div>
                <p class="text-secondary mb-1">Total Revenue</p>
                <h2 class="stat-value mb-0">₱{{ number_format($totalRevenue, 0) }}</h2>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="glass-card p-4">
                <h4 class="mb-4">Internal Stats</h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-secondary">Packages Available</span>
                    <span class="badge glass-card px-3 py-2 fs-6">{{ $totalPackages }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-secondary">Add-ons Catalog</span>
                    <span class="badge glass-card px-3 py-2 fs-6">{{ $totalAddOns }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection