<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use Illuminate\Http\Request;

class CircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circuits = Circuit::all();
        return view('circuits.index', compact('circuits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('circuits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'country'    => 'required|string|max:255',
            'length_km'  => 'required|numeric',
            'image_path' => 'nullable|url',
        ]);

        Circuit::create($data);

        return redirect()
            ->route('circuits.index')
            ->with('success', 'Circuit added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Circuit $circuit)
    {
        return view('circuits.show', compact('circuit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circuit $circuit)
    {
        return view('circuits.edit', compact('circuit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Circuit $circuit)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'country'    => 'required|string|max:255',
            'length_km'  => 'required|numeric',
            'image_path' => 'nullable|url',
        ]);

        $circuit->update($data);

        return redirect()
            ->route('circuits.index')
            ->with('success', 'Circuit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circuit $circuit)
    {
        $circuit->delete();

        return redirect()
            ->route('circuits.index')
            ->with('success', 'Circuit deleted.');
    }
}
