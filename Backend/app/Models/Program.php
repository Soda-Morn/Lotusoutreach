<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    function whyGirl(){
        return $this->belongsTo(WhyGirl::class);
    }
    function programDetail(){
        return $this->hasMany(ProgramDetail::class);
    }
    function partners(){
        return $this->hasMany(Partner::class);  
    }
    protected $fillable = ['why_girl_id', 'title', 'description', 'image_path'];

}
