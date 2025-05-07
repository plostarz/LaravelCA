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
                'name'       => 'Bahrain International Circuit',
                'location'   => 'Sakhir',
                'country'    => 'Bahrain',
                'length_km'  => 5.412,
                'image_path' => null,
            ],
            [
                'name'       => 'Jeddah Corniche Circuit',
                'location'   => 'Jeddah',
                'country'    => 'Saudi Arabia',
                'length_km'  => 6.174,
                'image_path' => null,
            ],
            [
                'name'       => 'Albert Park Circuit',
                'location'   => 'Melbourne',
                'country'    => 'Australia',
                'length_km'  => 5.303,
                'image_path' => null,
            ],
            [
                'name'       => 'Suzuka International Racing Course',
                'location'   => 'Suzuka',
                'country'    => 'Japan',
                'length_km'  => 5.807,
                'image_path' => null,
            ],
            [
                'name'       => 'Shanghai International Circuit',
                'location'   => 'Shanghai',
                'country'    => 'China',
                'length_km'  => 5.451,
                'image_path' => null,
            ],
            [
                'name'       => 'Miami International Autodrome',
                'location'   => 'Miami Gardens',
                'country'    => 'USA',
                'length_km'  => 5.41,
                'image_path' => null,
            ],
            [
                'name'       => 'Imola Circuit',
                'location'   => 'Imola',
                'country'    => 'Italy',
                'length_km'  => 4.909,
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
                'name'       => 'Circuit Gilles Villeneuve',
                'location'   => 'Montreal',
                'country'    => 'Canada',
                'length_km'  => 4.361,
                'image_path' => null,
            ],
            [
                'name'       => 'Circuit de Barcelona-Catalunya',
                'location'   => 'Montmeló',
                'country'    => 'Spain',
                'length_km'  => 4.675,
                'image_path' => null,
            ],
            [
                'name'       => 'Red Bull Ring',
                'location'   => 'Spielberg',
                'country'    => 'Austria',
                'length_km'  => 4.318,
                'image_path' => null,
            ],
            [
                'name'       => 'Silverstone Circuit',
                'location'   => 'Silverstone',
                'country'    => 'UK',
                'length_km'  => 5.891,
                'image_path' => null,
            ],
            [
                'name'       => 'Hungaroring',
                'location'   => 'Mogyoród',
                'country'    => 'Hungary',
                'length_km'  => 4.381,
                'image_path' => null,
            ],
            [
                'name'       => 'Circuit de Spa-Francorchamps',
                'location'   => 'Stavelot',
                'country'    => 'Belgium',
                'length_km'  => 7.004,
                'image_path' => null,
            ],
            [
                'name'       => 'Circuit Zandvoort',
                'location'   => 'Zandvoort',
                'country'    => 'Netherlands',
                'length_km'  => 4.259,
                'image_path' => null,
            ],
            [
                'name'       => 'Monza Circuit',
                'location'   => 'Monza',
                'country'    => 'Italy',
                'length_km'  => 5.793,
                'image_path' => null,
            ],
            [
                'name'       => 'Baku City Circuit',
                'location'   => 'Baku',
                'country'    => 'Azerbaijan',
                'length_km'  => 6.003,
                'image_path' => null,
            ],
            [
                'name'       => 'Marina Bay Street Circuit',
                'location'   => 'Singapore',
                'country'    => 'Singapore',
                'length_km'  => 5.063,
                'image_path' => null,
            ],
            [
                'name'       => 'Circuit of the Americas',
                'location'   => 'Austin, Texas',
                'country'    => 'USA',
                'length_km'  => 5.513,
                'image_path' => null,
            ],
            [
                'name'       => 'Autódromo Hermanos Rodríguez',
                'location'   => 'Mexico City',
                'country'    => 'Mexico',
                'length_km'  => 4.305,
                'image_path' => null,
            ],
            [
                'name'       => 'Interlagos Circuit',
                'location'   => 'São Paulo',
                'country'    => 'Brazil',
                'length_km'  => 4.309,
                'image_path' => null,
            ],
            [
                'name'       => 'Las Vegas Strip Circuit',
                'location'   => 'Las Vegas',
                'country'    => 'USA',
                'length_km'  => 6.12,
                'image_path' => null,
            ],
            [
                'name'       => 'Lusail International Circuit',
                'location'   => 'Lusail',
                'country'    => 'Qatar',
                'length_km'  => 5.419,
                'image_path' => null,
            ],
            [
                'name'       => 'Yas Marina Circuit',
                'location'   => 'Abu Dhabi',
                'country'    => 'UAE',
                'length_km'  => 5.554,
                'image_path' => null,
            ],
        ];

        foreach ($circuits as $c) {
            Circuit::updateOrCreate(
                ['name' => $c['name']],
                [
                    'location'   => $c['location'],
                    'country'    => $c['country'],
                    'length_km'  => $c['length_km'],
                    'image_path' => $c['image_path'],
                ]
            );
        }
    }
}
