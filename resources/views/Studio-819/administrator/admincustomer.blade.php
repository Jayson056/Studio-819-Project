=
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio 819 Admin Panel</title>
    <style>
        :root {
            --sidebar-bg: #EAE2D6;
            --main-bg-overlay: rgba(234, 226, 214, 0);
            --accent-red: #801B1B;
            --text-dark: #4A3728;
            --card-bg: #4A322C;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Background Image Setup */
        .wrapper {
            display: flex;
            height: 100vh;
            background: url('Images/BG.png') no-repeat center center;
            background-size: cover;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            border-right: 1px solid #CCC;
        }

        .logout-container {
            margin-top: auto;
            width: 100%;
            display: flex;
            justify-content: center;
            padding-bottom: 30px;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 50px;
        }

        .logo-area h1 {
            margin: 0;
            font-size: 28px;
            color: var(--text-dark);
            font-weight: bold;
        }

        .logo-area p {
            margin: 0;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-buttons {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
        }

        .nav-btn {
            width: 70%;
            padding: 15px;
            background-color: var(--accent-red);
            color: white;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .logout-btn {
            margin-top: auto;
            margin-bottom: 30px;
            background-color: #4A2020;
            padding: 10px 10px;
            border-radius: 20px;
        }

        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            background-color: transparent;
            display: flex;
            flex-direction: column;
        }

        /* Top Header */
        .header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #AAA;
        }

        .dashboard-title {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 32px;
            font-weight: bold;
            color: var(--text-dark);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Customers Table */
        .table-container {
            padding: 40px;
        }

        .table-container h2 {
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .custom-table thead {
            background-color: var(--accent-red);
            color: #fff;
        }

        .custom-table th,
        .custom-table td {
            padding: 15px;
            text-align: left;
        }

        .custom-table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .custom-table tbody tr:hover {
            background-color: #f5f0ea;
        }

        .custom-table th {
            text-transform: uppercase;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar">
            <div class="logo-area">
                <img src="Images/logo.png" alt="Studio 819 Logo" width="170">
            </div>

            <div class="nav-buttons">
                <a href="{{ route('admin.dashboard') }}" class="nav-btn">Dashboard</a>
                <a href="{{ route('admin.customer') }}" class="nav-btn">Customers</a>
                <a href="{{ route('admin.packages') }}" class="nav-btn">Packages</a>
            </div>

            <div class="logout-container">
                <form action="{{ route('admin.logout') }}" method="POST"
                    style="width:100%; display:flex; justify-content:center;">
                    @csrf
                    <button type="submit" class="nav-btn logout-btn">
                        Logout
                    </button>
                </form>
            </div>

        </div>

        <div class="main-content">
            <header class="header">

                <div class="dashboard-title">
                    <span>👥</span> Customers
                </div>
                <div class="admin-profile">
                    <img src="Images/cat.png" alt="Admin Profile">
                    <span>Hello, <u><?php echo $adminName; ?>!</u></span>

                </div>
            </header>
            <div class="table-container">
                <h2>All Customers</h2>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr>
                            <td>{{ $customer->customer_id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align:center;">No customers found</td>
                        </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>


        </div>
    </div>

</body>

</html>