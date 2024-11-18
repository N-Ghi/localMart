<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $adminEmail = env('ADMIN_EMAIL', 'default@example.com');
    $adminName = env('ADMIN_USERNAME', 'Default Admin');
    $adminPassword = bcrypt(env('ADMIN_PASSWORD', 'defaultpassword'));

    $admin = \App\Models\User::firstOrCreate(
        ['email' => $adminEmail],
        ['name' => $adminName, 'password' => $adminPassword]
    );

    $admin->assignRole('admin');
}

}
