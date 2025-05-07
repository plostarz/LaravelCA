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
            ['round' => 1,  'name' => 'Bahrain Grand Prix',           'date' => '2024-03-02', 'circuit' => 'Bahrain International Circuit'],
            ['round' => 2,  'name' => 'Saudi Arabian Grand Prix',     'date' => '2024-03-09', 'circuit' => 'Jeddah Corniche Circuit'],
            ['round' => 3,  'name' => 'Australian Grand Prix',        'date' => '2024-03-24', 'circuit' => 'Albert Park Circuit'],
            ['round' => 4,  'name' => 'Japanese Grand Prix',          'date' => '2024-04-07', 'circuit' => 'Suzuka International Racing Course'],
            ['round' => 5,  'name' => 'Chinese Grand Prix',           'date' => '2024-04-21', 'circuit' => 'Shanghai International Circuit'],
            ['round' => 6,  'name' => 'Miami Grand Prix',             'date' => '2024-05-05', 'circuit' => 'Miami International Autodrome'],
            ['round' => 7,  'name' => 'Emilia Romagna Grand Prix',    'date' => '2024-05-19', 'circuit' => 'Imola Circuit'],
            ['round' => 8,  'name' => 'Monaco Grand Prix',            'date' => '2024-05-26', 'circuit' => 'Circuit de Monaco'],
            ['round' => 9,  'name' => 'Canadian Grand Prix',          'date' => '2024-06-09', 'circuit' => 'Circuit Gilles Villeneuve'],
            ['round' => 10, 'name' => 'Spanish Grand Prix',           'date' => '2024-06-23', 'circuit' => 'Circuit de Barcelona-Catalunya'],
            ['round' => 11, 'name' => 'Austrian Grand Prix',          'date' => '2024-06-30', 'circuit' => 'Red Bull Ring'],
            ['round' => 12, 'name' => 'British Grand Prix',           'date' => '2024-07-07', 'circuit' => 'Silverstone Circuit'],
            ['round' => 13, 'name' => 'Hungarian Grand Prix',         'date' => '2024-07-21', 'circuit' => 'Hungaroring'],
            ['round' => 14, 'name' => 'Belgian Grand Prix',           'date' => '2024-07-28', 'circuit' => 'Circuit de Spa-Francorchamps'],
            ['round' => 15, 'name' => 'Dutch Grand Prix',             'date' => '2024-08-25', 'circuit' => 'Circuit Zandvoort'],
            ['round' => 16, 'name' => 'Italian Grand Prix',           'date' => '2024-09-01', 'circuit' => 'Monza Circuit'],
            ['round' => 17, 'name' => 'Azerbaijan Grand Prix',        'date' => '2024-09-15', 'circuit' => 'Baku City Circuit'],
            ['round' => 18, 'name' => 'Singapore Grand Prix',         'date' => '2024-09-22', 'circuit' => 'Marina Bay Street Circuit'],
            ['round' => 19, 'name' => 'United States Grand Prix',     'date' => '2024-10-20', 'circuit' => 'Circuit of the Americas'],
            ['round' => 20, 'name' => 'Mexico City Grand Prix',       'date' => '2024-10-27', 'circuit' => 'Autódromo Hermanos Rodríguez'],
            ['round' => 21, 'name' => 'São Paulo Grand Prix',         'date' => '2024-11-03', 'circuit' => 'Interlagos Circuit'],
            ['round' => 22, 'name' => 'Las Vegas Grand Prix',         'date' => '2024-11-23', 'circuit' => 'Las Vegas Strip Circuit'],
            ['round' => 23, 'name' => 'Qatar Grand Prix',             'date' => '2024-12-01', 'circuit' => 'Lusail International Circuit'],
            ['round' => 24, 'name' => 'Abu Dhabi Grand Prix',         'date' => '2024-12-08', 'circuit' => 'Yas Marina Circuit'],
        ];

        foreach ($races as $r) {
            $circuitId = Circuit::where('name', $r['circuit'])->value('id');
            if (! $circuitId) {
                $this->command->warn("Circuit “{$r['circuit']}” not found, skipping round {$r['round']}.");
                continue;
            }

            Race::updateOrCreate(
                [
                    'season' => 2024,
                    'round'  => $r['round'],
                ],
                [
                    'name'       => $r['name'],
                    'date'       => $r['date'],
                    'circuit_id' => $circuitId,
                ]
            );
        }
    }
}
