<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
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
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
