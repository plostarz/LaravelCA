<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;     // ← import the Race model
use App\Models\Circuit;  // ← import the Circuit model

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // now Race is in scope
        $races = Race::with('circuit')->get();
        return view('races.index', compact('races'));
    }

    public function create()
    {
        // now Circuit is in scope
        $circuits = Circuit::pluck('name','id');
        return view('races.create', compact('circuits'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'date'       => 'required|date',
            'circuit_id' => 'required|exists:circuits,id',
        ]);

        Race::create($data);

        return redirect()->route('races.index')
                         ->with('success', 'Race created.');
    }
    public function edit(Race $race)
    {
        $circuits = Circuit::pluck('name','id');
        return view('races.edit', compact('race','circuits'));
    }
    public function update(Request $request, Race $race)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'date'       => 'required|date',
            'circuit_id' => 'required|exists:circuits,id',
            'season'     => 'required|integer|min:1950|max:'.(date('Y')+1),
            'round'      => 'required|integer|min:1',
        ]);

        $race->update($data);

        return redirect()
            ->route('races.index')
            ->with('success', 'Race updated successfully!');
    }    
    // ... other methods (show, edit, update, destroy) ...
}
