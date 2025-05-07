<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'name'         => 'Mercedes',
                'base'         => 'Brackley, UK',
                'principal'    => 'Toto Wolff',
                'founded_year' => 1954,
                'image_path'   => null,
            ],
            [
                'name'         => 'Red Bull Racing',
                'base'         => 'Milton Keynes, UK',
                'principal'    => 'Christian Horner',
                'founded_year' => 2005,
                'image_path'   => null,
            ],
            [
                'name'         => 'Ferrari',
                'base'         => 'Maranello, Italy',
                'principal'    => 'Fred Vasseur',
                'founded_year' => 1929,
                'image_path'   => null,
            ],
            [
                'name'         => 'McLaren',
                'base'         => 'Woking, UK',
                'principal'    => 'Andrea Stella',
                'founded_year' => 1963,
                'image_path'   => null,
            ],
            [
                'name'         => 'Aston Martin',
                'base'         => 'Silverstone, UK',
                'principal'    => 'Mike Krack',
                'founded_year' => 1913,
                'image_path'   => null,
            ],
            [
                'name'         => 'Alpine',
                'base'         => 'Enstone, UK',
                'principal'    => 'Otmar Szafnauer',
                'founded_year' => 2021,
                'image_path'   => null,
            ],
            [
                'name'         => 'Stake Sauber',
                'base'         => 'Hinwil, Switzerland',
                'principal'    => 'Andreas Seidl',
                'founded_year' => 1993,
                'image_path'   => null,
            ],
            [
                'name'         => 'Haas',
                'base'         => 'Kannapolis, USA',
                'principal'    => 'Guenther Steiner',
                'founded_year' => 2014,
                'image_path'   => null,
            ],
            [
                'name'         => 'Williams',
                'base'         => 'Grove, UK',
                'principal'    => 'James Vowles',
                'founded_year' => 1977,
                'image_path'   => null,
            ],
            [
                'name'         => 'AlphaTauri',
                'base'         => 'Faenza, Italy',
                'principal'    => 'Franz Tost',
                'founded_year' => 2020,
                'image_path'   => null,
            ],
        ];

        foreach ($teams as $data) {
            Team::updateOrCreate(
                ['name' => $data['name']],
                [
                    'base'         => $data['base'],
                    'principal'    => $data['principal'],
                    'founded_year' => $data['founded_year'],
                    'image_path'   => $data['image_path'],
                ]
            );
        }
    }
}
