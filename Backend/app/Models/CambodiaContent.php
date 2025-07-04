<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CambodiaContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'content',
        'image_path',
        'page_content_id'
    ];

    protected $appends = [
        'image_url',
        'create_date',
        'update_date'
    ];

    // Relationships
    public function pageContent()
    {
        return $this->belongsTo(PageContent::class, 'page_content_id');
    }

    // Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    // Accessor for formatted created_at
    public function getCreateDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('D, d M Y') : null;
    }

    // Accessor for formatted updated_at
    public function getUpdateDateAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('D, d M Y') : null;
    }
}
