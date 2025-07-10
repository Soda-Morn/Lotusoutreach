<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cta_Sections extends Model
{
    use HasFactory;

    protected $fillable = ['quote', 'button_text', 'image_src', 'image_alt'];
}

