<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','base','principal','founded_year','image_path',
    ];
    
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    
    public function races()
    {
        return $this->hasMany(Race::class);
    }
}
