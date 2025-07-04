<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyGirl extends Model
{
    use HasFactory;
    
    public function pageContent()
    {
        return $this->belongsTo(PageContent::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
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

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    // Automatically append these attributes to JSON
    protected $appends = ['image_url', 'create_date', 'update_date'];

    protected $fillable = ['page', 'title', 'content', 'image_path', 'page_content_id'];
}