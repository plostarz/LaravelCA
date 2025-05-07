<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality',
        'team_id',
        'date_of_birth',
        'image_path'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}