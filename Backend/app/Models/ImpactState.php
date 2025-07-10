<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactState extends Model
{
    use HasFactory;
    
    protected $fillable = ['page_content_id', 'key', 'text', 'value', 'suffix', 'color'];

    public function pageContent()
    {
        return $this->belongsTo(PageContents::class);
    }
}
