<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImpactStat extends Model
{
    use HasFactory;

    protected $fillable = ['page_content_id', 'key', 'text', 'value', 'suffix', 'color'];

    public function pageContent()
    {
        return $this->belongsTo(PageContent::class);
    }
}

