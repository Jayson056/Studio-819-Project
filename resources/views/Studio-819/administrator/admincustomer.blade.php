<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Studio 819</title>
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
        .sidebar { width: var(--sidebar-width); height: 100vh; background-color: var(--sidebar-beige); position: fixed; padding: 30px 20px; display: flex; flex-direction: column; align-items: center; }
        .nav-btn { display: block; width: 100%; background-color: var(--brand-maroon); color: white; padding: 12px; border-radius: 10px; margin-bottom: 12px; text-transform: uppercase; text-decoration: none; text-align: center; font-weight: 700; }
        .nav-btn.active { background-color: var(--brand-maroon-hover); }
        .main-content { margin-left: var(--sidebar-width); padding: 40px 60px; }
        .table-container { background: white; border-radius: 8px; overflow: hidden; margin-top: 20px; }
        .table thead th { background-color: var(--table-header); color: white; text-align: center; padding: 15px; }
        .btn-brand-action { background-color: var(--brand-maroon); color: white; border: none; padding: 8px 25px; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>

    <nav class="sidebar">
        <div class="logo-section mb-4"><img src="Images/logo.png" style="width:180px;"></div>
        <div class="nav-links-container w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn">Dashboard</a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn {{ Request::is('admin/bookings*') ? 'active' : '' }}">Bookings</a>
            <a href="#" class="nav-btn active">Customers</a>
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
            <h1 class="fw-bold"><i class="bi bi-people-fill"></i> Customers</h1>
            <div>Hello, <strong>{{ $adminName }}!</strong></div>
        </header>

        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Search customer..." style="width:300px;">
                <button class="btn-brand-action">SEARCH</button>
            </div>
            <div class="fw-bold">Total Customers: {{ count($customers) }}</div>
        </div>

        <div class="table-container">
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th>Customer-ID</th>
                        <th>Profile</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $c)
                    <tr>
                        <td>#{{ $c->customer_id }}</td>
                        <td><img src="Images/defprof.png" width="40" class="rounded-circle"></td>
                        <td>{{ $c->first_name }} {{ $c->last_name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->phone_number }}</td>
                        <td>
                            <button class="btn btn-sm btn-success" 
                                onclick="openEditModal('{{ $c->customer_id }}', '{{ $c->first_name }}', '{{ $c->last_name }}', '{{ $c->email }}', '{{ $c->phone_number }}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                            
                            <form action="{{ route('admin.customer.delete', $c->customer_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this customer?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal fade" id="editCustomerModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.customer.update') }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Customer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" id="editId">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" id="editFirstName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="editLastName" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="editEmail" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" id="editPhone" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-brand-action">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const editModal = new bootstrap.Modal(document.getElementById('editCustomerModal'));

        function openEditModal(id, fname, lname, email, phone) {
            document.getElementById('editId').value = id;
            document.getElementById('editFirstName').value = fname;
            document.getElementById('editLastName').value = lname;
            document.getElementById('editEmail').value = email;
            document.getElementById('editPhone').value = phone;
            editModal.show();
        }
    </script>
</body>
</html>