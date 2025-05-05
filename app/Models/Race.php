<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Circuit;  // import your Circuit model

class Race extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'circuit_id',
        'season',
        'round',
    ];

    /** 
     * Cast the `date` column to a Carbon instance 
     * so you can call ->format() in your Blade.
     */
    protected $casts = [
        'date' => 'date',
    ];

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }
}
