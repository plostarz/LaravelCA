<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulation; // ← import the Simulation model
use App\Models\Race;       // ← import the Race model

class SimulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // now Simulation is in scope
        $simulations = Simulation::with(['user', 'race'])->get();
        return view('simulations.index', compact('simulations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $races = Race::pluck('name', 'id');
        return view('simulations.create', compact('races'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'race_id'    => 'required|exists:races,id',
            'parameters' => 'nullable|string',
        ]);

        // Example: decode params and perform logic...
        $params = json_decode($data['parameters'] ?? '{}', true);

        // Create the record
        Simulation::create([
            'race_id'    => $data['race_id'],
            'user_id'    => auth()->id(),
            'parameters' => $data['parameters'],
            'results'    => json_encode([
                // ... your simulated results here ...
            ]),
        ]);

        return redirect()->route('simulations.index')
                         ->with('success', 'Simulation run and saved.');
    }

    // ... other methods (show, edit, update, destroy) ...
}
