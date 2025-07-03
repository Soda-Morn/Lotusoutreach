<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyGirl extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'page',
        'title',
        'content',
        'image',
        'page_content_id',
    ];
    public function pageContent()
    {
        return $this->belongsTo(PageContent::class, 'page_content_id');
    }
}
