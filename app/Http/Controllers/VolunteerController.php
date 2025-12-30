<?php

namespace App\Http\Controllers;
use App\Models\Volunteer;
use App\Models\Event;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        // Cari data berdasarkan ID
        $event = Event::findOrFail($id);
        // Kirim ke view
        return view('volunteer.register', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi data (Input names: name, whatsapp, motivation)
        $request->validate([
            'event_id' => 'required',
            'name' => 'required',
            'whatsapp' => 'required',
            'motivation' => 'required',
        ]);

        // Simpan ke database (Column names di DB: nama, whatsapp, alasan)
        // Pastikan pemetaannya benar sesuai image_21faa5.png
        \App\Models\Volunteer::create([
            'event_id' => $request->event_id,
            'nama'     => $request->name,       // 'name' masuk ke kolom 'nama'
            'whatsapp' => $request->whatsapp,
            'alasan'   => $request->motivation, // 'motivation' masuk ke kolom 'alasan'
        ]);

        return redirect('/')->with('success', 'Terima kasih! Pendaftaran Anda berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function showRegistrationForm($id)
{
    // Ambil data event berdasarkan ID yang ada di URL (misal: /relawan/daftar/2)
    $event = \App\Models\Event::findOrFail($id);

    // Kirim variabel $event ke view agar tidak "Undefined"
    return view('volunteer.register', compact('event'));
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
