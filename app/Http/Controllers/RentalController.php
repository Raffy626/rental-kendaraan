<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Illuminate\Support\days;

class RentalController extends Controller
{
    public function store(Request $request, Kendaraan $kendaraan) 
    {
        $request->validate([
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rental_date',
        ]);

        // menghitung lama sewanya
        $days = Carbon::parse($request->rental_date)
        ->diffInDays(Carbon::parse($request->return_date)) + 1;

        $totalPrice = $days * $kendaraan->rental_price;

        Rental::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $kendaraan->id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
            'total_price' => $totalPrice,
            'payment_status' => 'unpaid',
            'rental_status' => 'ongoing',
        ]);

        //update status kendaraan
        $kendaraan->update([
            'status' => 'rented',
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan rental');
    }
}
