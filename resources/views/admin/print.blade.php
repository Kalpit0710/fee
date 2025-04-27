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
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #f6c23e;
            --dark-color: #5a5c69;
            --light-color: #f8f9fc;
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header-container {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            color: white;
        }
        
        .logo {
            height: 80px;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .receipt-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }
        
        .receipt-container:hover {
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
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
        
        .table {
            border-radius: 15px;
            overflow: hidden;
        }
        
        .table thead {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
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
        
        .footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
            color: white;
            padding: 1rem 0;
            margin-top: 2rem;
            border-radius: 20px 20px 0 0;
        }
    </style>
</head>
<body>
<!-- Header Section -->
<div class="header-container animate__animated animate__fadeInDown">
    <div class="container text-center">
        <a href="{{route('dashboard')}}" class="d-inline-block animate__animated animate__zoomIn">
            <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="logo mb-3">
        </a>
        <h1 class="text-white mb-0 animate__animated animate__fadeIn">J. R. Preparatory School Fees Admin Receipt</h1>
        <p class="text-white-50 mb-0 animate__animated animate__fadeIn animate__delay-1s">Official Fee Payment Receipt</p>
    </div>
</div>

<!-- Receipt Content -->
<div class="container">
    <div class="receipt-container animate__animated animate__fadeInUp">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Payment Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Receipt Number</td>
                            <td>{{$data->receipt_no}}</td>
                        </tr>
                        <tr>
                            <td>Student Name</td>
                            <td>{{$data->student_name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td>{{$data->mobile}}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>Class {{$data->class}}</td>
                        </tr>
                        <tr>
                            <td>Fees Per Month</td>
                            <td>Rs {{$data->fees}}</td>
                        </tr>
                        <tr>
                            <td>Total Month Fees</td>
                            <td>{{$data->month}} Months</td>
                        </tr>
                        <tr>
                            <td>Total Fees Paid</td>
                            <td>Rs {{$data->total_fees_paid}}</td>
                        </tr>
                        <tr>
                            <td>Payment Status</td>
                            <td>{{$data->payment_status}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$data->address}}</td>
                        </tr>
                        <tr>
                            <td>Payment successful Time</td>
                            <td>{{$data->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="text-center mt-4">
                    <button id="print" class="btn btn-success me-2">
                        <i class="fas fa-download me-2"></i> Download Receipt
                    </button>
                    <a href="{{route('dashboard')}}" class="btn btn-success">
                        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer animate__animated animate__fadeInUp animate__delay-1s">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <strong><p class="mb-0">&copy; {{ date('Y') }} J. R. Preparatory School. All rights reserved.</p></strong>
            </div>
        </div>
    </div>
</footer>

<script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    document.getElementById("print").addEventListener("click", function() {
        // Hide the buttons after printing is triggered
        this.style.display = 'none';
        document.querySelector('.btn-success[href="{{route('dashboard')}}"]').style.display = 'none';
        
        // Simulate Ctrl+P (Print) keyboard shortcut
        window.print();
        
        // Show the buttons after printing
        this.style.display = 'inline-block';
        document.querySelector('.btn-success[href="{{route('dashboard')}}"]').style.display = 'inline-block';
    });
</script>
</body>
</html>