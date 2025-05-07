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
            // Mercedes
            [
                'name'          => 'Lewis Hamilton',
                'nationality'   => 'British',
                'team_name'     => 'Mercedes',
                'date_of_birth' => '1985-01-07',
            ],
            [
                'name'          => 'George Russell',
                'nationality'   => 'British',
                'team_name'     => 'Mercedes',
                'date_of_birth' => '1998-02-15',
            ],

            // Red Bull
            [
                'name'          => 'Max Verstappen',
                'nationality'   => 'Dutch',
                'team_name'     => 'Red Bull Racing',
                'date_of_birth' => '1997-09-30',
            ],
            [
                'name'          => 'Sergio Pérez',
                'nationality'   => 'Mexican',
                'team_name'     => 'Red Bull Racing',
                'date_of_birth' => '1990-01-26',
            ],

            // Ferrari
            [
                'name'          => 'Charles Leclerc',
                'nationality'   => 'Monegasque',
                'team_name'     => 'Ferrari',
                'date_of_birth' => '1997-10-16',
            ],
            [
                'name'          => 'Carlos Sainz',
                'nationality'   => 'Spanish',
                'team_name'     => 'Ferrari',
                'date_of_birth' => '1994-09-01',
            ],

            // McLaren
            [
                'name'          => 'Lando Norris',
                'nationality'   => 'British',
                'team_name'     => 'McLaren',
                'date_of_birth' => '1999-11-13',
            ],
            [
                'name'          => 'Oscar Piastri',
                'nationality'   => 'Australian',
                'team_name'     => 'McLaren',
                'date_of_birth' => '2001-04-06',
            ],

            // Aston Martin
            [
                'name'          => 'Fernando Alonso',
                'nationality'   => 'Spanish',
                'team_name'     => 'Aston Martin',
                'date_of_birth' => '1981-07-29',
            ],
            [
                'name'          => 'Lance Stroll',
                'nationality'   => 'Canadian',
                'team_name'     => 'Aston Martin',
                'date_of_birth' => '1998-10-29',
            ],

            // Alpine
            [
                'name'          => 'Esteban Ocon',
                'nationality'   => 'French',
                'team_name'     => 'Alpine',
                'date_of_birth' => '1996-09-17',
            ],
            [
                'name'          => 'Pierre Gasly',
                'nationality'   => 'French',
                'team_name'     => 'Alpine',
                'date_of_birth' => '1996-02-07',
            ],

            // Alfa Romeo (Stake Sauber)
            [
                'name'          => 'Valtteri Bottas',
                'nationality'   => 'Finnish',
                'team_name'     => 'Stake Sauber',
                'date_of_birth' => '1989-08-28',
            ],
            [
                'name'          => 'Guanyu Zhou',
                'nationality'   => 'Chinese',
                'team_name'     => 'Stake Sauber',
                'date_of_birth' => '1999-05-30',
            ],

            // Haas
            [
                'name'          => 'Kevin Magnussen',
                'nationality'   => 'Danish',
                'team_name'     => 'Haas',
                'date_of_birth' => '1995-10-05',
            ],
            [
                'name'          => 'Nico Hülkenberg',
                'nationality'   => 'German',
                'team_name'     => 'Haas',
                'date_of_birth' => '1987-10-27',
            ],

            // Williams
            [
                'name'          => 'Alex Albon',
                'nationality'   => 'Thai',
                'team_name'     => 'Williams',
                'date_of_birth' => '1996-03-23',
            ],
            [
                'name'          => 'Logan Sargeant',
                'nationality'   => 'American',
                'team_name'     => 'Williams',
                'date_of_birth' => '2000-12-25',
            ],

            // AlphaTauri (RB)
            [
                'name'          => 'Yuki Tsunoda',
                'nationality'   => 'Japanese',
                'team_name'     => 'AlphaTauri',
                'date_of_birth' => '2000-05-11',
            ],
            [
                'name'          => 'Daniel Ricciardo',
                'nationality'   => 'Australian',
                'team_name'     => 'AlphaTauri',
                'date_of_birth' => '1989-07-01',
            ],
        ];

        foreach ($drivers as $d) {
            // Look up the team ID
            $teamId = Team::where('name', $d['team_name'])->value('id');

            if (! $teamId) {
                $this->command->warn("Team “{$d['team_name']}” not found, skipping “{$d['name']}.”");
                continue;
            }

            Driver::updateOrCreate(
                ['name' => $d['name']],  // key on name
                [
                    'nationality'   => $d['nationality'],
                    'team_id'       => $teamId,
                    'date_of_birth' => $d['date_of_birth'],
                    'image_path'    => null,
                ]
            );
        }
    }
}
