<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FocusCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'focus_area_id', 'title', 'image', 'summary', 'content'
    ];

    public function focusArea()
    {
        return $this->belongsTo(FocusArea::class);
    }
}

