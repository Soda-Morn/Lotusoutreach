<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function cards()
    {
        return $this->hasMany(Missions::class);
    }
}
