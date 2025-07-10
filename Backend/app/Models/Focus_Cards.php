<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Focus_Cards extends Model
{
    use HasFactory;

    protected $fillable = [
        'focus_area_id',
        'title',
        'image',
        'summary',
        'content'
    ];

    protected $table = 'focus_cards'; // Added to explicitly define table name

    public function focusArea()
    {
        return $this->belongsTo(Focus_Areas::class);
    }
}
