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
public function up()
{
    Schema::table('circuits', function (Blueprint $table) {
        $table->string('image_path')->nullable();
    });
}
public function create()
{
    return view('circuits.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name'      => 'required|string|max:255',
        'location'  => 'required|string|max:255',
        'country'   => 'required|string|max:255',
        'length_km' => 'required|numeric',
        'image'     => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('circuits', 'public');
    }

    Circuit::create($data);

    return redirect()->route('circuits.index')
        ->with('success', 'Circuit added successfully!');
}
    // Other resource methods (create, store, show, etc.) can be added as needed
}
