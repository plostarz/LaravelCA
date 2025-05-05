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

    // ... other methods (show, edit, update, destroy) ...
}
