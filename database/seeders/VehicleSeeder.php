<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::insert([
            [
                'plate_number' => 'BK 1234 AB',
                'brand' => 'Toyota Hiace',
                'type' => 'angkutan_orang',
                'ownership' => 'perusahaan',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'plate_number' => 'BK 5678 CD',
                'brand' => 'Mitsubishi Fuso',
                'type' => 'angkutan_barang',
                'ownership' => 'sewaan',
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
