<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Generate UPI payment link
     */
    public function generateLink(Request $request)
    {
        // Check if this is a direct GET request
        if ($request->isMethod('get')) {
            return redirect('/')->with('error', 'Direct access to this endpoint is not allowed. Please submit the payment form.');
        }

        try {
            // Validate and collect all necessary fields
            $validated = $request->validate([
                'student_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'mobile' => 'required|numeric|digits:10',
                'class' => 'required|integer|min:1|max:12',
                'fees' => 'required|numeric|min:0',
                'month' => 'required|integer|min:1|max:12',
                'address' => 'required|string|max:500',
                'amount' => 'required|numeric|min:0',
                'note' => 'required|string|max:255'
            ]);

            // Create a new payment record
            $payment = Payment::create([
                'student_name' => $validated['student_name'],
                'email' => $validated['email'],
                'mobile' => $validated['mobile'],
                'class' => $validated['class'],
                'fees' => $validated['fees'],
                'month' => $validated['month'],
                'address' => $validated['address'],
                'total_fees_paid' => $validated['amount'],
                'receipt_no' => 'Fees_' . mt_rand(10000, 99999),
                'payment_status' => 'Pending',
            ]);

            $upiId = 'kalpit677@okaxis';
            $payeeName = 'Kalpit';
            $amount = $validated['amount'];
            $note = urlencode($validated['note']);

            $upiLink = "upi://pay?pa={$upiId}&pn={$payeeName}&am={$amount}&cu=INR&tn={$note}";

            // Return the payment view with necessary data
            return view('payment', [
                'upiLink' => $upiLink,
                'amount' => $amount,
                'payment' => $payment,
                'student_name' => $validated['student_name'],
                'email' => $validated['email'],
                'mobile' => $validated['mobile'],
                'class' => $validated['class'],
                'month' => $validated['month']
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error generating payment link: ' . $e->getMessage());
        }
    }
}