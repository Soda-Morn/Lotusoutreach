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
    public function getCreateDateAttribute($value)
    {
        return $this->created_at ? $this->created_at->format('D, d M Y') : null;
    }

    public function getUpdateDateAttribute($value)
    {
        return $this->updated_at ? $this->updated_at->format('D, d M Y') : null;
    }

    protected $appends = ['create_date', 'update_date'];

    protected $fillable = ['program_id', 'description'];
}
