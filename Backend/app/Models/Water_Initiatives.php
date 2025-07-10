<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Water_Initiatives extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'highlight',
        'stat_value', 'stat_text', 'image_src', 'image_alt'
    ];
}
