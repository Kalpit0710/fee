<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClassFees;

class ClassFeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classFees = [
            ['class' => 1, 'fees_per_month' => 2000],
            ['class' => 2, 'fees_per_month' => 2200],
            ['class' => 3, 'fees_per_month' => 2400],
            ['class' => 4, 'fees_per_month' => 2600],
            ['class' => 5, 'fees_per_month' => 2800],
            ['class' => 6, 'fees_per_month' => 3000],
            ['class' => 7, 'fees_per_month' => 3200],
            ['class' => 8, 'fees_per_month' => 3400],
            ['class' => 9, 'fees_per_month' => 3600],
            ['class' => 10, 'fees_per_month' => 3800],
            ['class' => 11, 'fees_per_month' => 4000],
            ['class' => 12, 'fees_per_month' => 4200],
        ];

        foreach ($classFees as $fee) {
            ClassFees::create($fee);
        }
    }
}
