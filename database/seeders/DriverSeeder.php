<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Team;

class DriverSeeder extends Seeder
{
    public function run()
    {
        $drivers = [
            [
                'name'          => 'Lewis Hamilton',
                'nationality'   => 'British',
                'team_id'       => Team::where('name', 'Mercedes')->value('id'),
                'date_of_birth' => '1985-01-07',
                'image_path'    => null,
            ],
            [
                'name'          => 'Max Verstappen',
                'nationality'   => 'Dutch',
                'team_id'       => Team::where('name', 'Red Bull Racing')->value('id'),
                'date_of_birth' => '1997-09-30',
                'image_path'    => null,
            ],
            [
                'name'          => 'Charles Leclerc',
                'nationality'   => 'Monegasque',
                'team_id'       => Team::where('name', 'Ferrari')->value('id'),
                'date_of_birth' => '1997-10-16',
                'image_path'    => null,
            ],
            [
                'name'          => 'Lando Norris',
                'nationality'   => 'British',
                'team_id'       => Team::where('name', 'McLaren')->value('id'),
                'date_of_birth' => '1999-11-13',
                'image_path'    => null,
            ],
        ];

        foreach ($drivers as $data) {
            Driver::create($data);
        }
    }
}
