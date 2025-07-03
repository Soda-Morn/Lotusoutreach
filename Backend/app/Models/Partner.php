<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    function program()
    {
        return $this->belongsTo(Program::class);
    }
    protected $fillable = [
        'name',
        'logo_path',
        'description',
        'program_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
