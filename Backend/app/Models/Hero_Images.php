<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero_Images extends Model
{
    use HasFactory;

    protected $fillable = ['page_content_id', 'src', 'alt'];

    public function pageContent()
    {
        return $this->belongsTo(PageContents::class);
    }
}


