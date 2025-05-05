<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','date','circuit_id','season','round',
    ];
    
    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }
    
    public function simulations()
    {
        return $this->hasMany(Simulation::class);
    }
}
