<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Verification - Studio 819</title>
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
            --table-header: #6f513a; 
        }
        body { background-color: var(--bg-beige); font-family: 'Segoe UI', sans-serif; color: var(--text-dark); margin: 0; }
        
        .sidebar { width: var(--sidebar-width); height: 100vh; background-color: var(--sidebar-beige); position: fixed; padding: 30px 20px; display: flex; flex-direction: column; align-items: center; z-index: 1000; }
        .nav-btn { display: block; width: 100%; background-color: var(--brand-maroon); color: white; padding: 12px; border-radius: 10px; margin-bottom: 12px; text-transform: uppercase; text-decoration: none; text-align: center; font-weight: 700; }
        .nav-btn.active { background-color: var(--brand-maroon-hover); }

        .main-content { margin-left: var(--sidebar-width); padding: 40px 60px; }
        .table-container { background: white; border-radius: 8px; overflow: hidden; margin-top: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .table thead th { background-color: var(--table-header); color: white; text-align: center; padding: 15px; border: none; }
        
        .btn-verify { background-color: var(--brand-maroon); color: white; border: none; padding: 5px 15px; border-radius: 5px; font-weight: bold; }
        .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-verified { background: #d4edda; color: #155724; }

        .modal-content { border-radius: 15px; background-color: #fdfbf7; }
        .detail-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        .detail-label { font-weight: bold; color: var(--table-header); }
    </style>
</head>
<body>

    <nav class="sidebar">
        <div class="logo-section mb-4"><img src="{{ asset('Images/logo.png') }}" style="width:180px;"></div>
        <div class="nav-links-container w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn">Dashboard</a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn">Bookings</a>
            <a href="{{ route('admin.customer') }}" class="nav-btn">Customers</a>
            <a href="{{ route('admin.packages') }}" class="nav-btn">Packages</a>
            <a href="{{ route('admin.payment') }}" class="nav-btn active">Payment</a>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="nav-btn" style="background-color: #3d1417; border: none;">Logout</button>
        </form>
    </nav>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold"><i class="bi bi-shield-check"></i> Payment Verification</h1>
            <div>Hello, <strong>{{ $adminName ?? 'Admin' }}!</strong></div>
        </header>

        <div class="table-container">
            <table class="table text-center align-middle mb-0">
                <thead>
                    <tr>
                        <th>Paymen-ID</th>
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payments as $p)
                    <tr>
                        <td>#{{ $p->payment_id }}</td>
                        <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                        <td>{{ $p->package_name }}</td>
                        <td>{{ $p->payment_method }}</td>
                        <td>₱{{ number_format($p->amount, 2) }}</td>
                        <td>
                            <span class="status-badge status-{{ strtolower($p->payment_status) }}">
                                {{ $p->payment_status }}
                            </span>
                        </td>
                        <td>
                            @if($p->payment_status == 'Pending')
                                <button class="btn-verify" onclick="openVerifyModal('{{ $p->payment_id }}', '{{ $p->first_name }} {{ $p->last_name }}', '{{ $p->package_name }}', '{{ $p->payment_method }}', '{{ $p->amount }}', '{{ $p->reference_number }}')">
                                    VERIFY
                                </button>
                            @else
                                <span class="text-muted"><i class="bi bi-check-circle-fill"></i> Verified</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7">No payment records found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="verifyModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <form action="{{ route('admin.payment.verify') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_id" id="modalPaymentId">
                    <div class="modal-header border-0">
                        <h5 class="fw-bold text-center w-100">Verification Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="detail-row"><span class="detail-label">Customer:</span> <span id="modalCustomer"></span></div>
                        <div class="detail-row"><span class="detail-label">Package:</span> <span id="modalPackage"></span></div>
                        <div class="detail-row"><span class="detail-label">Method:</span> <span id="modalMethod"></span></div>
                        <div class="detail-row"><span class="detail-label">Amount:</span> ₱<span id="modalAmount"></span></div>
                        <div class="detail-row"><span class="detail-label">Ref #:</span> <span id="modalRef" class="fw-bold text-primary"></span></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn-verify px-4">Confirm Verification</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const verifyModal = new bootstrap.Modal(document.getElementById('verifyModal'));

        function openVerifyModal(id, customer, pkg, method, amount, ref) {
            document.getElementById('modalPaymentId').value = id;
            document.getElementById('modalCustomer').textContent = customer;
            document.getElementById('modalPackage').textContent = pkg;
            document.getElementById('modalMethod').textContent = method;
            document.getElementById('modalAmount').textContent = parseFloat(amount).toLocaleString();
            document.getElementById('modalRef').textContent = ref;
            verifyModal.show();
        }
    </script>
</body>
</html>