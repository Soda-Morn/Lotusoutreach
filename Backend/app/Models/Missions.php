<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function cards()
    {
        return $this->hasMany(MissionCard::class);
    }
}

