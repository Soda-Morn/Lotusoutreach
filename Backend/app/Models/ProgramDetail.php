<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    use HasFactory;
    function program()
    {
        return $this->belongsTo(Program::class);
    }
    function donation()
    {
        return $this->hasMany(Donation::class);
    }
    protected $fillable = ['program_id', 'detail_content'];
    
}
