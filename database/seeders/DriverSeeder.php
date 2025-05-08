<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        // Optional: clear out existing data
        DB::table('drivers')->truncate();

        $drivers = [
            [
                'name' => 'Max Verstappen',
                'nationality' => 'Dutch',
                'date_of_birth' => '1997-09-30',
                'team' => 'Red Bull Racing',
                'image_path' => 'images/max.jpg',
            ],
            [
                'name' => 'Lewis Hamilton',
                'nationality' => 'British',
                'date_of_birth' => '1985-01-07',
                'team' => 'Mercedes',
                'image_path' => 'images/lewis.webp',
            ],
            [
                'name' => 'Charles Leclerc',
                'nationality' => 'Monégasque',
                'date_of_birth' => '1997-10-16',
                'team' => 'Ferrari',
                'image_path' => 'images/charles.jpg',
            ],
            [
                'name' => 'Lando Norris',
                'nationality' => 'British',
                'date_of_birth' => '1999-11-13',
                'team' => 'McLaren',
                'image_path' => 'images/lando.jpg',
            ],
            [
                'name' => 'George Russell',
                'nationality' => 'British',
                'date_of_birth' => '1998-02-15',
                'team' => 'Mercedes',
                'image_path' => 'images/george.jpg',
            ],
            [
                'name' => 'Sergio Pérez',
                'nationality' => 'Mexican',
                'date_of_birth' => '1990-01-26',
                'team' => 'Red Bull Racing',
                'image_path' => 'images/sergio.jpg',
            ],
            [
                'name' => 'Carlos Sainz',
                'nationality' => 'Spanish',
                'date_of_birth' => '1994-09-01',
                'team' => 'Ferrari',
                'image_path' => 'images/fernando.jpg', // Replace if you have Carlos Sainz image
            ],
            [
                'name' => 'Fernando Alonso',
                'nationality' => 'Spanish',
                'date_of_birth' => '1981-07-29',
                'team' => 'Aston Martin',
                'image_path' => 'images/fernando.jpg',
            ],
            [
                'name' => 'Valtteri Bottas',
                'nationality' => 'Finnish',
                'date_of_birth' => '1989-08-28',
                'team' => 'Alfa Romeo',
                'image_path' => 'images/valtteri.jpg',
            ],
            [
                'name' => 'Yuki Tsunoda',
                'nationality' => 'Japanese',
                'date_of_birth' => '2000-05-11',
                'team' => 'AlphaTauri',
                'image_path' => 'images/yuki.jpg',
            ],
            [
                'name' => 'Zhou Guanyu',
                'nationality' => 'Chinese',
                'date_of_birth' => '1999-05-30',
                'team' => 'Alfa Romeo',
                'image_path' => 'images/zhou.jpg',
            ],
            [
                'name' => 'Nico Hülkenberg',
                'nationality' => 'German',
                'date_of_birth' => '1987-08-19',
                'team' => 'Haas',
                'image_path' => 'images/nico.jpg',
            ],
            [
                'name' => 'Kevin Magnussen',
                'nationality' => 'Danish',
                'date_of_birth' => '1992-10-05',
                'team' => 'Haas',
                'image_path' => 'images/kevin.jpg',
            ],
            [
                'name' => 'Esteban Ocon',
                'nationality' => 'French',
                'date_of_birth' => '1996-09-17',
                'team' => 'Alpine',
                'image_path' => 'images/estaban.jpg',
            ],
            [
                'name' => 'Pierre Gasly',
                'nationality' => 'French',
                'date_of_birth' => '1996-02-07',
                'team' => 'Alpine',
                'image_path' => 'images/pierre.jpg',
            ],
            [
                'name' => 'Logan Sargeant',
                'nationality' => 'American',
                'date_of_birth' => '2000-12-31',
                'team' => 'Williams',
                'image_path' => 'images/logan.jpg',
            ],
            [
                'name' => 'Alex Albon',
                'nationality' => 'Thai',
                'date_of_birth' => '1996-03-23',
                'team' => 'Williams',
                'image_path' => 'images/alex.jpg',
            ],
            [
                'name' => 'Oscar Piastri',
                'nationality' => 'Australian',
                'date_of_birth' => '2001-04-06',
                'team' => 'McLaren',
                'image_path' => 'images/oscar.jpg',
            ],
            [
                'name' => 'Lance Stroll',
                'nationality' => 'Canadian',
                'date_of_birth' => '1998-10-29',
                'team' => 'Aston Martin',
                'image_path' => 'images/lance.jpg',
            ],
            [
                'name' => 'Daniel Ricciardo',
                'nationality' => 'Australian',
                'date_of_birth' => '1989-07-01',
                'team' => 'AlphaTauri',
                'image_path' => 'images/daniel.jpg',
            ],
        ];

        foreach ($drivers as $data) {
            $team = Team::firstOrCreate(['name' => $data['team']]);
            Driver::create([
                'name' => $data['name'],
                'nationality' => $data['nationality'],
                'date_of_birth' => $data['date_of_birth'],
                'team_id' => $team->id,
                'image_path' => $data['image_path'],
            ]);
        }
    }
}
