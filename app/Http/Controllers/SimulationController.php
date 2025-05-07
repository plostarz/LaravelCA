<?php

namespace App\Http\Controllers;

use App\Services\SimulationService;
use App\Models\Race;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    protected $simService;

    public function __construct(SimulationService $simService)
    {
        $this->middleware('auth');
        $this->simService = $simService;
    }

    /**
     * Display a listing of simulations.
     */
    public function index()
    {
        $simulations = Simulation::with(['user', 'race'])->get();
        return view('simulations.index', compact('simulations'));
    }

    /**
     * Show form to run a new simulation.
     */
    public function create()
    {
        $races = Race::pluck('name', 'id');
        return view('simulations.create', compact('races'));
    }

    /**
     * Store a newly created simulation.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'race_id'             => 'required|exists:races,id',
            'parameters.weather'  => 'nullable|in:dry,wet',
            'parameters.lap_count'=> 'nullable|integer|min:1|max:200',
        ]);

        $race   = Race::findOrFail($data['race_id']);
        $params = $data['parameters'] ?? [];

        // Run the simulation
        $results = $this->simService->simulate($race, $params);

        // Persist
        $sim = Simulation::create([
            'user_id'    => Auth::id(),
            'race_id'    => $race->id,
            'parameters' => json_encode($params),
            'results'    => json_encode($results),
        ]);

        return redirect()
            ->route('simulations.show', $sim)
            ->with('success', 'Simulation complete!');
    }

    /**
     * Display the specified simulation.
     */
    public function show(Simulation $simulation)
    {
        $simulation->load(['user', 'race']);
        return view('simulations.show', compact('simulation'));
    }

    // You can add edit/update/destroy as needed
}
