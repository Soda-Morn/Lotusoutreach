<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    use HasFactory;

    protected $fillable = ['page_content_id', 'src', 'alt'];

    public function pageContent()
    {
        return $this->belongsTo(PageContents::class);
    }
}
