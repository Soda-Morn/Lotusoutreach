<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function whyGirl()
    {
        return $this->belongsTo(WhyGirl::class, 'why_girls_id');
    }

    public function programDetail()
    {
        return $this->hasMany(ProgramDetail::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);  
    }
    
    public function getCreateDateAttribute($value)
    {
       return $this->created_at ? $this->created_at->format('D, d M Y') : null;
    }

    public function getUpdateDateAttribute($value)
    {
        return $this->updated_at ? $this->updated_at->format('D, d M Y') : null;
    }

    // Add this accessor for image URL
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    // Add this to automatically append image_url to JSON
    protected $appends = ['image_url', 'create_date', 'update_date'];

    protected $fillable = ['title', 'description', 'image_path', 'why_girls_id'];
}