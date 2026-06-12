<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {

    User::create([
            'name' => 'Ahmad Farish',
            'username' => 'ahmadfarish',
            'email' => 'farish25146@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $patientUser = User::create([
            'name' => 'Ayu Alias',
            'username' => 'ayualias',
            'email' => 'ayu.alias@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
            'dob' => '2000-05-30',
            'city' => 'Selangor',
            'present_address' => 'Taman Tun Dr. Ismail, Selangor',
            'permanent_address' => 'Taman Tun Dr. Ismail, Selangor',
            'postal_code' => '53100'
        ]);

        Patient::create([
            'user_id' => $patientUser->id,
            'blood_pressure' => '138/90',
            'heart_rate' => 82,
            'temperature' => 36.8,
            'blood_sugar' => 140,
            'status' => 'Active'
        ]);
    }
}
