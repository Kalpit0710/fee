<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Payment - J. R. Preparatory School</title>
    
    <!-- Bootstrap CSS -->
    <link href="{{url('Bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom styles -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        
        .payment-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }
        
        .qr-container {
            text-align: center;
            padding: 20px;
            border: 1px dashed #dee2e6;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
        
        .payment-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .upi-button {
            display: block;
            padding: 15px 20px;
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            margin: 20px auto;
            text-align: center;
            transition: all 0.3s ease;
            width: 80%;
        }
        
        .upi-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .payment-info {
            background-color: #f1f8ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .or-divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }
        
        .or-divider:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #dee2e6;
        }
        
        .or-divider span {
            position: relative;
            background-color: #fff;
            padding: 0 15px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#payment">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Payment Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="payment-container animate__animated animate__fadeInUp">
                        <div class="payment-header">
                            <h2 class="text-primary">Complete Your Payment</h2>
                            <p class="text-muted">Pay school fees securely via UPI</p>
                        </div>
                        
                        <div class="payment-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Amount:</strong> <span class="text-success">₹{{ $amount }}</span></p>
                                    <p><strong>Purpose:</strong> {{ urldecode(explode('&tn=', $upiLink)[1] ?? 'Fee Payment') }}</p>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <p><strong>Date:</strong> {{ date('d M, Y') }}</p>
                                    <p><strong>Reference:</strong> #{{ substr(md5(time()), 0, 8) }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ $upiLink }}" class="upi-button animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-mobile-alt me-2"></i> Pay ₹{{ $amount }} via UPI App
                        </a>
                        
                        <div class="or-divider">
                            <span>OR</span>
                        </div>
                        
                        <div class="qr-container">
                            <h5 class="mb-3">Scan QR Code to Pay</h5>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ urlencode($upiLink) }}&size=200x200" 
                                 alt="UPI QR Code" class="img-fluid mb-3" style="max-width: 200px;">
                            <p class="text-muted small">Open any UPI app (Google Pay, PhonePe, Paytm, etc.) and scan this QR code</p>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i> Back to Home
                            </a>
                            <button class="btn btn-info ms-2" onclick="window.location.reload()">
                                <i class="fas fa-sync me-2"></i> Refresh
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2023 J. R. Preparatory School. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{url('Bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script> 
    <script src="{{url('js/jquery-3.7.1.min.js')}}" type="text/javascript"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const upiForm = document.getElementById('upi-payment-form');
        
        if (upiForm) {
            upiForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Collect form data
                const formData = {
                    student_name: document.getElementById('student_name').value,
                    email: document.getElementById('email').value,
                    mobile: document.getElementById('mobile').value,
                    class: document.getElementById('class').value,
                    month: document.getElementById('month').value,
                    fees: document.getElementById('fees').value,
                    total_fees_paid: document.getElementById('total_fees_paid').value,
                    payment_id: document.getElementById('payment_id').value,
                    upi_id: document.getElementById('upi_id').value,
                    _token: document.querySelector('meta[name="csrf-token"]').content
                };

                // Send data to server
                fetch('/upi-payment-callback', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': formData._token
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Payment details have been submitted. Please wait for admin approval.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/payment-status/' + data.payment_id;
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while processing your payment. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    console.error('Error:', error);
                });
            });
        }
    });
    </script>
</body>
</html>
