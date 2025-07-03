<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyGirl extends Model
{
    use HasFactory;
    function program()
    {
        return $this->hasMany(Program::class);
    } 
    protected $fillable = ['page', 'title', 'content', 'image_path'];

}
