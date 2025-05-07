<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('drivers.create', compact('teams'));
    }

    public function store(Request $request)
    {
        // 1) Validate
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'nationality'   => 'required|string|max:255',
            'team_id'       => 'nullable|exists:teams,id',
            'date_of_birth' => 'required|date',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2) Handle upload (if any)
        if ($request->hasFile('image')) {
            // store on 'public/drivers' => storage/app/public/drivers
            $data['image'] = $request->file('image')
                                   ->store('drivers', 'public');
        }

        // 3) Create
        Driver::create($data);

        // 4) Redirect
        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver)
    {
        $teams = Team::all();
        return view('drivers.edit', compact('driver', 'teams'));
    }

    public function update(Request $request, Driver $driver)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'nationality'   => 'required|string|max:255',
            'team_id'       => 'nullable|exists:teams,id',
            'date_of_birth' => 'required|date',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // delete old (if exists)
            if ($driver->image && Storage::disk('public')->exists($driver->image)) {
                Storage::disk('public')->delete($driver->image);
            }

            // store new
            $data['image'] = $request->file('image')
                                   ->store('drivers', 'public');
        }

        $driver->update($data);

        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy(Driver $driver)
    {
        if ($driver->image && Storage::disk('public')->exists($driver->image)) {
            Storage::disk('public')->delete($driver->image);
        }

        $driver->delete();

        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
    }
}
