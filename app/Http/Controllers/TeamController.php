<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function index()
    {
        // Map each DB team name → Ergast constructorId
        $constructorMap = [
            'Mercedes'        => 'mercedes',
            'Red Bull Racing' => 'red_bull',
            'Ferrari'         => 'ferrari',
            'McLaren'         => 'mclaren',
            'Aston Martin'    => 'aston_martin',
            'Alpine'          => 'alpine',
            'Stake Sauber'    => 'sauber',
            'Haas'            => 'haas',
            'Williams'        => 'williams',
            'AlphaTauri'      => 'alphatauri',
        ];

        $teams = Team::withCount('drivers')
            ->select('id','name','base','principal','founded_year','image_path')
            ->get()
            ->map(function($team) use ($constructorMap) {
                $id = $constructorMap[$team->name] ?? null;

                $wins = 'N/A';
                $drivers = ['Unknown team'];

                if ($id) {
                    // 1) Fetch total constructor wins
                    $winRes = Http::get("https://ergast.com/api/f1/constructorStandings/1.json", [
                        'constructorId' => $id
                    ]);

                    $standing = data_get(
                        $winRes->json(),
                        'MRData.StandingsTable.StandingsLists.0.ConstructorStandings.0'
                    );

                    $wins = $standing['wins'] ?? '0';

                    // 2) Fetch all drivers
                    $drvRes = Http::get("https://ergast.com/api/f1/drivers.json", [
                        'constructorId' => $id,
                        'limit'         => 1000
                    ]);

                    $drivers = collect(data_get($drvRes->json(), 'MRData.DriverTable.Drivers', []))
                        ->map(function($d) {
                            return $d['givenName'].' '.$d['familyName'];
                        })
                        ->toArray();
                }

                // Attach stats onto the model
                $team->wins    = $wins;
                $team->drivers = $drivers;

                return $team;
            });

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'base'         => 'required|string|max:255',
            'principal'    => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'image_path'   => 'nullable|url',
        ]);

        Team::create($data);

        return redirect()
            ->route('teams.index')
            ->with('success','Team added!');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'base'         => 'required|string|max:255',
            'principal'    => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1900|max:'.(date('Y')+1),
            'image_path'   => 'nullable|url',
        ]);

        $team->update($data);

        return redirect()
            ->route('teams.index')
            ->with('success','Team updated!');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back()->with('success','Team removed');
    }
}
