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

        
        $staff = User::create([
            'username' => 'ramkishor', 
            'userId' => 'ramk02',
            'password' => Hash::make('ramkishore1234')
        ]);
        $staff->assignRole('Role 01');


        $staff = User::create([
            'username' => 'Jane dayn', 
            'userId' => 'jane03',
            'password' => Hash::make('janedayn1234')
        ]);
        $staff->assignRole('Role 02');
    }
}
