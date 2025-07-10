<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Focus_Areas extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    protected $table = 'focus_areas';

    public function cards()
    {
        return $this->hasMany(Focus_Cards::class);
    }
}
