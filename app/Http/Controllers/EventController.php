<?php

namespace App\Http\Controllers;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function daftarRelawan($event_id)
    {
    // Menampilkan halaman pendaftaran khusus untuk event yang dipilih
    return view('volunteer.register', compact('event_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // 1. Validasi
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'nama'     => 'required|string|max:255',
        'whatsapp' => 'required|string|max:20',
        'alasan'   => 'nullable|string',
    ]);

    // 2. Simpan Permanen ke Database
    Volunteer::create([
        'event_id' => $request->event_id,
        'nama'     => $request->nama,
        'whatsapp' => $request->whatsapp,
        'alasan'   => $request->alasan,
    ]);

    // 3. Redirect dengan pesan sukses
    return redirect('/')->with('success', 'Terima kasih! Data Anda telah tersimpan secara permanen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
