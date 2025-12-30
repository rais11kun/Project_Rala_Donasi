<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        // 1. Validasi data
    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    // 2. Simpan ke database (Pastikan sudah buat Model Contact dan Migration)
    \App\Models\Contact::create($request->all());

    // 3. Kembali ke landing page dengan notifikasi
    // Ubah dari redirect()->back() menjadi ini:
    return redirect(url()->previous() . '#contact')->with('contact_success', 'Pesan Anda telah kami terima!');
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
