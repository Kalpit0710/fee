payment\receipt.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt - J. R. Preparatory School</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo-color.png')}}">
    <link rel="stylesheet" type="text/css" href="{{url('Bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
        }
        
        .receipt-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 800px;
        }
        
        .receipt-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo {
            height: 70px;
            margin-right: 15px;
        }
        
        .school-name h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .school-name p {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 0;
        }
        
        .receipt-number {
            font-size: 1rem;
            font-weight: 600;
            color: #4e73df;
        }
        
        .receipt-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .detail-item {
            margin-bottom: 15px;
        }
        
        .detail-label {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 5px;
        }
        
        .detail-value {
            font-weight: 500;
        }
        
        .payment-info {
            background-color: #f8f9fc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .payment-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        
        .payment-label {
            font-weight: 500;
        }
        
        .payment-value {
            font-weight: 600;
        }
        
        .total-row {
            border-top: 2px dashed #e0e0e0;
            margin-top: 12px;
            padding-top: 12px;
            font-size: 1.1rem;
            color: #4e73df;
        }
        
        .paid-stamp {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            color: rgba(28, 200, 138, 0.25);
            font-size: 72px;
            font-weight: 700;
            letter-spacing: 5px;
            pointer-events: none;
            z-index: 1;
        }
        
        .receipt-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        .print-button {
            margin-top: 30px;
            text-align: center;
        }
        
        @media print {
            .print-button {
                display: none;
            }
            
            body {
                background-color: white;
            }
            
            .receipt-container {
                box-shadow: none;
                margin: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-container position-relative">
            <div class="paid-stamp">PAID</div>
            
            <div class="receipt-header">
                <div class="logo-container">
                    <img src="{{url('logo/logo-color.png')}}" alt="J. R. Preparatory School Logo" class="logo">
                    <div class="school-name">
                        <h2>J. R. Preparatory School</h2>
                        <p>Moh. Ganeshganj, Puranpur</p>
                    </div>
                </div>
                <div class="receipt-number">
                    Receipt #: {{ substr($payment->payment_id, -8) }}
                </div>
            </div>
            
            <div class="receipt-details">
                <div class="detail-column">
                    <div class="detail-item">
                        <div class="detail-label">Student Name</div>
                        <div class="detail-value">{{ $payment->student_name }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">{{ $payment->email }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Mobile</div>
                        <div class="detail-value">{{ $payment->mobile }}</div>
                    </div>
                </div>
                
                <div class="detail-column">
                    <div class="detail-item">
                        <div class="detail-label">Payment Date</div>
                        <div class="detail-value">{{ date('d M Y, h:i A', strtotime($payment->payment_date)) }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Payment Status</div>
                        <div class="detail-value text-success">{{ $payment->payment_status }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Class</div>
                        <div class="detail-value">Class {{ $payment->class }}</div>
                    </div>
                </div>
            </div>
            
            <div class="payment-info">
                <div class="payment-row">
                    <div class="payment-label">Fees Per Month</div>
                    <div class="payment-value">₹{{ number_format($payment->fees_per_month, 2) }}</div>
                </div>
                
                <div class="payment-row">
                    <div class="payment-label">Number of Months</div>
                    <div class="payment-value">{{ $payment->months_paid }}</div>
                </div>
                
                <div class="payment-row total-row">
                    <div class="payment-label">Total Amount Paid</div>
                    <div class="payment-value">₹{{ number_format($payment->total_fees_paid, 2) }}</div>
                </div>
            </div>
            
            <div class="additional-info">
                <p><strong>Transaction ID:</strong> {{ $payment->payment_id }}</p>
                <p><strong>Billing Address:</strong> {{ $payment->address }}</p>
            </div>
            
            <div class="receipt-footer">
                <p>This is a computer generated receipt and does not require a physical signature.</p>
                <p>For any queries regarding this payment, please contact the school administration.</p>
                <p>Thank you for your payment!</p>
            </div>
            
            <div class="print-button">
                <button class="btn btn-primary" onclick="window.print();">
                    <i class="fas fa-print me-2"></i> Print Receipt
                </button>
                <a href="{{ url('/') }}" class="btn btn-secondary ms-2">
                    <i class="fas fa-home me-2"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>