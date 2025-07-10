<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApproachTabs extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'approach_tabs';

    protected $fillable = ['approach_id', 'key', 'title', 'content'];

    public function approach()
    {
        return $this->belongsTo(Approaches::class); // Make sure this model exists
    }
}
