<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>J. R. Preparatory School Fees Payment</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo-color.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #f6c23e;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
            --header-gradient: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Header Styles */
        .main-header {
            background: var(--header-gradient);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: relative;
            z-index: 1000;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .logo {
            height: 60px;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .school-name {
            margin-left: 15px;
            color: white;
        }
        
        .school-name h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
            font-family: 'Montserrat', sans-serif;
        }
        
        .school-name p {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        /* Navigation */
        .main-nav {
            display: flex;
            align-items: center;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            margin-left: 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        .nav-link:hover {
            color: white;
            transform: translateY(-2px);
        }
        
        .nav-link i {
            margin-right: 5px;
        }
        
        /* Hero Section */
        .hero-section {
            background: var(--header-gradient);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.15;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        
        /* Features Section */
        .features-section {
            padding: 3rem 0;
            background-color: white;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .feature-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--dark-color);
        }
        
        .feature-text {
            color: #6c757d;
            font-size: 0.95rem;
        }
        
        /* Payment Container */
        .payment-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 3rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .payment-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--header-gradient);
        }
        
        .payment-container:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px 10px 2.5rem;
            border: 1px solid #d1d3e2;
            transition: all 0.3s;
            position: relative;
            background: white;
            z-index: 1;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
            outline: none;
        }
        
        .btn-success {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 0.5px;
        }
        
        .btn-success:hover {
            background-color: #17a673;
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background-color: var(--accent-color);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-warning:hover {
            background-color: #e0b22e;
            transform: translateY(-2px);
        }
        
        .error {
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
        
        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            overflow: hidden;
            border: none;
        }
        
        .modal-header {
            background: var(--header-gradient);
            color: white;
            border-bottom: none;
        }
        
        .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }
        
        .btn-close:hover {
            opacity: 1;
        }
        
        /* Floating Receipt Button */
        .receipt-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(246, 194, 62, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(246, 194, 62, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(246, 194, 62, 0);
            }
        }
        
        /* Floating Label Styles */
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
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
        
        /* Section Title */
        .section-title {
            position: relative;
            margin-bottom: 2rem;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }
        
        .section-title:after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            margin: 10px auto;
            border-radius: 2px;
        }
        
        /* Admin Login Button */
        .btn-light {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
        }
        
        .btn-light:hover {
            background-color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        /* Footer Styles */
        .main-footer {
            background-color: #2c3e50;
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: auto;
        }
        
        .footer-logo {
            height: 50px;
            margin-bottom: 1rem;
        }
        
        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 1.5rem;
        }
        
        .social-links a {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .header-content {
                justify-content: center;
                text-align: center;
            }
            
            .main-nav {
                margin-top: 1rem;
                justify-content: center;
                width: 100%;
            }
            
            .nav-link {
                margin: 0 0.75rem;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .school-name h1 {
                font-size: 1.3rem;
            }
            
            .nav-link {
                font-size: 0.9rem;
                margin: 0 0.5rem;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .payment-container {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 575.98px) {
            .logo {
                height: 50px;
            }
            
            .school-name h1 {
                font-size: 1.1rem;
            }
            
            .school-name p {
                font-size: 0.75rem;
            }
            
            .nav-link {
                font-size: 0.8rem;
                margin: 0 0.3rem;
            }
            
            .btn-light {
                padding: 8px 15px;
                font-size: 0.8rem;
            }
        }
        
        /* Animation Classes */
        .animate__animated {
            animation-duration: 1s;
        }
        
        /* Additional Utility Classes */
        .text-gradient {
            background: var(--header-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .bg-light-blue {
            background-color: #f0f5ff;
        }
        
        .rounded-lg {
            border-radius: 15px;
        }
        
        .shadow-soft {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>
<!-- Main Header -->
<header class="main-header animate__animated animate__fadeInDown">
    <div class="container">
        <div class="header-content">
            <a href="{{url('/')}}" class="logo-container">
                <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="logo">
                <div class="school-name">
                    <h1>J. R. Preparatory School</h1>
                    <p>Empowering Future Leaders</p>
                </div>
            </a>
            
            <nav class="main-nav">
                <a href="#features" class="nav-link animate__animated animate__fadeIn animate__delay-1s">
                    <i class="fas fa-star"></i> Why Choose Us
                </a>
                <a href="#payment" class="nav-link animate__animated animate__fadeIn animate__delay-1s">
                    <i class="fas fa-credit-card"></i> Pay Fees
                </a>
                <a href="{{ route('login') }}" class="btn btn-light ms-3 animate__animated animate__fadeIn animate__delay-1s">
                    <i class="fas fa-user-shield me-2"></i>Admin Login
                </a>
            </nav>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-section animate__animated animate__fadeIn">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title animate__animated animate__fadeInUp">School Fees Payment Portal</h1>
            <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">Secure, fast and convenient way to pay school fees online</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section bg-light-blue">
    <div class="container">
        <h2 class="section-title animate__animated animate__fadeIn">Why Pay Fees Online?</h2>
        
        <div class="row">
            <div class="col-md-4 animate__animated animate__fadeInUp">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Secure Payments</h3>
                    <p class="feature-text">All transactions are encrypted and processed through secure payment gateways to ensure your financial data is protected.</p>
                </div>
            </div>
            
            <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">Instant Processing</h3>
                    <p class="feature-text">Payments are processed instantly, saving you time and eliminating the need to visit the school for fee submission.</p>
                </div>
            </div>
            
            <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <h3 class="feature-title">Digital Receipts</h3>
                    <p class="feature-text">Receive payment confirmation and digital receipts immediately via email and SMS for your records.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Form Section -->
<section id="payment" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="payment-container animate__animated animate__fadeInUp">
                    <h2 class="section-title">Fee Payment Form</h2>
                    <p class="text-center mb-4">Fill in the details below to proceed with the fee payment</p>
                    
                    <form id="payment-form" method="POST" action="{{ route('upi.link') }}">
                        @csrf
                        <!-- Student Name -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder=" " required>
                                <label for="student_name">Student Name</label>
                            </div>
                            <span class="text-danger error" id="student_name_error"></span>
                        </div>

                        <!-- Email -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder=" " required>
                                <label for="email">Email Address</label>
                            </div>
                            <span class="text-danger error" id="email_error"></span>
                        </div>

                        <!-- Mobile -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder=" " required>
                                <label for="mobile">Mobile Number</label>
                            </div>
                            <span class="text-danger error" id="mobile_error"></span>
                        </div>

                        <!-- Class/Grade -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                                <select class="form-select" id="grade" name="class" required>
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
                                <label for="grade">Select Class</label>
                            </div>
                            <span class="text-danger error" id="grade_error"></span>
                        </div>

                        <!-- Fees -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                <input type="number" class="form-control" id="fees" name="fees" placeholder=" " readonly required>
                                <label for="fees">Fees Per Month</label>
                            </div>
                            <span class="text-danger error" id="fees_error"></span>
                        </div>

                        <!-- Number of Months -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                <select class="form-select" id="month" name="month" required>
                                    <option value="" selected disabled></option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="7">7 Months</option>
                                    <option value="8">8 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="10">10 Months</option>
                                    <option value="11">11 Months</option>
                                    <option value="12">12 Months</option>
                                </select>
                                <label for="month">Number of Months</label>
                            </div>
                            <span class="text-danger error" id="month_error"></span>
                        </div>

                        <!-- Total Amount Display -->
                        <div class="mb-4 text-center bg-light p-3 rounded">
                            <h4>Total Amount: <span id="total_amount" class="text-primary">₹0.00</span></h4>
                            <small class="text-muted">Inclusive of all applicable taxes</small>
                        </div>

                        <!-- Address -->
                        <div class="floating-label">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <textarea class="form-control" id="address" name="address" placeholder=" " required></textarea>
                                <label for="address">Address</label>
                            </div>
                            <span class="text-danger error" id="address_error"></span>
                        </div>

                        <!-- Hidden fields for payment -->
                        <input type="hidden" name="amount" id="amount" value="0">
                        <input type="hidden" name="note" id="note" value="">

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                <i class="fas fa-credit-card me-2"></i>Proceed to Pay
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title">What Parents Say</h2>
        
        <div class="row">
            <div class="col-md-4 mb-4 animate__animated animate__fadeIn">
                <div class="card h-100 shadow-soft border-0">
                    <div class="card-body">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="card-text">"The online fee payment system is so convenient. I can pay my child's fees from anywhere without any hassle."</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="50" alt="Parent">
                            <div>
                                <h6 class="mb-0">Mrs. Sharma</h6>
                                <small class="text-muted">Parent of Class 5 Student</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 animate__animated animate__fadeIn animate__delay-1s">
                <div class="card h-100 shadow-soft border-0">
                    <div class="card-body">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="card-text">"I appreciate the instant receipt feature. No more waiting in queues or worrying about lost receipts."</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-3" width="50" alt="Parent">
                            <div>
                                <h6 class="mb-0">Mr. Patel</h6>
                                <small class="text-muted">Parent of Class 8 Student</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4 animate__animated animate__fadeIn animate__delay-2s">
                <div class="card h-100 shadow-soft border-0">
                    <div class="card-body">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="card-text">"The system is very user-friendly and secure. I feel confident making payments through this portal."</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0">
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="50" alt="Parent">
                            <div>
                                <h6 class="mb-0">Mrs. Gupta</h6>
                                <small class="text-muted">Parent of Class 3 Student</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Floating Receipt Button -->
<button type="button" class="btn btn-warning receipt-btn animate__animated animate__bounceIn animate__delay-1s" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-receipt fa-lg"></i>
</button>

<!-- Receipt Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-receipt me-2"></i> J. R. Preparatory School Fees Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="mb-3 floating-label">
                        <input type="text" class="form-control" id="fetch_name" name="fetch_name" value="{{old('fetch_name')}}" placeholder=" " required>
                        <label for="fetch_name">Student Name</label>
                        <span class="error_fetch" id="fetch_name_error"></span>  
                    </div>
                    <div class="mb-3 floating-label">
                        <input type="email" class="form-control" id="fetch_email" name="fetch_email" value="{{old('fetch_email')}}" placeholder=" " required>
                        <label for="fetch_email">Email Address</label>
                        <span class="error_fetch" id="fetch_email_error"></span>  
                    </div>
                    <div class="mb-3 floating-label">
                        <input type="number" class="form-control" id="fetch_mobile" name="fetch_mobile" value="{{old('fetch_mobile')}}" placeholder=" " required>
                        <label for="fetch_mobile">Mobile Number</label>
                        <span class="error_fetch" id="fetch_mobile_error"></span>  
                    </div>
                    <div class="alert alert-warning mt-4">
                        <i class="fas fa-exclamation-circle me-2"></i> Make sure the Payment is Completed
                    </div>
                    <hr>
                    <button type="button" id="fetchbutton" class="btn btn-warning w-100 py-2">
                        <i class="fas fa-download me-2"></i> Get Receipt
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Main Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="footer-logo">
                <p>J. R. Preparatory School is committed to providing quality education and holistic development for every student.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6 mb-4">
                <h3 class="footer-title">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#payment">Pay Fees</a></li>
                    <li><a href="{{ route('login') }}">Admin Login</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h3 class="footer-title">Contact Info</h3>
                <ul class="footer-links">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Moh. Ganeshganj, Puranpur, 262122</li>
                    <li><i class="fas fa-phone me-2"></i> +91 8393955600</li>
                    <li><i class="fas fa-envelope me-2"></i> jrpschool@gmail.com</li>
                    <li><i class="fas fa-clock me-2"></i> Mon-Fri: 8:00 AM - 4:00 PM</li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h3 class="footer-title">Newsletter</h3>
                <p>Subscribe to our newsletter for school updates and announcements.</p>
                <form class="mt-3">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="mb-0">&copy; 2023 J. R. Preparatory School. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script> 
<script src="{{url('js/jquery-3.7.1.min.js')}}" type="text/javascript"></script>
<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Form submission for payment
    $(document).ready(function() {
        // Function to calculate total and update hidden fields
        function updatePaymentDetails() {
            const fees = parseFloat($('#fees').val()) || 0;
            const months = parseInt($('#month').val()) || 0;
            const total = fees * months;
            const studentName = $('#student_name').val();
            const grade = $('#grade').val();
            
            $('#total_amount').text('₹' + total.toFixed(2));
            $('#amount').val(total);
            $('#note').val(`Fee payment for ${studentName} (Class ${grade})`);
        }

        // When class is selected
        $('#grade').change(function() {
            const selectedClass = $(this).val();
            if (selectedClass) {
                getClassFees(selectedClass);
            } else {
                $('#fees').val('');
                $('#total_amount').text('₹0.00');
            }
        });

        // When months are changed
        $('#month').change(function() {
            updatePaymentDetails();
        });

        // When student name changes
        $('#student_name').on('input', function() {
            updatePaymentDetails();
        });

        // Form validation before submission
        $('#payment-form').on('submit', function(e) {
            var hasError = false;
            $('.error').text('');
            $('.form-control').removeClass('is-invalid');

            if (!$('#student_name').val()) { 
                $('#student_name_error').text('Student name is required');
                $('#student_name').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#email').val()) { 
                $('#email_error').text('Email is required');
                $('#email').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#mobile').val()) { 
                $('#mobile_error').text('Mobile number is required');
                $('#mobile').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#grade').val()) { 
                $('#grade_error').text('Class is required');
                $('#grade').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#fees').val()) { 
                $('#fees_error').text('Fees amount is required');
                $('#fees').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#month').val()) { 
                $('#month_error').text('Number of months is required');
                $('#month').addClass('is-invalid');
                hasError = true; 
            }
            if (!$('#address').val()) { 
                $('#address_error').text('Address is required');
                $('#address').addClass('is-invalid');
                hasError = true; 
            }

            if (hasError) {
                e.preventDefault();
                return false;
            }
        });

        // Remove error class when user types in a field
        $('.form-control').on('input', function() {
            $(this).removeClass('is-invalid');
            $(this).next('.error').text('');
        });
    });

    // Function to handle Razorpay payment
    function paynow(amount, razororderid, name, email, contact) {
        var options = {
            "key": "{{env('RAZORPAY_KEY_ID')}}",
            "amount": amount,
            "currency": "INR",
            "name": "J. R. Preparatory School",
            "description": "School Fees Payment",
            "image": "https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/razorpay-icon.png",
            "order_id": razororderid,
            "callback_url": "{{route('paymentstore')}}",
            "prefill": { 
                "name": name,
                "email": email,
                "contact": contact
            },
            "notes": {
                "address": "J. R. Preparatory School"
            },
            "theme": {
                "color": "#4e73df"
            },
            "modal": {
                "ondismiss": function(){
                    swal("Payment Cancelled", "You have cancelled the payment process.", "info");
                }
            }
        };
        
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }

    // Fetch receipt functionality
    $(document).ready(function(){
        $('#fetchbutton').click(function(e) {      
            e.preventDefault(); 
            var fetch_name = $('#fetch_name').val();
            var fetch_email = $('#fetch_email').val();
            var fetch_mobile = $('#fetch_mobile').val();
            
            // Add loading animation
            $(this).html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Fetching...');
            
            $.ajax({
                url: "{{route('receipt')}}",
                type: 'POST',
                data: {
                    fetch_name: fetch_name,
                    fetch_email: fetch_email,
                    fetch_mobile: fetch_mobile
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Reset button text
                    $('#fetchbutton').html('<i class="fas fa-download me-2"></i> Get Receipt');
                    
                    if(response.error) {
                        if(response.error === 'validateerror') {
                            $('.error_fetch').text('');
                            var error = response.message;
                            $.each(error, function(key, value) {
                                $('#'+key+'_error').text(value[0]);
                                // Add shake animation to error fields
                                $('#'+key).addClass('animate__animated animate__shakeX');
                                setTimeout(function() {
                                    $('#'+key).removeClass('animate__animated animate__shakeX');
                                }, 1000);
                            });
                        } else if(response.error === 'recorderror') {
                            swal("Not Found", response.message, "error");
                        }
                    } else {
                        var receipt = response.receipt_no;
                        var studentname = response.student_name;
                        var email = response.email;
                        var mobile = response.mobile;
                        var fees = response.fees;
                        var month = response.month;
                        var totalfees = response.total_fees_paid;
                        var address = response.address;
                        var classes = response.class;
                        var paymentstatus = response.payment_status;
                        var paytime = response.updated_at;

                        // Create the URL with parameters
                        var url = "/receipt_download?receipt=" + encodeURIComponent(receipt) +
                                  "&studentname=" + encodeURIComponent(studentname) +
                                  "&email=" + encodeURIComponent(email) +
                                  "&mobile=" + encodeURIComponent(mobile) +
                                  "&fees=" + encodeURIComponent(fees) +
                                  "&month=" + encodeURIComponent(month) +
                                  "&totalfees=" + encodeURIComponent(totalfees) +
                                  "&address=" + encodeURIComponent(address) +
                                  "&classes=" + encodeURIComponent(classes) +
                                  "&paymentstatus=" + encodeURIComponent(paymentstatus) +
                                  "&paytime=" + encodeURIComponent(paytime);

                        // Redirect to the receipt_download route
                        window.location.href = url;
                    }
                },
                error: function() {
                    $('#fetchbutton').html('<i class="fas fa-download me-2"></i> Get Receipt');
                    swal("Error", "An error occurred while fetching your receipt. Please try again.", "error");
                }
            });
        });
    });

    // Show success/error messages from server
    @if(Session::has('success'))
        swal({
            title: "Success",
            text: "{!!Session::get('success')!!}",
            icon: "success",
            button: "OK",
        });
    @endif
    
    @if(Session::has('error'))
        swal({
            title: "Error",
            text: "{!!Session::get('error')!!}",
            icon: "error",
            button: "OK",
        });
    @endif

    // Function to fetch class fees
    function getClassFees(selectedClass) {
        $.ajax({
            url: "{{ route('public.getClassFees') }}",
            type: 'GET',
            success: function(response) {
                console.log(response, selectedClass); // Debug line
                const classFee = response.data.find(fee => fee.class == parseInt(selectedClass));
                if (classFee) {
                    $('#fees').val(classFee.fees_per_month);
                    $('#fees').prop('readonly', true);
                    calculateTotal();
                } else {
                    $('#fees').val('');
                    $('#fees').prop('readonly', true);
                    swal("No Fees Set", "Fees not set for this class. Please contact administrator.", "warning");
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                swal("Error", "Error fetching class fees. Please try again later.", "error");
            }
        });
    }

    // Function to calculate total fees
    function calculateTotal() {
        const fees = parseFloat($('#fees').val()) || 0;
        const months = parseInt($('#month').val()) || 0;
        const total = fees * months;
        $('#total_amount').text('₹' + total.toFixed(2));
    }
</script>
</body>
</html>