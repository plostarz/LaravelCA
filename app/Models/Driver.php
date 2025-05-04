<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nationality', 'team_id', 'date_of_birth',
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
