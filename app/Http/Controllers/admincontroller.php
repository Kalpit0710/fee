<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\ClassFees;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['signin', 'signinreq']);
    }

    public function signin()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }
        return view('admin.signin');
    }

    public function signinreq(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if (Auth::user()->isAdmin()) {
                return response()->json([
                    'redirect' => route('dashboard')
                ]);
            }
            
            Auth::logout();
            return response()->json([
                'error' => 'You do not have admin access.'
            ], 403);
        }

        return response()->json([
            'error' => 'The provided credentials do not match our records.'
        ], 401);
    }

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

    public function dashboard()
    {
        try {
            $classFees = ClassFees::orderBy('class', 'asc')->get();
            $transactions = Payment::orderBy('created_at', 'desc')->get();
            
            \Log::info('Class Fees Count: ' . $classFees->count());
            \Log::info('Transactions Count: ' . $transactions->count());
            
            return view('admin.dashboard', [
                'classFees' => $classFees,
                'transactions' => $transactions,
                'totalTransactions' => $transactions->count(),
                'totalAmount' => $transactions->sum('total_fees_paid'),
                'paidTransactions' => $transactions->where('payment_status', 'paid')->count(),
                'pendingTransactions' => $transactions->where('payment_status', 'pending')->count()
            ]);
        } catch (\Exception $e) {
            \Log::error('Dashboard Error: ' . $e->getMessage());
            return view('admin.dashboard', [
                'classFees' => collect(),
                'transactions' => collect(),
                'totalTransactions' => 0,
                'totalAmount' => 0,
                'paidTransactions' => 0,
                'pendingTransactions' => 0
            ]);
        }
    }

    public function allrecord()
    {
        try {
            $transactions = \App\Models\Payment::orderBy('created_at', 'desc')->get();
            return response()->json([
                'success' => true,
                'data' => $transactions
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching all records: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching records',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function specificrecord(Request $request)
    {
        try {
            $date = $request->selectdate;
            $class = $request->selectclass;

            $query = Payment::query();

            if ($date && $class) {
                $query->whereDate('created_at', $date)->where('class', $class);
            } elseif ($date) {
                $query->whereDate('created_at', $date);
            } elseif ($class) {
                $query->where('class', $class);
            }

            $filteredData = $query->orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'data' => $filteredData
            ]);
        } catch (\Exception $e) {
            \Log::error('Error filtering transactions: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error filtering transactions',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        $delete = Payment::find($id);
        if ($delete) {
            $delete->delete();
            return response()->json(['message' => 'Item deleted successfully']);
        } else {
            return response()->json(['message' => 'Item not found']);
        }
    }

    public function print($id)
    {
        $dis = Payment::find($id);
        if (!$dis) {
            return redirect()->back()->with('error', 'Record not found.');
        }
        return view('admin.print', ['data' => $dis]);
    }

    public function refund($id)
    {
        try {
            $record = Payment::findOrFail($id);
            $paymentId = $record->payment_id;
            $amount = $record->total_fees_paid;

            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            $payment = $api->payment->fetch($paymentId);

            if ($payment->status == 'refunded') {
                return response()->json(['refund' => 'This payment has already been refunded.']);
            }

            $refund = $api->payment->fetch($paymentId)->refund([
                'amount' => $amount * 100,
                'speed' => 'normal',
                'notes' => [
                    'reason' => 'Refund for order cancellation',
                ],
            ]);

            if ($refund) {
                $record->payment_status = "Refunded";
                $record->save();

                return response()->json(['refund' => 'Refund successful']);
            } else {
                return response()->json(['refund' => 'Refund failed']);
            }
        } catch (\Exception $e) {
            \Log::error('Refund Error: ' . $e->getMessage());
            return response()->json(['refund' => 'An error occurred during the refund process.'], 500);
        }
    }

    public function updateClassFees(Request $request)
    {
        try {
            $validated = $request->validate([
                'class' => 'required|integer|min:1|max:12',
                'fees_per_month' => 'required|numeric|min:0',
            ]);

            $classFee = ClassFees::updateOrCreate(
                ['class' => $request->class],
                ['fees_per_month' => $request->fees_per_month]
            );

            return response()->json([
                'success' => true,
                'message' => 'Class fees updated successfully',
                'data' => $classFee,
            ]);
        } catch (\Exception $e) {
            \Log::error('Class Fees Update Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating class fees: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getClassFees()
    {
        try {
            $classFees = ClassFees::orderBy('class', 'asc')->get();
            return response()->json($classFees);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching class fees: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function downloadTransactions()
    {
        try {
            $transactions = DB::table('payments')
                ->select(
                    'id',
                    'receipt_no',
                    'student_name',
                    'email',
                    'mobile',
                    'class',
                    'fees',
                    'month',
                    'total_fees_paid',
                    'payment_status',
                    'payment_id',
                    'created_at',
                    'updated_at'
                )
                ->orderBy('created_at', 'desc')
                ->get();

            if ($transactions->isEmpty()) {
                return redirect()->back()->with('error', 'No transactions found to download.');
            }

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="transactions_' . date('Y-m-d') . '.csv"',
            ];

            $callback = function () use ($transactions) {
                $file = fopen('php://output', 'w');
                fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
                fputcsv($file, [
                    'Receipt No',
                    'Student Name',
                    'Email',
                    'Mobile',
                    'Class',
                    'Fees Per Month',
                    'Number of Months',
                    'Total Fees Paid',
                    'Payment Status',
                    'Payment ID',
                    'Created At',
                    'Updated At',
                ]);

                foreach ($transactions as $transaction) {
                    fputcsv($file, [
                        $transaction->receipt_no,
                        $transaction->student_name,
                        $transaction->email,
                        $transaction->mobile,
                        $transaction->class,
                        $transaction->fees,
                        $transaction->month,
                        $transaction->total_fees_paid,
                        $transaction->payment_status,
                        $transaction->payment_id,
                        $transaction->created_at,
                        $transaction->updated_at,
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            \Log::error('Error downloading transactions: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error downloading transactions: ' . $e->getMessage());
        }
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->payment_status = $request->status;
            $payment->save();

            if ($request->status === 'Paid') {
                // Generate receipt
                return response()->json([
                    'success' => true,
                    'message' => 'Payment status updated successfully',
                    'receipt_url' => route('admin.print', $id)
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating payment status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function handleUpiPayment(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'student_name' => 'required|string',
                'email' => 'required|email',
                'mobile' => 'required|string',
                'class' => 'required|string',
                'month' => 'required|string',
                'fees' => 'required|numeric',
                'total_fees_paid' => 'required|numeric',
                'payment_id' => 'required|string',
                'upi_id' => 'required|string'
            ]);

            // Create a new payment record
            $payment = new Payment();
            $payment->student_name = $validatedData['student_name'];
            $payment->email = $validatedData['email'];
            $payment->mobile = $validatedData['mobile'];
            $payment->class = $validatedData['class'];
            $payment->month = $validatedData['month'];
            $payment->fees = $validatedData['fees'];
            $payment->total_fees_paid = $validatedData['total_fees_paid'];
            $payment->payment_id = $validatedData['payment_id'];
            $payment->upi_id = $validatedData['upi_id'];
            $payment->payment_status = 'Pending'; // Using correct field name
            $payment->payment_method = 'UPI';
            
            if (!$payment->save()) {
                throw new \Exception('Failed to save payment record');
            }

            return response()->json([
                'success' => true,
                'message' => 'Payment record created successfully',
                'payment_id' => $payment->id
            ]);

        } catch (\Exception $e) {
            \Log::error('UPI Payment Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error processing payment: ' . $e->getMessage()
            ], 500);
        }
    }
}
