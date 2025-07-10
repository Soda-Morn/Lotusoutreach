<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CtaSection extends Model
{
    use HasFactory;

    protected $table = 'cta_sections'; // Explicit table name declaration
    
    protected $fillable = [
        'quote', 
        'button_text', 
        'image_src', 
        'image_alt'
    ];
}
