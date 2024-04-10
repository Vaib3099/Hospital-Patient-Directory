<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'patient_name' => 'John Doe',
            'age' => 30,
            'phone_number' => '1234567890',
            'hospital_id' => 1,
            'photo' => 'path/to/photo.jpg',
        ]);

        Patient::create([
            'patient_name' => 'Jane Smith',
            'age' => 25,
            'phone_number' => '9876543210',
            'hospital_id' => 1,
            'photo' => 'path/to/photo.jpg',
        ]);
    }
}
