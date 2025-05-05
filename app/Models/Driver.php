<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;         // <— import Team
use App\Models\Simulation;  // <— import Simulation

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'team_id',
        'date_of_birth',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function simulations()
    {
        return $this->hasMany(Simulation::class);
    }
}
