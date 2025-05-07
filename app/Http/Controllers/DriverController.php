<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the drivers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new driver.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        return view('drivers.create', compact('teams'));
    }

    /**
     * Store a newly created driver in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'team_id' => 'nullable|exists:teams,id',
            'date_of_birth' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('drivers', 'public');
            $validated['image_path'] = $path;
        }
        
        Driver::create($validated);
        
        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    /**
     * Display the specified driver.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return view('drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified driver.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $teams = Team::all();
        return view('drivers.edit', compact('driver', 'teams'));
    }

    /**
     * Update the specified driver in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, Driver $driver)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'team_id' => 'nullable|exists:teams,id',
        'date_of_birth' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists and it's not in the public folder
        if ($driver->image_path && file_exists(public_path($driver->image_path))) {
            unlink(public_path($driver->image_path));
        }
        
        // Store new image in public/images directory
        $file = $request->file('image');
        $fileName = $driver->id . '_' . time() . '.' . $file->extension();
        $file->move(public_path('images'), $fileName);
        $validated['image_path'] = 'images/' . $fileName;
    }
    
    $driver->update($validated);
    
    return redirect()->route('drivers.index')
        ->with('success', 'Driver updated successfully');
}

    /**
     * Remove the specified driver from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        if ($driver->image_path && Storage::disk('public')->exists($driver->image_path)) {
            Storage::disk('public')->delete($driver->image_path);
        }
        
        $driver->delete();
        
        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
    }
}