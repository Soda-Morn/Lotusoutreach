<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    public function programDetail()
    {
        return $this->belongsTo(ProgramDetail::class, 'programdetail_id');
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
        'postal_code',
        'country',
        'payment_method',
        'programdetail_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'donation_amount' => 'decimal:2',
        'programdetail_id' => 'integer'
    ];

    protected $appends = [
        'amount',
        'full_name',
        'phone_number',
        'create_date',
        'update_date'
    ];

    public function getFullNameAttribute()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }
    public function getAmountAttribute()
    {
        return number_format($this->donation_amount, 2) . '$';
    }

    public function getPhoneNumberAttribute()
    {
        $phone = preg_replace('/\D/', '', $this->phone);
        if (strlen($phone) === 9) {
            return substr($phone, 0, 3) . ' ' . substr($phone, 3, 3) . ' ' . substr($phone, 6);
        } elseif (strlen($phone) === 10) {
            return '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6);
        }
        return $this->phone;
    }
    
    public function getCreateDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('D, d M Y') : null;
    }

    public function getUpdateDateAttribute()
    {
        return $this->updated_at ? $this->updated_at->format('D, d M Y') : null;
    }
}
