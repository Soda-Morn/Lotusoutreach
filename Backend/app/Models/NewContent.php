<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'title',
        'content',
        'image_path',
        'page_content_id',
        'publication_date',
        'author'
        
    ];
    public function pageContent()
    {
        return $this->belongsTo(pageContent::class);
    }
}
