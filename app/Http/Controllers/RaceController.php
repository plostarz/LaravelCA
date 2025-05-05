<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $races = Race::with('circuit')->get();
    return view('races.index', compact('races'));
}

public function create()
{
    $circuits = Circuit::pluck('name','id');
    return view('races.create', compact('circuits'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'name'       => 'required|string|max:255',
        'date'       => 'required|date',
        'circuit_id' => 'required|exists:circuits,id',
        'season'     => 'required|integer',
        'round'      => 'required|integer',
    ]);
    Race::create($data);
    return redirect()->route('races.index')->with('success','Race created');
}

// Implement show, edit, update, destroy similarly

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
