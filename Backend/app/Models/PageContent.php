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
    protected $hidden = ['created_at', 'updated_at'];
    function whyGirl()
    {
        return $this->hasOne(WhyGirl::class);
    }
    function CambodiaContent()
    {
        return $this->hasOne(NewContent::class);
    }
    function NewContent()
    {
        return $this->hasMany(NewContent::class);
    }
    function AboutContent()
    {
        return $this->hasMany(AboutContent::class);
    }
}
