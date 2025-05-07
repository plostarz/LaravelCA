<?php

namespace App\Services;

use App\Models\Race;
use App\Models\Driver;
use Illuminate\Support\Collection;

class SimulationService
{
    /**
     * Run a simple race simulation.
     *
     * @param  Race   $race
     * @param  array  $params  // e.g. ['weather' => 'dry', 'lap_count' => 52]
     * @return array  // ['results' => [ driver_id => ['total_time' => ..., 'avg_lap' => ..., 'positions' => [...]], ... ]]
     */
    public function simulate(Race $race, array $params = []): array
    {
        $lapCount = $params['lap_count'] ??  $race->laps ?? 60;
        $weather  = $params['weather']  ?? 'dry';

        // 1. Load all drivers entered in this race
        //    (you could also accept a custom list via $params)
        $drivers = $race->drivers ?? Driver::all(); 

        $results = [];

        foreach ($drivers as $driver) {
            // Base performance: pick a base lap time in seconds, e.g. circuit length * factor
            $baseLap = $race->circuit->length_km * 75; 
            // Adjust for driver skill (random factor around ±5s) and weather
            $skillAdj   = rand(-300, +300) / 100;              // ±3 sec
            $weatherAdj = ($weather === 'wet') ? rand(100, 500)/100 : 0; // +1–5s if wet

            // Simulate total time over all laps
            $lapTimes = [];
            for ($i = 1; $i <= $lapCount; $i++) {
                // add a small per-lap variance
                $randVar = rand(-200, +200) / 100; // ±2s
                $lapTime = $baseLap + $skillAdj + $weatherAdj + $randVar;
                $lapTimes[] = round($lapTime, 3);
            }

            $totalTime = array_sum($lapTimes);

            $results[$driver->id] = [
                'driver_name' => $driver->name,
                'total_time'  => round($totalTime, 3),
                'avg_lap'     => round($totalTime / $lapCount, 3),
                'laps'        => $lapTimes,
            ];
        }

        // 2. Sort by ascending total_time
        uasort($results, function($a, $b){
            return $a['total_time'] <=> $b['total_time'];
        });

        // 3. Assign finishing positions
        $position = 1;
        foreach ($results as &$row) {
            $row['position'] = $position++;
        }
        unset($row);

        return $results;
    }
}
