<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;
use App\Models\Circuit;

class RaceSeeder extends Seeder
{
    public function run()
    {
        $races = [
            [
                'name'       => 'Italian Grand Prix',
                'date'       => '2025-09-07',
                'circuit_id' => Circuit::where('name', 'Autodromo Nazionale Monza')->value('id'),
                'season'     => 2025,
                'round'      => 14,
            ],
            [
                'name'       => 'Monaco Grand Prix',
                'date'       => '2025-05-25',
                'circuit_id' => Circuit::where('name', 'Circuit de Monaco')->value('id'),
                'season'     => 2025,
                'round'      => 6,
            ],
            [
                'name'       => 'British Grand Prix',
                'date'       => '2025-07-20',
                'circuit_id' => Circuit::where('name', 'Silverstone Circuit')->value('id'),
                'season'     => 2025,
                'round'      => 10,
            ],
            // Add more races as desired...
        ];

        foreach ($races as $race) {
            Race::create($race);
        }
    }
}
