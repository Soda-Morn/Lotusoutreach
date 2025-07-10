<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionCards extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'mission_id', 'title', 'subtitle', 'title_class', 'image', 'alt', 'description'
    ];

    public function mission()
    {
        return $this->belongsTo(Missions::class);
    }
}
