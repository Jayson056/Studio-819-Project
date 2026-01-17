<?php
$adminName = "Admin";
?>

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

        body, html {
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
            gap: 10px;
        }

        .admin-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .packages-container {
            padding: 30px 40px;
        }

        .packages-table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
        }

        .packages-table th,
        .packages-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: var(--text-dark);
            vertical-align: top;
        }

        .packages-table th {
            background-color: var(--accent-red);
            color: white;
            text-transform: uppercase;
            font-size: 14px;
        }

        .packages-table tr:hover {
            background-color: #f5f0ea;
        }

        .delete-btn {
            background-color: #801B1B;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .delete-btn:hover {
            background-color: #5e1414;
        }

        .add-package-btn {
            margin-top: 20px;
            background-color: var(--accent-red);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .add-package-btn:hover {
            background-color: #5e1414;
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
                <span>📦</span> Packages
            </div>
            <div class="admin-profile">
                <img src="Images/cat.png" alt="Admin Profile">
                <span>Hello, <u><?php echo $adminName; ?>!</u></span>
            </div>
        </header>

            <div class="packages-container">
            <h2>All Packages</h2>

            <table class="packages-table">
                <thead>
                    <tr>
                        <th>Package ID</th>
                        <th>Package Name</th>
                        <th>Package Description</th>
                        <th>Unit Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Lite Package</td>
                        <td>
                            Ideal for 1–2 persons and includes a 10-minute self-photoshoot,
                            5 minutes for photo selection, 5 digital copies, one 4R print,
                            and 4 photo cards. Choose one backdrop from seven colors for a
                            complete 15-minute experience.
                        </td>
                        <td>P350.00</td>
                        <td>
                            <form method="post" action="deletepackage.php">
                                <input type="hidden" name="package_id" value="001">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="addpackage.php" class="add-package-btn">+ Add New Package</a>
        </div>




        </header>

    </div>
</div>

</body>
</html>