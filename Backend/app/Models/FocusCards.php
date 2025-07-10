<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FocusCards extends Model
{
    use HasFactory;

    protected $fillable = [
        'focus_area_id',
        'title',
        'image',
        'summary',
        'content'
    ];

    protected $table = 'focus_cards';

    public function focusArea()
    {
        return $this->belongsTo(FocusAreas::class);
    }
}
