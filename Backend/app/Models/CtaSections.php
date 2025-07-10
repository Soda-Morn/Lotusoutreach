<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtaSections extends Model
{
    use HasFactory;

    protected $fillable = ['quote', 'button_text', 'image_src', 'image_alt'];
}
