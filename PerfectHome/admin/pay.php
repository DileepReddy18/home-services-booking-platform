<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Payments</title>
    <!-- Bootstrap CSS for responsiveness -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f8f9fa;
            text-align: center;
            padding: 20px;
        }

        .sidebar img {
            width: 80%;
            height: auto;
            margin-bottom: 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #ddd;
            padding: 10px 15px;
            display: block;
            margin: 5px 0;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            color: white;
        }

        .navbar a {
            color: white;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
        }

        .pending {
            background-color: #dc3545;
            color: white;
        }

        .paid {
            background-color: #28a745;
            color: white;
        }

        .btn-custom {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="perfecthome.jpg" alt="Company Logo"> <!-- Insert your logo image here -->
            Admin Panel
        </div>
        <a href="dashboard.html">Dashboard</a>
        <a href="admin.html">Manage Bookings</a>
        <a href="#" class="active">Manage Payments</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <span class="navbar-brand">Admin Dashboard</span>
            <a href="../login/login.html">Logout</a>
        </nav>

        <!-- Payment Management Section -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Payments</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Service</th>
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Payment Row 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>Heram</td>
                                        <td>Plumbing</td>
                                        <td>₹2000</td>
                                        <td><span class="status-badge pending">Pending</span></td>
                                        <td>
                                            <button class="btn btn-success btn-sm btn-custom" onclick="markPaymentCompleted(1)">Mark as Paid</button>
                                            <button class="btn btn-danger btn-sm btn-custom" onclick="cancelPayment(1)">Cancel</button>
                                        </td>
                                    </tr>
                                    <!-- Payment Row 2 -->
                                    <tr>
                                        <td>2</td>
                                        <td>Sudharshan</td>
                                        <td>Electrician</td>
                                        <td>₹1500</td>
                                        <td><span class="status-badge paid">Paid</span></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm btn-custom" onclick="cancelPayment(2)">Cancel</button>
                                        </td>
                                    </tr>
                                    <!-- Payment Row 3 -->
                                    <tr>
                                        <td>3</td>
                                        <td>Dileep</td>
                                        <td>Cleaning</td>
                                        <td>₹1000</td>
                                        <td><span class="status-badge paid">Paid</span></td>
                                        <td>
                                            <button class="btn btn-danger btn-sm btn-custom" onclick="cancelPayment(3)">Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Functions for managing payments
        function markPaymentCompleted(paymentId) {
            const paymentRow = $('#paymentTableBody tr').eq(paymentId - 1);
            paymentRow.find('td').eq(4).html('<span class="status-badge paid">Paid</span>');
            alert('Payment for Booking ID ' + paymentId + ' has been marked as paid!');
        }

        function cancelPayment(paymentId) {
            alert('Payment ID: ' + paymentId + ' has been canceled.');
        }
    </script>

</body>

</html>
