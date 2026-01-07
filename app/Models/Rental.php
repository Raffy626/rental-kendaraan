<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'rental_date',
        'return_date',
        'total_price',
        'payment_status',
        'rental_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'vehicle_id');
    }
}
