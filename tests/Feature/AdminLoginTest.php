<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_payment_method_column_exists()
    {
        $this->assertTrue(\Schema::hasColumn('payments', 'payment_method'), 'The payment_method column does not exist in the payments table.');
    }
}