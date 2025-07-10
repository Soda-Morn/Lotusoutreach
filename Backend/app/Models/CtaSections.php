<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:Backend/app/Models/cta_sections.php
class CtaSection extends Model
=======
class CtaSections extends Model
>>>>>>> 675e334cdf14afab07394ea3fabd41a1c55fc840:Backend/app/Models/CtaSections.php
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
