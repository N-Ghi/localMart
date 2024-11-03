<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            'admin' => ['create-service', 'edit-service', 'delete-service', 'view-service', 'create-booking', 'edit-booking', 'delete-booking', 'view-booking', 'create-user', 'edit-user', 'delete-user', 'view-user', 'create-payment', 'edit-payment', 'delete-payment', 'view-payment'],

            'provider' => ['view-service', 'create-service', 'edit-service', 'delete-service', 'view-booking', 'delete-booking', 'edit-booking', 'view-payment', 'edit-payment'],

            'traveller' => ['view-booking', 'create-booking', 'edit-booking', 'delete-booking', 'view-service', 'view-payment', 'create-payment'],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }
    }

}
