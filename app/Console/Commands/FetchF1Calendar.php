<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;    // ← use this
use App\Models\Race;
use App\Models\Circuit;                 // make sure this is imported

class FetchF1Calendar extends Command
{
    protected $signature = 'f1:fetch-calendar {season?}';
    protected $description = 'Fetch the F1 calendar from Ergast and sync to races table';

    public function handle()
    {
        $season = $this->argument('season') ?? date('Y');
        $url    = "http://ergast.com/api/f1/{$season}.json";

        $response = Http::get($url);

        if (! $response->ok()) {
            $this->error("Failed to fetch calendar: [{$response->status()}]");
            return 1;
        }

        $body   = $response->json();
        $rounds = data_get($body, 'MRData.RaceTable.Races', []);

        foreach ($rounds as $raceData) {
            // find or create circuit
            $circuit = Circuit::firstOrCreate(
                ['name'     => $raceData['Circuit']['circuitName']],
                [
                  'location'  => $raceData['Circuit']['Location']['locality'],
                  'country'   => $raceData['Circuit']['Location']['country'],
                  'length_km' => 0,
                  'image_path'=> null,
                ]
            );

            // sync the race
            Race::updateOrCreate(
                ['season' => $season, 'round' => $raceData['round']],
                [
                  'name'       => $raceData['raceName'],
                  'date'       => $raceData['date'],
                  'circuit_id' => $circuit->id,
                ]
            );
        }

        $this->info("F1 {$season} calendar synced (" . count($rounds) . " races).");
    }
}
