<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassFees;

class PublicController extends Controller
{
    public function getClassFees()
    {
        try {
            $classFees = ClassFees::orderBy('class', 'asc')->get();
            return response()->json([
                'success' => true,
                'data' => $classFees
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching class fees',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 