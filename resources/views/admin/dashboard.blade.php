<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>J. R. Preparatory School Fees Dashboard</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo-color.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Bootstrap/css/bootstrap.min.css')}}"> 
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --danger-color: #e74a3b;
            --warning-color: #f6c23e;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
        }
        
        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #2c3e50;
            color: white;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        
        .sidebar-logo {
            height: 60px;
            margin-bottom: 1rem;
        }
        
        .sidebar-menu {
            padding: 1rem 0;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border-left-color: var(--primary-color);
        }
        
        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content Area */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 1.5rem;
        }
        
        /* Dashboard Header */
        .dashboard-header {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
            color: var(--dark-color);
        }
        
        .page-title p {
            color: #6c757d;
            margin-bottom: 0;
            font-size: 0.9rem;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1rem;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 1.5rem;
            border-radius: 10px 10px 0 0 !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            margin-bottom: 0;
            color: var(--dark-color);
        }
        
        /* Stats Cards */
        .stats-card {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        
        .data-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .table thead {
            background: var(--header-gradient);
            color: white;
        }
        
        .table th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }
        
        .status-paid {
            background-color: rgba(28, 200, 138, 0.2);
            color: var(--secondary-color);
        }
        
        .status-refunded {
            background-color: rgba(231, 74, 59, 0.2);
            color: var(--danger-color);
        }
        
        .action-btn {
            color: var(--primary-color);
            font-size: 1.1rem;
            margin: 0 5px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .action-btn:hover {
            transform: scale(1.2);
        }
        
        .action-btn.delete {
            color: var(--danger-color);
        }
        
        .action-btn.delete:hover {
            background: var(--danger-light);
        }
        
        .action-btn.refund {
            color: var(--warning-color);
        }
        
        .action-btn.refund:hover {
            background: var(--warning-light);
        }
        
        /* Buttons */
        .btn {
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 0.5px;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        
        .btn-primary:hover {
            background-color: #3a5ccc;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
        }
        
        .btn-success {
            background-color: var(--secondary-color);
            box-shadow: 0 4px 15px rgba(28, 200, 138, 0.3);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .input-group-text {
            background-color: #e9ecef;
            border: none;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        /* Floating Label */
        .floating-label {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .floating-label .form-control, .floating-label .form-select {
            height: calc(3.5rem + 2px);
            padding: 1rem 0.75rem;
            padding-left: 2.5rem;
            background: transparent;
        }

        .floating-label .input-group-text {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            z-index: 2;
            background: transparent;
            border: none;
            color: var(--dark-color);
            padding-left: 1rem;
            display: flex;
            align-items: center;
        }
        
        .floating-label label {
            position: absolute;
            top: 0;
            left: 2.5rem;
            height: 100%;
            padding: 1rem 0.75rem;
            pointer-events: none;
            border: 1px solid transparent;
            transform-origin: 0 0;
            transition: opacity .1s ease-in-out, transform .1s ease-in-out;
            color: #6c757d;
            z-index: 3;
            margin-bottom: 0;
            background: transparent;
        }
        
        .floating-label .form-control:focus ~ label,
        .floating-label .form-control:not(:placeholder-shown) ~ label,
        .floating-label .form-select:focus ~ label,
        .floating-label .form-select:not([value=""]):valid ~ label {
            opacity: 1;
            transform: scale(0.85) translateY(-1rem) translateX(-0.5rem);
            background-color: white;
            padding: 0 0.5rem;
            color: var(--primary-color);
            left: 2.5rem;
            height: auto;
        }

        .floating-label .form-control::placeholder {
            color: transparent;
        }

        .floating-label .form-control:focus::placeholder {
            color: #6c757d;
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .shake {
            animation: shake 0.5s;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .sidebar-header {
                padding: 1rem;
            }
            
            .sidebar-logo {
                height: 40px;
                margin-bottom: 0;
            }
            
            .nav-link span {
                display: none;
            }
            
            .nav-link i {
                margin-right: 0;
                font-size: 1.2rem;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .user-menu {
                margin-top: 1rem;
                width: 100%;
                justify-content: flex-end;
            }
            
            .stats-card {
                padding: 1rem;
            }
            
            .stats-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .stats-value {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1050;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-btn {
                display: block;
            }
        }
        
        /* Print Styles */
        @media print {
            .sidebar, .no-print {
                display: none !important;
            }
            
            .main-content {
                margin-left: 0;
                padding: 0;
            }
            
            .card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }

        /* Add these styles to your existing CSS */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Ensure proper margins on mobile */
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
            
            .card {
                margin-bottom: 1rem;
            }
            
            .btn-group, .btn {
                margin-bottom: 0.5rem;
            }
            
            .filter-card .btn-group, .filter-card .btn {
                margin-bottom: 0;
            }
        }
        
        /* Prevent date picker from causing overflow */
        .daterangepicker {
            max-width: 100%;
        }
    </style>
</head>
<body>
<!-- Dashboard Container -->
<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="sidebar-logo">
        </div>
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-rupee-sign"></i>
                        <span>Fee Payments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="page-title">
                <h1>Fee Payments Dashboard</h1>
                <p>Manage and monitor all fee transactions</p>
            </div>
            <div class="user-menu">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-2"></i> Admin User
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('signout')}}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
                <div class="user-avatar">AU</div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card stats-card animate__animated animate__fadeInUp">
                    <div class="stats-icon primary">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3 class="stats-value" id="totalRevenue">₹0</h3>
                    <p class="stats-label">Total Revenue</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card stats-card animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="stats-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3 class="stats-value" id="totalPaid">0</h3>
                    <p class="stats-label">Paid Transactions</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card stats-card animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="stats-icon warning">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h3 class="stats-value" id="totalRefunded">0</h3>
                    <p class="stats-label">Refunded Transactions</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card stats-card animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="stats-icon danger">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h3 class="stats-value" id="pendingPayments">0</h3>
                    <p class="stats-label">Pending Payments</p>
                </div>
            </div>
        </div>

        <!-- Filter Card -->
        <div class="card filter-card animate__animated animate__fadeIn">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-filter me-2"></i> Filter Transactions</h5>
                <div class="d-flex">
                    <button class="btn btn-info btn-sm" id="printBtn" type="button" onclick="window.print()">
                        <i class="fas fa-print me-2"></i> Print
                    </button>
                    
                </div>
            </div>
            <div class="card-body">
                <!-- Basic filters -->
                <form class="row g-3 align-items-center mb-3" autocomplete="off">
                    <!-- Date Filter -->
                    <div class="col-md-5 floating-label">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            <input type="date" class="form-control" id="selectdate" name="selectdate" value="{{old('selectdate')}}" placeholder=" ">
                            <label for="selectdate">Select Date</label>
                        </div>
                    </div>
                    
                    <!-- Class Filter -->
                    <div class="col-md-5 floating-label">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                            <select class="form-select" id="selectclass" name="selectclass" required>
                                <option value="" selected disabled></option>
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                                <option value="4">Class 4</option>
                                <option value="5">Class 5</option>
                                <option value="6">Class 6</option>
                                <option value="7">Class 7</option>
                                <option value="8">Class 8</option>
                                <option value="9">Class 9</option>
                                <option value="10">Class 10</option>
                                <option value="11">Class 11</option>
                                <option value="12">Class 12</option>
                            </select>
                            <label for="selectclass">Select Class</label>
                        </div>
                    </div>
                    
                    <!-- Filter Button -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 py-2" id="formsubmit">
                            <i class="fas fa-filter me-2"></i> Filter
                        </button>
                    </div>
                </form>

                <!-- Advanced search options -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Search records...">
                            <button class="btn btn-outline-secondary" type="button" id="clearSearchBtn"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <input type="text" class="form-control" name="datefilter" placeholder="Select date range">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class Fees Management Card -->
        <div class="card animate__animated animate__fadeIn">
            <div class="card-header">
                <h5 class="card-title"><i class="fas fa-money-bill-wave me-2"></i> Manage Class Fees</h5>
                <a href="{{route('downloadTransactions')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-download me-2"></i> Export Data
                </a>
            </div>
            <div class="card-body">
                <form id="updateFeesForm">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-md-4">
                            <select class="form-select" name="class" required>
                                <option value="">Select Class</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">Class {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" name="fees_per_month" placeholder="Fees per month" min="0" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success w-100 h-90" id="updateFeeBtn">
                                <i class="fas fa-save me-2"></i> Update Fees
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Class Fees Table -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Fees Per Month</th>
                                <th>Last Updated</th>
                            </tr>
                        </thead>
                        <tbody id="classFeesList">
                            @forelse($classFees as $fee)
                                <tr>
                                    <td>Class {{ $fee->class }}</td>
                                    <td>₹{{ number_format($fee->fees_per_month, 2) }}</td>
                                    <td>{{ $fee->updated_at->format('d/m/Y H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No class fees set yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Transactions Table Card -->
        <div class="card animate__animated animate__fadeIn">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-list-alt me-2"></i> Recent Transactions</h5>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center me-3">
                        <select class="form-select me-2" id="bulkAction" style="width: 150px;">
                            <option value="">Bulk Actions</option>
                            <option value="delete">Delete</option>
                            <option value="refund">Refund</option>
                        </select>
                        <button class="btn btn-primary btn-sm" id="applyBulkAction" type="button" onclick="applyBulkAction()">
                            Apply
                        </button>
                        
                        
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="tableActions" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="tableActions">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sync-alt me-2"></i> Refresh</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-columns me-2"></i> Columns</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="data-table">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" width="40">
                                        <input type="checkbox" id="selectAll">
                                    </th>
                                    <th scope="col" class="d-none d-md-table-cell">Receipt No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Class</th>
                                    <th scope="col" class="d-none d-md-table-cell">Mobile</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Fees/Month</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Months</th>
                                    <th scope="col" class="d-none d-lg-table-cell">Total Paid</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="data-body">
                                <!-- Data will be loaded here via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <nav aria-label="Table navigation">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
<script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();
        
        // Initialize counters
        let totalRevenue = 0;
        let paidCount = 0;
        let refundedCount = 0;
        let pendingCount = 0;
        let rejectedCount = 0;
        
        // Function to fetch and display all data when page loads
        function fetchData() {
            // Show loading state
            $('#data-body').html('<tr><td colspan="10" class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></td></tr>');
            
            console.log('Fetching data from:', "{{route('allrecord')}}");
            
            $.ajax({
                url: "{{route('allrecord')}}",
                type: 'GET',
                success: function(response) {
                    console.log('Response received:', response);
                    $('#data-body').empty();
                    
                    // Reset counters
                    totalRevenue = 0;
                    paidCount = 0;
                    refundedCount = 0;
                    pendingCount = 0;
                    rejectedCount = 0;
                    
                    if (!response.success || !response.data || response.data.length === 0) {
                        console.log('No data found in response');
                        $('#data-body').append('<tr class="fade-in"><td colspan="10" class="text-center py-4 text-muted"><i class="fas fa-exclamation-circle me-2"></i>No records found</td></tr>');
                    } else {
                        console.log('Processing ' + response.data.length + ' records');
                        response.data.forEach(function(record) {
                            let statusClass;
    
                            if(record.payment_status === 'Paid') {
                                totalRevenue += parseFloat(record.total_fees_paid);
                                paidCount++;
                                statusClass = 'status-paid';
                            } else if(record.payment_status === 'Refunded') {
                                refundedCount++;
                                statusClass = 'status-refunded';
                            } else if(record.payment_status === 'Pending') {
                                pendingCount++;
                                statusClass = 'status-pending';
                            } else if(record.payment_status === 'Rejected') {
                                rejectedCount++;
                                statusClass = 'status-rejected';
                            }
                            
                            $('#data-body').append(
                                '<tr class="fade-in">' +
                                '<td><input type="checkbox" class="record-checkbox" value="' + record.id + '"></td>' +
                                '<td class="d-none d-md-table-cell">' + (record.receipt_no || 'N/A') + '</td>' +
                                '<td>' + record.student_name + '</td>' +
                                '<td>Class ' + record.class + '</td>' +
                                '<td class="d-none d-md-table-cell">' + record.mobile + '</td>' +
                                '<td class="d-none d-lg-table-cell">₹' + record.fees + '</td>' +
                                '<td class="d-none d-lg-table-cell">' + record.month + '</td>' +
                                '<td class="d-none d-lg-table-cell">₹' + record.total_fees_paid + '</td>' +
                                '<td>' +
                                    '<select class="form-select form-select-sm status-select" data-id="' + record.id + '">' +
                                        '<option value="Pending" ' + (record.payment_status === 'Pending' ? 'selected' : '') + '>Pending</option>' +
                                        '<option value="Paid" ' + (record.payment_status === 'Paid' ? 'selected' : '') + '>Paid</option>' +
                                        '<option value="Rejected" ' + (record.payment_status === 'Rejected' ? 'selected' : '') + '>Rejected</option>' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                '<div class="btn-group">' +
                                    '<a href="#" class="refund-record action-btn refund' + (record.payment_status !== 'Paid' ? ' disabled' : '') + '" data-id="' + record.id + '" data-bs-toggle="tooltip" title="Refund"><i class="fas fa-undo"></i></a>' +
                                    '<a href="#" class="delete-record action-btn delete" data-id="' + record.id + '" data-bs-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>' +
                                    '<a href="/admin/print/' + record.id + '" class="action-btn" data-bs-toggle="tooltip" title="Print"><i class="fas fa-print"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>'
                            );
                        });
                        
                        // Update stats
                        $('#totalRevenue').text('₹' + totalRevenue.toFixed(2));
                        $('#totalPaid').text(paidCount);
                        $('#totalRefunded').text(refundedCount);
                        $('#pendingPayments').text(pendingCount);
                        
                        // Initialize tooltips for new elements
                        $('[data-bs-toggle="tooltip"]').tooltip();
                        
                        // Set up event handlers
                        setupEventHandlers();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                    console.error('Status:', status);
                    console.error('Response:', xhr.responseText);
                    $('#data-body').html('<tr><td colspan="10" class="text-center py-4 text-danger"><i class="fas fa-exclamation-circle me-2"></i>Error loading data. Please try again.</td></tr>');
                }
            });
        }
        
        // Call the fetchData function on page load
        fetchData();
        
        // Form submission for filtering
        $('#formsubmit').click(function(event) {
            event.preventDefault();
            
            // Show loading state
            $('#data-body').html('<tr><td colspan="10" class="text-center py-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></td></tr>');
            
            var selectdate = $('#selectdate').val();
            var selectclass = $('#selectclass').val();
            
            $.ajax({
                url: "{{route('specificrecord')}}",
                type: 'POST',
                data: {
                    selectdate: selectdate,
                    selectclass: selectclass
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#data-body').empty();
                    
                    // Reset counters
                    totalRevenue = 0;
                    paidCount = 0;
                    refundedCount = 0;
                    pendingCount = 0;
                    rejectedCount = 0;
                    
                    if (!response.success || !response.data || response.data.length === 0) {
                        $('#data-body').append('<tr class="fade-in"><td colspan="10" class="text-center py-4 text-muted"><i class="fas fa-exclamation-circle me-2"></i>No matching records found</td></tr>');
                    } else {
                        response.data.forEach(function(record) {
                            let statusClass;

                            if(record.payment_status === 'Paid') {
                                totalRevenue += parseFloat(record.total_fees_paid);
                                paidCount++;
                                statusClass = 'status-paid';
                            } else if(record.payment_status === 'Refunded') {
                                refundedCount++;
                                statusClass = 'status-refunded';
                            } else if(record.payment_status === 'Pending') {
                                pendingCount++;
                                statusClass = 'status-pending';
                            } else if(record.payment_status === 'Rejected') {
                                rejectedCount++;
                                statusClass = 'status-rejected';
                            }
                            
                            $('#data-body').append(
                                '<tr class="fade-in">' +
                                '<td><input type="checkbox" class="record-checkbox" value="' + record.id + '"></td>' +
                                '<td class="d-none d-md-table-cell">' + (record.receipt_no || 'N/A') + '</td>' +
                                '<td>' + record.student_name + '</td>' +
                                '<td>Class ' + record.class + '</td>' +
                                '<td class="d-none d-md-table-cell">' + record.mobile + '</td>' +
                                '<td class="d-none d-lg-table-cell">₹' + record.fees + '</td>' +
                                '<td class="d-none d-lg-table-cell">' + record.month + '</td>' +
                                '<td class="d-none d-lg-table-cell">₹' + record.total_fees_paid + '</td>' +
                                '<td>' +
                                    '<select class="form-select form-select-sm status-select" data-id="' + record.id + '">' +
                                        '<option value="Pending" ' + (record.payment_status === 'Pending' ? 'selected' : '') + '>Pending</option>' +
                                        '<option value="Paid" ' + (record.payment_status === 'Paid' ? 'selected' : '') + '>Paid</option>' +
                                        '<option value="Rejected" ' + (record.payment_status === 'Rejected' ? 'selected' : '') + '>Rejected</option>' +
                                    '</select>' +
                                '</td>' +
                                '<td>' +
                                '<div class="btn-group">' +
                                    '<a href="#" class="refund-record action-btn refund' + (record.payment_status !== 'Paid' ? ' disabled' : '') + '" data-id="' + record.id + '" data-bs-toggle="tooltip" title="Refund"><i class="fas fa-undo"></i></a>' +
                                    '<a href="#" class="delete-record action-btn delete" data-id="' + record.id + '" data-bs-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>' +
                                    '<a href="/admin/print/' + record.id + '" class="action-btn" data-bs-toggle="tooltip" title="Print"><i class="fas fa-print"></i></a>' +
                                '</div>' +
                                '</td>' +
                                '</tr>'
                            );
                        });
                        
                        // Update stats
                        $('#totalRevenue').text('₹' + totalRevenue.toFixed(2));
                        $('#totalPaid').text(paidCount);
                        $('#totalRefunded').text(refundedCount);
                        $('#pendingPayments').text(pendingCount);
                        
                        // Initialize tooltips for new elements
                        $('[data-bs-toggle="tooltip"]').tooltip();
                        
                        // Set up event handlers
                        setupEventHandlers();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error filtering data:', error);
                    $('#data-body').html('<tr><td colspan="10" class="text-center py-4 text-danger"><i class="fas fa-exclamation-circle me-2"></i>Error filtering data: ' + error + '</td></tr>');
                }
            });
        });
        
        // Set up event handlers for delete and refund actions
        function setupEventHandlers() {
            $('.delete-record').click(function(e) {
                e.preventDefault();
                var recordId = $(this).data('id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/delete/' + recordId,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'The record has been deleted.',
                                    'success'
                                );
                                fetchData();
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'There was an error deleting the record.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
            
            $('.refund-record').click(function(e) {
                e.preventDefault();
                if ($(this).hasClass('disabled')) return;
                
                var recordId = $(this).data('id');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will initiate a refund for this payment.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, refund it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/refund/' + recordId,
                            type: 'GET',
                            success: function(response) {
                                if (response.refund) {
                                    Swal.fire(
                                        'Refunded!',
                                        response.refund,
                                        'success'
                                    );
                                    fetchData();
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was an error processing the refund.',
                                        'error'
                                    );
                                }
                            },
                            error: function() {
                                Swal.fire(
                                    'Error!',
                                    'There was an error processing the refund.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
            
            $('.status-select').change(function() {
                var recordId = $(this).data('id');
                var newStatus = $(this).val();
                
                $.ajax({
                    url: '/admin/update-payment-status/' + recordId,
                    type: 'POST',
                    data: {
                        status: newStatus
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success'
                            });
                            
                            if (newStatus === 'Paid' && response.receipt_url) {
                                window.open(response.receipt_url, '_blank');
                            }
                            
                            fetchData();
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error updating the status.',
                            icon: 'error'
                        });
                    }
                });
            });
        }
        
        // Select all checkbox functionality
        $('#selectAll').change(function() {
            $('.record-checkbox').prop('checked', $(this).prop('checked'));
        });
        
        // Bulk action functionality
        $('#applyBulkAction').click(function() {
            var action = $('#bulkAction').val();
            var selectedIds = [];
            
            $('.record-checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });
            
            if (selectedIds.length === 0) {
                Swal.fire({
                    title: 'No Selection',
                    text: 'Please select at least one record to perform the action.',
                    icon: 'warning'
                });
                return;
            }
            
            if (action === 'delete') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete them!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let successCount = 0;
                        let errorCount = 0;
                        let completedCount = 0;
                        
                        // Delete selected records
                        selectedIds.forEach(function(id) {
                            $.ajax({
                                url: '/admin/delete/' + id,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function() {
                                    successCount++;
                                    completedCount++;
                                    if (completedCount === selectedIds.length) {
                                        if (errorCount > 0) {
                                            Swal.fire(
                                                'Partial Success!',
                                                successCount + ' records deleted successfully. ' + errorCount + ' records failed to delete.',
                                                'warning'
                                            );
                                        } else {
                                            Swal.fire(
                                                'Deleted!',
                                                'All selected records have been deleted.',
                                                'success'
                                            );
                                        }
                                        fetchData();
                                    }
                                },
                                error: function() {
                                    errorCount++;
                                    completedCount++;
                                    if (completedCount === selectedIds.length) {
                                        if (errorCount > 0) {
                                            Swal.fire(
                                                'Partial Success!',
                                                successCount + ' records deleted successfully. ' + errorCount + ' records failed to delete.',
                                                'warning'
                                            );
                                        } else {
                                            Swal.fire(
                                                'Error!',
                                                'Failed to delete all records.',
                                                'error'
                                            );
                                        }
                                        fetchData();
                                    }
                                }
                            });
                        });
                    }
                });
            } else if (action === 'refund') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will initiate refunds for the selected payments.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, refund them!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let successCount = 0;
                        let errorCount = 0;
                        let completedCount = 0;
                        
                        // Refund selected records
                        selectedIds.forEach(function(id) {
                            $.ajax({
                                url: '/admin/refund/' + id,
                                type: 'GET',
                                success: function(response) {
                                    if (response.refund) {
                                        successCount++;
                                    } else {
                                        errorCount++;
                                    }
                                    completedCount++;
                                    if (completedCount === selectedIds.length) {
                                        if (errorCount > 0) {
                                            Swal.fire(
                                                'Partial Success!',
                                                successCount + ' payments refunded successfully. ' + errorCount + ' payments failed to refund.',
                                                'warning'
                                            );
                                        } else {
                                            Swal.fire(
                                                'Refunded!',
                                                'All selected payments have been refunded.',
                                                'success'
                                            );
                                        }
                                        fetchData();
                                    }
                                },
                                error: function() {
                                    errorCount++;
                                    completedCount++;
                                    if (completedCount === selectedIds.length) {
                                        if (errorCount > 0) {
                                            Swal.fire(
                                                'Partial Success!',
                                                successCount + ' payments refunded successfully. ' + errorCount + ' payments failed to refund.',
                                                'warning'
                                            );
                                        } else {
                                            Swal.fire(
                                                'Error!',
                                                'Failed to refund all payments.',
                                                'error'
                                            );
                                        }
                                        fetchData();
                                    }
                                }
                            });
                        });
                    }
                });
            }
        });
    });
</script>

<!-- Fix the student details modal -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="studentDetailsContent">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Add these new elements to your HTML body -->
<div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="studentDetailsContent">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
// Add this JavaScript for the update fees functionality
$(document).ready(function() {
    $('#updateFeeBtn').closest('form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        const submitBtn = $('#updateFeeBtn');
        
        // Change button state to loading
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i> Updating...');
        submitBtn.prop('disabled', true);
        
        $.ajax({
            url: "{{ route('admin.updateClassFees') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Show success message
                    swal({
                        title: "Success",
                        text: response.message,
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        // Refresh the page to show updated fees
                        window.location.reload();
                    });
                } else {
                    swal("Error", "Failed to update fees", "error");
                }
            },
            error: function(xhr) {
                let errorMessage = "An error occurred while updating fees";
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join("\n");
                }
                swal("Error", errorMessage, "error");
            },
            complete: function() {
                // Reset button state
                submitBtn.html('<i class="fas fa-save me-2"></i> Update Fees');
                submitBtn.prop('disabled', false);
            }
        });
    });
});
</script>
</body>
</html>
