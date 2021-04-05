<?php

namespace Database\Seeders;

use App\Models\Parking;
use Illuminate\Database\Seeder;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parking::create([
            'name' => 'FRACCION',
            'price_hours' => 1500.00,
        ]);

        Parking::create([
            'name' => 'BASICO',
            'price_hours' => 2000.00,
        ]);

    }
}
