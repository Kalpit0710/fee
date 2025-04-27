<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\displayController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// Public Routes
Route::middleware(['throttle:60,1'])->group(function () {
    Route::get('/get-class-fees', [PublicController::class, 'getClassFees'])->name('public.getClassFees');
    Route::post('/order', [FormController::class, 'order'])->name('order');
    Route::post('/paymentstore', [FormController::class, 'paymentstore'])->name('paymentstore');
    Route::post('/receipt', [displayController::class, 'receipt'])->name('receipt');
    Route::get('/receipt_download', [displayController::class, 'receipt_download'])->name('receipt_download');
    Route::post('/upi-payment-link', [PaymentController::class, 'generateLink'])->name('upi.link');
});

// All Admin Route
Route::group(['prefix'=>'admin'],function(){
    Route::get('/login', [AdminController::class, 'signin'])->name('login');
    Route::post('/signin', [AdminController::class, 'signinreq'])->name('signinreq');
    Route::get('/signout',[AdminController::class,'signout'])->name('signout');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/allrecord', [AdminController::class, 'allrecord'])->name('allrecord');
        Route::post('/specificrecord', [AdminController::class, 'specificrecord'])->name('specificrecord');
        Route::delete('/delete/{id?}', [AdminController::class, 'delete'])->name('delete');
        Route::get('/print/{id?}', [AdminController::class, 'print'])->name('print');
        Route::get('/refund/{id?}', [AdminController::class, 'refund'])->name('refund');
        Route::post('/update-class-fees', [AdminController::class, 'updateClassFees'])->name('admin.updateClassFees');
        Route::get('/get-class-fees', [AdminController::class, 'getClassFees'])->name('admin.getClassFees');
        Route::get('/download-transactions', [AdminController::class, 'downloadTransactions'])->name('downloadTransactions');
        Route::post('/update-payment-status/{id}', [AdminController::class, 'updatePaymentStatus'])->name('admin.update-payment-status');
        Route::post('/upi-payment-callback', [AdminController::class, 'handleUpiPayment'])->name('upi.payment.callback');
    });
});
