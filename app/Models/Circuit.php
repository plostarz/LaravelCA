<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'country',
        'length_km',
        'image_path',
    ];
}
