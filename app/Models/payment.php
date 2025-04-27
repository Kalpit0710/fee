<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = "payments";
    protected $fillable = [
        'order_id',
        'payment_id',
        'receipt_no',
        'student_name',
        'email',
        'mobile',
        'class',
        'fees',
        'month',
        'total_fees_paid',
        'currency',
        'payment_status',
        'address',
        'upi_id',
        'payment_method'
    ];

    protected $dates = ['deleted_at'];

    public function classFees()
    {
        return $this->belongsTo(ClassFees::class, 'class', 'class');
    }
}
