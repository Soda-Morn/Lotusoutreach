<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Accessor for logo image URL
    public function getLogoUrlAttribute()
    {
        return $this->logo_path ? asset('storage/' . $this->logo_path) : null;
    }

    public function getCreateDateAttribute($value)
    {
        return $this->created_at ? $this->created_at->format('D, d M Y') : null;
    }

    public function getUpdateDateAttribute($value)
    {
        return $this->updated_at ? $this->updated_at->format('D, d M Y') : null;
    }

    protected $fillable = [
        'name',
        'logo_path',
        'description',
        'program_id'
    ];

    // Automatically append logo_url to JSON
    protected $appends = ['logo_url','create_date', 'update_date'];
}
