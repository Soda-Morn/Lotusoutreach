<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApproachTab extends Model
{
    use HasFactory;

    protected $fillable = ['approach_id', 'key', 'title', 'content'];

    public function approach()
    {
        return $this->belongsTo(Approach::class);
    }
}
