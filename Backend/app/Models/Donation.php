<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    function programDetail()
    {
        return $this->belongsTo(ProgramDetail::class);
    }
    protected $fillable = [
        'donation_amount',
        'recurring',
        'command',
        'firstName',
        'lastName',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postalCode',
        'country',
        'payment_method',
        'program_detail_id'

    ];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'amount' => 'decimal:2',  
        'program_detail_id' => 'integer'
    ];
    protected $appends = ['formatted_amount'];    
}
