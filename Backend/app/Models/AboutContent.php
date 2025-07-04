<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'title',
        'content',
        'image_path',
        'page_content_id'
    ];
    public function pageContent()
    {
        return $this->belongsTo(PageContent::class, 'page_content_id');
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
