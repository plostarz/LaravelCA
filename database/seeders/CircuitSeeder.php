<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Circuit;

class CircuitSeeder extends Seeder
{
    public function run()
    {
        $circuits = [
            [
                'name'       => 'Autodromo Nazionale Monza',
                'location'   => 'Monza',
                'country'    => 'Italy',
                'length_km'  => 5.793,
                'image_path' => null,
            ],
            [
                'name'       => 'Circuit de Monaco',
                'location'   => 'Monte Carlo',
                'country'    => 'Monaco',
                'length_km'  => 3.337,
                'image_path' => null,
            ],
            [
                'name'       => 'Silverstone Circuit',
                'location'   => 'Silverstone',
                'country'    => 'UK',
                'length_km'  => 5.891,
                'image_path' => null,
            ],
            // Add more circuits as you like...
        ];

        foreach ($circuits as $c) {
            Circuit::create($c);
        }
    }
}
