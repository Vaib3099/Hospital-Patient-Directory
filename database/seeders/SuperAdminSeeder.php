<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Admin User
        $admin = User::create([
            'username' => 'john', 
            'userId' => 'john01',
            'password' => Hash::make('john1234')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $staff = User::create([
            'username' => 'ramkishor', 
            'userId' => 'ramk02',
            'password' => Hash::make('ramkishore1234')
        ]);
        $staff->assignRole('Staff');
    }
}
