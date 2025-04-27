<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@jrpschool.in'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin@12345'),
                'email_verified_at' => now(),
            ]
        );
    }
}
