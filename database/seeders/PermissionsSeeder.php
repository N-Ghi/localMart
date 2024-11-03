<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $permissions = [
        'create-service',
        'edit-service',
        'delete-service',
        'view-service',

        'create-booking',
        'edit-booking',
        'delete-booking',
        'view-booking',
        
        'create-user',
        'edit-user',
        'delete-user',
        'view-user',

        'create-payment',
        'edit-payment',
        'delete-payment',
        'view-payment',

        'create-profile',
        'edit-profile',
        'delete-profile',
        'view-profile',

    ];

    foreach ($permissions as $permission) {
        \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
    }
}

}
