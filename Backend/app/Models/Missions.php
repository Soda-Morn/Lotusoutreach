<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Missions extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function cards()
    {
        return $this->hasMany(Mission_Cards::class);
    }
}

