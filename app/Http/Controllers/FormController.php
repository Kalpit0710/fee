<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\ClassFees;
use Faker\Provider\ar_EG\Payment as Ar_EGPayment;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    function order(REQUEST $request){
        // First get the class fees
        $classFees = ClassFees::where('class', $request->grade)->first();
        
        if (!$classFees) {
            return response()->json([
                'status' => 'error',
                'errors' => ['fees' => ['Fees not set for this class. Please contact administrator.']]
            ]);
        }

        // Add validation for fees matching
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
            'grade' => 'required|integer|between:1,12',
            'fees' => "required|numeric|in:{$classFees->fees_per_month}",
            'month' => 'required|integer|between:1,12',
            'address' => 'required|string',
        ], [
            'fees.in' => 'The fees amount does not match the set amount for this class.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ]);
        }
    
        // Initially store the form record then the rest record store when it completed
        $a = new Payment;
        $receipt = 'Fees_' . mt_rand(10000, 99999);
        $a->receipt_no = $receipt;
        $a->student_name = $request->student_name;
        $a->email = $request->email;
        $a->mobile = $request->mobile;
        $a->class = $request->grade;
        $a->fees = $request->fees;
        $a->total_fees_paid = $request->fees * $request->month;
        $a->month = $request->month;
        $a->address = $request->address;
        $a->save();
                  
        $amount = $request->fees * 100;
        $total_fees_month = $amount * $request->month;
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
        
        // Create Order id
        $razororder = $api->order->create([
            'receipt' => $receipt,
            'amount' => $total_fees_month,
            'currency' => 'INR'
        ]);
        
        $order_id = $razororder->id;
        $currency = $razororder->currency;
        
        // Store order_id in db after creating
        $upd = Payment::find($a->id);
        $upd->order_id = $order_id;
        $upd->currency = $currency;
        $upd->update();

        return response()->json([
            "status" => "success",
            "order_id" => $order_id,
            "amount" => $amount,
            "student_name" => $request->student_name,
            "email" => $request->email,
            "mobile" => $request->mobile
        ]);
    }

    function paymentstore(REQUEST $request){
        //dd($request->all());
      $orderid = $request->razorpay_order_id;
      $paymentid = $request->razorpay_payment_id;
      $a = Payment::where('order_id',$orderid)->first();
      if($a){
        $a->payment_status="Successful";
        $a->payment_id = $paymentid;
        $a->update();

        return redirect('/')->with('success','Payment Sucessfully Completed');
      }else{
        return redirect('/')->with('error','Payment Failed');
      }


    }


}


