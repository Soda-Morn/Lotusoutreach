<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approaches extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_src', 'image_alt'];

    public function tabs()
    {
        return $this->hasMany(Approaches::class);
    }
}
