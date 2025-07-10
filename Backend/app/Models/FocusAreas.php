<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FocusAreas extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    protected $table = 'focus_areas';

    public function cards()
    {
        return $this->hasMany(FocusCards::class);
    }
}
