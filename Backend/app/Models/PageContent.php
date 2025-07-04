<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'content',
        'image_path',
    ];

    // Relationships
    public function whyGirl()
    {
        return $this->hasOne(WhyGirl::class);
    }
    public function CambodiaContent()
    {
        return $this->hasOne(NewContent::class);
    }
    public function NewContent()
    {
        return $this->hasMany(NewContent::class);
    }
    public function AboutContent()
    {
        return $this->hasMany(AboutContent::class);
    }

    // Accessor for image URL
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

    // Automatically append these attributes to JSON
    protected $appends = ['image_url', 'create_date', 'update_date'];
}