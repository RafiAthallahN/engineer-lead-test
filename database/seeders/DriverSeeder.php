<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::insert([
            [
                'name' => 'Budi Santoso',
                'license_number' => 'SIM123456',
                'contact' => '081234567890',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Siti Aminah',
                'license_number' => 'SIM789012',
                'contact' => '082233445566',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
