<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'receipt_no' => 'REC' . Str::random(8),
                'student_name' => 'John Doe',
                'email' => 'john@example.com',
                'mobile' => '9876543210',
                'class' => 5,
                'fees' => 2800,
                'month' => 1,
                'total_fees_paid' => 2800,
                'currency' => 'INR',
                'payment_status' => 'paid',
                'address' => '123 Main St, City',
                'payment_method' => 'UPI'
            ],
            [
                'receipt_no' => 'REC' . Str::random(8),
                'student_name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'mobile' => '9876543211',
                'class' => 8,
                'fees' => 3400,
                'month' => 2,
                'total_fees_paid' => 6800,
                'currency' => 'INR',
                'payment_status' => 'pending',
                'address' => '456 Oak St, Town',
                'payment_method' => 'UPI'
            ],
            [
                'receipt_no' => 'REC' . Str::random(8),
                'student_name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'mobile' => '9876543212',
                'class' => 10,
                'fees' => 3800,
                'month' => 3,
                'total_fees_paid' => 11400,
                'currency' => 'INR',
                'payment_status' => 'paid',
                'address' => '789 Pine St, Village',
                'payment_method' => 'UPI'
            ]
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
