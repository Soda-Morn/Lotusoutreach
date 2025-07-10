<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageContents extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description'];

    public function heroImages()
    {
        return $this->hasMany(Hero_Images::class);
    }

    public function impactStats()
    {
        return $this->hasMany(Impact_State::class);
    }
}


