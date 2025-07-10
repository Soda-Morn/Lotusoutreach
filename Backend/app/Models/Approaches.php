<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Approach extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_src', 'image_alt'];

    public function tabs()
    {
        return $this->hasMany(ApproachTab::class);
    }
}
