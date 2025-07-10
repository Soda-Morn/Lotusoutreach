<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description'];

    public function heroImages()
    {
        return $this->hasMany(HeroImage::class);
    }

    public function impactStats()
    {
        return $this->hasMany(ImpactStat::class);
    }
}


