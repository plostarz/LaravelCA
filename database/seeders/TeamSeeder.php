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
        ];

        foreach ($teams as $data) {
            Team::create($data);
        }
    }
}
