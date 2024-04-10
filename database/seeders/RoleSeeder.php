<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'Staff']);

        $admin->givePermissionTo([
            'create-hospital',
            'edit-hospital',
            'delete-hospital',
            'create-patient',
            'edit-patient',
            'delete-patient',
            'create-user',
            'edit-user',
            'delete-user',
            'create-roles',
            'edit-roles',
            'delete-roles',
        ]);

        $user->givePermissionTo([
            'create-hospital',
            'edit-hospital',
            'delete-hospital',
        ]);

    }
}
