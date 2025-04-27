<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J. R. Preparatory School Fees Receipt</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo-color.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        }
        
        /* Header Styles */
        .header-container {
            background: var(--header-gradient);
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .header-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            opacity: 0.1;
            z-index: 0;
        }
        
        .logo {
            height: 80px;
            transition: all 0.3s ease;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        /* Receipt Container */
        .receipt-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .receipt-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--header-gradient);
        }
        
        .receipt-container:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }
        
        /* Receipt Header */
        .receipt-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px dashed #e9ecef;
            position: relative;
        }
        
        .receipt-header::after {
            content: 'PAID';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-15deg);
            font-size: 5rem;
            font-weight: 800;
            color: rgba(28, 200, 138, 0.1);
            z-index: 0;
            pointer-events: none;
        }
        
        .receipt-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            color: var(--primary-color);
            position: relative;
            z-index: 1;
        }
        
        .receipt-subtitle {
            color: #6c757d;
            position: relative;
            z-index: 1;
        }
        
        /* Table Styles */
        .table {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }
        
        .table thead {
            background: var(--header-gradient);
            color: white;
        }
        
        .table th {
            border: none;
            padding: 1rem;
            font-weight: 600;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }
        
        .table tr:last-child td {
            border-bottom: none;
        }
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(248, 249, 252, 0.5);
        }
        
        /* Highlight Important Rows */
        .highlight-row {
            background-color: rgba(246, 194, 62, 0.1) !important;
            font-weight: 600;
        }
        
        /* Button Styles */
        .btn-success {
            background-color: var(--secondary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(28, 200, 138, 0.3);
        }
        
        .btn-success:hover {
            background-color: #17a673;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(28, 200, 138, 0.4);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }
        
        .btn-primary:hover {
            background-color: #3d63d6;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 115, 223, 0.4);
        }
        
        /* Footer Styles */
        .footer {
            background: var(--header-gradient);
            color: white;
            padding: 1.5rem 0;
            margin-top: 3rem;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .footer p {
            margin-bottom: 0;
        }
        
        /* Watermark */
        .watermark {
            position: fixed;
            bottom: 20px;
            right: 20px;
            opacity: 0.1;
            z-index: -1;
            font-size: 10rem;
            font-weight: 800;
            color: var(--primary-color);
            transform: rotate(-15deg);
        }
        
        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }
            
            .header-container, .footer {
                border-radius: 0;
                box-shadow: none;
            }
            
            .receipt-container {
                box-shadow: none;
                border: none;
                padding: 0;
            }
            
            .no-print {
                display: none !important;
            }
            
            .watermark {
                display: none;
            }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 767.98px) {
            .logo {
                height: 60px;
            }
            
            .receipt-container {
                padding: 1.5rem;
            }
            
            .table td, .table th {
                padding: 0.75rem;
            }
            
            .btn-success, .btn-primary {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<!-- Header Section -->
<div class="header-container animate__animated animate__fadeInDown">
    <div class="container text-center">
        <a href="{{url('/')}}" class="d-inline-block animate__animated animate__zoomIn">
            <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="logo mb-3">
        </a>
        <h1 class="text-white mb-1 animate__animated animate__fadeIn">J. R. Preparatory School</h1>
        <p class="text-white-50 mb-0 animate__animated animate__fadeIn animate__delay-1s">Official Fee Payment Receipt</p>
    </div>
</div>

<!-- Receipt Content -->
<div class="container">
    <div class="receipt-container animate__animated animate__fadeInUp">
        <div class="receipt-header">
            <h2 class="receipt-title">FEE PAYMENT RECEIPT</h2>
            <p class="receipt-subtitle">Transaction #{{$receipt}}</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">Payment Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="40%"><strong>Receipt Number</strong></td>
                                <td>{{$receipt}}</td>
                            </tr>
                            <tr>
                                <td><strong>Student Name</strong></td>
                                <td>{{$studentname}}</td>
                            </tr>
                            <tr>
                                <td><strong>Email Address</strong></td>
                                <td>{{$email}}</td>
                            </tr>
                            <tr>
                                <td><strong>Contact Number</strong></td>
                                <td>{{$mobile}}</td>
                            </tr>
                            <tr>
                                <td><strong>Class/Grade</strong></td>
                                <td>{{$classes}}</td>
                            </tr>
                            <tr>
                                <td><strong>Fees Per Month</strong></td>
                                <td>₹{{$fees}}</td>
                            </tr>
                            <tr>
                                <td><strong>Number of Months Paid</strong></td>
                                <td>{{$month}} Months</td>
                            </tr>
                            <tr class="highlight-row">
                                <td><strong>Total Fees Paid</strong></td>
                                <td><strong>₹{{$totalfees}}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Payment Status</strong></td>
                                <td><span class="badge bg-success">{{$paymentstatus}}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Student Address</strong></td>
                                <td>{{$address}}</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Date & Time</strong></td>
                                <td>{{$paytime}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="alert alert-success mt-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-3 fa-2x"></i>
                        <div>
                            <h5 class="mb-1">Payment Successful</h5>
                            <p class="mb-0">Thank you for your payment. A confirmation has been sent to your email address.</p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4 no-print">
                    <button id="print" class="btn btn-success me-3">
                        <i class="fas fa-print me-2"></i> Print Receipt
                    </button>
                    <a href="/" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Watermark -->
<div class="watermark no-print">PAID</div>

<!-- Footer -->
<footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-2 mb-md-0"><i class="fas fa-map-marker-alt me-2"></i> Moh. Ganeshganj, Puranpur</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0"><i class="fas fa-phone me-2"></i> +91 8363655600 | <i class="fas fa-envelope me-2"></i> jrpschool2008@gmail.com</p>
            </div>
            <div class="col-12 text-center mt-2">
                <p class="mb-0"><strong>&copy; {{ date('Y') }} J. R. Preparatory School. All rights reserved.</strong></p>
            </div>
        </div>
    </div>
</footer>

<script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    document.getElementById("print").addEventListener("click", function() {
        window.print();
    });
    
    // Add animation to the success badge
    document.querySelector('.badge').classList.add('animate__animated', 'animate__pulse');
</script>
</body>
</html>