<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $drivers = Driver::with('team')->get();
    return view('drivers.index', compact('drivers'));
}

public function create()
{
    $teams = Team::pluck('name','id');
    return view('drivers.create', compact('teams'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string',
        'nationality' => 'required|string',
        'team_id' => 'nullable|exists:teams,id',
        'date_of_birth' => 'required|date',
        'image' => 'nullable|image|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('drivers','public');
    }
    Driver::create($data);
    return redirect()->route('drivers.index')->with('success','Driver added');
}

// add show, edit, update, destroy similarly

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
