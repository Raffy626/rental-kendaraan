<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();
        return view('kendaraan.index', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'plate_number' => 'required|unique:kendaraans',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
        ]);

        Kendaraan::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'plate_number' => $request->plate_number,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'rental_price' => $request->rental_price,
            'status' => 'available',
            'description' => $request->description,
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'plate_number' => 'required|unique:kendaraans,plate_number,' . $kendaraan->id,
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'rental_price' => 'required|numeric',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}
