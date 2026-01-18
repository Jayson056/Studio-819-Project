<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages - Studio 819</title>
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

        body {
            background-color: var(--bg-beige);
            font-family: 'Segoe UI', sans-serif;
            color: var(--text-dark);
            margin: 0;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--sidebar-beige);
            position: fixed;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-btn {
            display: block;
            width: 100%;
            background-color: var(--brand-maroon);
            color: white;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 12px;
            text-transform: uppercase;
            text-decoration: none;
            text-align: center;
            font-weight: 700;
        }

        .nav-btn.active {
            background-color: var(--brand-maroon-hover);
        }

        .logout-btn {
            margin-top: auto;
            background-color: #3d1417;
            width: 140px;
            border-radius: 25px;
            cursor: pointer;
            border: none;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 40px 60px;
        }

        .package-tabs {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 30px;
            border-bottom: 4px solid #9e9e9e;
        }

        .tab-link {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            cursor: pointer;
            opacity: 0.7;
            padding-bottom: 10px;
        }

        .tab-link.active {
            opacity: 1;
            border-bottom: 4px solid white;
            margin-bottom: -4px;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--table-header);
            color: white;
            text-align: center;
            padding: 15px;
        }

        .btn-brand-action {
            background-color: var(--brand-maroon);
            color: white;
            border: none;
            padding: 8px 25px;
            border-radius: 5px;
            font-weight: bold;
        }

        .table-section {
            display: none;
        }

        .table-section.active {
            display: block;
        }
    </style>
</head>

<body>

    <nav class="sidebar">
        <div class="logo-section mb-4"><img src="Images/logo.png" style="width:180px;"></div>
        <div class="nav-links-container w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-btn">Dashboard</a>
            <a href="{{ route('admin.bookings') }}" class="nav-btn {{ Request::is('admin/bookings*') ? 'active' : '' }}">Bookings</a>
            <a href="{{ route('admin.customer') }}" class="nav-btn">Customers</a>
            <a href="#" class="nav-btn active">Packages</a>
           <a href="{{ route('admin.payment') }}" class="nav-btn {{ Request::is('Studio-819-/admin/payment*') ? 'active' : '' }}">
    Payment
</a>
        </div>

        <a href="#" class="nav-btn logout-btn"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>


    </nav>

    <main class="main-content">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold"><i class="bi bi-box-seam-fill"></i> Packages</h1>
            <div>Hello, <strong>Admin!</strong></div>
        </header>

        <div class="package-tabs">
            <div class="tab-link active" onclick="switchTab('packages')">Package</div>
            <div class="tab-link" onclick="switchTab('backdrops')">Backdrop</div>
            <div class="tab-link" onclick="switchTab('addons')">Add On</div>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Search..." style="width:300px;">
                <button class="btn-brand-action">SEARCH</button>
            </div>
            <button class="btn-brand-action" onclick="openAddModal()">
                <i class="bi bi-plus-lg"></i> <span id="addBtnText">Add Package</span>
            </button>
        </div>

        <div class="table-container">
            <div id="packagesSection" class="table-section active">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Package</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $p)
                        <tr>
                            <td>#{{ $p->package_id }}</td>
                            <td>{{ $p->package_name }}</td>
                            <td>₱{{ number_format($p->base_price, 2) }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="openEditModal('package', '{{ $p->package_id }}', '{{ $p->package_name }}', '{{ $p->base_price }}')"><i class="bi bi-pencil"></i></button>
                                <form action="{{ route('admin.packages.delete', ['type'=>'package', 'id'=>$p->package_id]) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="backdropsSection" class="table-section">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Backdrop</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($backdrops as $b)
                        <tr>
                            <td>#{{ $b->backdrop_id }}</td>
                            <td>{{ $b->backdrop_name }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="openEditModal('backdrop', '{{ $b->backdrop_id }}', '{{ $b->backdrop_name }}', 0)"><i class="bi bi-pencil"></i></button>
                                <form action="{{ route('admin.packages.delete', ['type'=>'backdrop', 'id'=>$b->backdrop_id]) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="addonsSection" class="table-section">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Add On</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addons as $a)
                        <tr>
                            <td>#{{ $a->addon_id }}</td>
                            <td>{{ $a->addon_name }}</td>
                            <td>₱{{ number_format($a->price, 2) }}</td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="openEditModal('addon', '{{ $a->addon_id }}', '{{ $a->addon_name }}', '{{ $a->price }}')"><i class="bi bi-pencil"></i></button>
                                <form action="{{ route('admin.packages.delete', ['type'=>'addon', 'id'=>$a->addon_id]) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="modal fade" id="itemModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('admin.packages.store') }}" method="POST" id="modalForm">
                @csrf
                <div id="methodField"></div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle">Add Item</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="itemId">
                        <input type="hidden" name="type" id="itemType">
                        <div class="mb-3"><label>Name</label><input type="text" name="name" id="itemName" class="form-control" required></div>
                        <div class="mb-3" id="priceInputDiv"><label>Price</label><input type="number" step="0.01" name="price" id="itemPrice" class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentTab = 'packages';
        const itemModal = new bootstrap.Modal(document.getElementById('itemModal'));

        function switchTab(tab) {
            currentTab = tab;
            document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
            event.target.classList.add('active');
            document.querySelectorAll('.table-section').forEach(s => s.classList.remove('active'));
            document.getElementById(tab + 'Section').classList.add('active');
            document.getElementById('addBtnText').textContent = "Add " + tab.charAt(0).toUpperCase() + tab.slice(1, -1);
        }

        function openAddModal() {
            document.getElementById('modalTitle').textContent = "Add " + currentTab;
            document.getElementById('modalForm').action = "{{ route('admin.packages.store') }}";
            document.getElementById('methodField').innerHTML = "";
            document.getElementById('itemType').value = currentTab.slice(0, -1); // 'package', 'addon', etc
            document.getElementById('itemName').value = "";
            document.getElementById('itemPrice').value = "";
            document.getElementById('priceInputDiv').style.display = currentTab === 'backdrops' ? 'none' : 'block';
            itemModal.show();
        }

        function openEditModal(type, id, name, price) {
            document.getElementById('modalTitle').textContent = "Edit " + type;
            document.getElementById('modalForm').action = "{{ route('admin.packages.update') }}";
            document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            document.getElementById('itemType').value = type;
            document.getElementById('itemId').value = id;
            document.getElementById('itemName').value = name;
            document.getElementById('itemPrice').value = price;
            document.getElementById('priceInputDiv').style.display = type === 'backdrop' ? 'none' : 'block';
            itemModal.show();
        }
    </script>
</body>

</html>