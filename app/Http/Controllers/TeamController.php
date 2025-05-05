<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $teams = Team::withCount('drivers')->get();
    return view('teams.index', compact('teams'));
}

public function create()
{
    return view('teams.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'base' => 'nullable|string|max:255',
        'principal' => 'nullable|string|max:255',
        'founded_year' => 'nullable|digits:4|integer',
        'image' => 'nullable|image|max:2048',
    ]);
    if ($request->hasFile('image')) {
        $data['image_path'] = $request->file('image')->store('teams','public');
    }
    Team::create($data);
    return redirect()->route('teams.index')->with('success','Team created');
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
