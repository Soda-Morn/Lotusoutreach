<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission_Cards extends Model
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

