<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function return(Rental $rental)
    {
        //update rental
        $rental->update([
            'rental_status' => 'returned',
            'payment_status' => 'paid',
        ]);

        //update kendaraan
        $rental->kendaraan->update([
            'status' => 'available',
        ]);

        return redirect()->back()->with('success, Kendaraan berhasil ditambahkan');
    }
}
