<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Approver One',
            'email' => 'approver1@demo.com',
            'password' => bcrypt('password'),
            'role' => 'approver',
        ]);

        User::create([
            'name' => 'Approver Two',
            'email' => 'approver2@demo.com',
            'password' => bcrypt('password'),
            'role' => 'approver',
        ]);

    }
}
