<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        // eager load driver count
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
