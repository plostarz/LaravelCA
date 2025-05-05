<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulationController extends Controller
{
    //
    public function index()
{
    $simulations = Simulation::with(['user','race'])->get();
    return view('simulations.index', compact('simulations'));
}

public function create()
{
    $races = Race::pluck('name','id');
    return view('simulations.create', compact('races'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'race_id'    => 'required|exists:races,id',
        'parameters' => 'nullable|string',  // JSON as text or a form input
    ]);

    // Example simulation logic: here you would call a service to compute results
    $params = json_decode($data['parameters'] ?? '{}', true);
    $results = [ /* run simulation algorithm */ ];

    $data['user_id'] = auth()->id();
    $data['results'] = json_encode($results);

    Simulation::create($data);

    return redirect()->route('simulations.index')
        ->with('success','Simulation created');
}

public function show(Simulation $simulation)
{
    $simulation->load(['user','race']);
    return view('simulations.show', compact('simulation'));
}

// edit/update/destroy can be added as needed
}
