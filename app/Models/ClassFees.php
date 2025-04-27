<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassFees extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "class_fees";
    protected $fillable = [
        'class',
        'fees_per_month'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'fees_per_month' => 'decimal:2'
    ];

    public static $rules = [
        'class' => 'required|integer|min:1|max:12',
        'fees_per_month' => 'required|numeric|min:0'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'class', 'class');
    }
}
