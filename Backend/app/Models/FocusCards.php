<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FocusCards extends Model
{
    use HasFactory;

     protected $fillable = [
        'focus_area_id', 'title', 'image', 'summary', 'content'
    ];

    public function focusArea()
    {
        return $this->belongsTo(FocusAreas::class);
    }
}
