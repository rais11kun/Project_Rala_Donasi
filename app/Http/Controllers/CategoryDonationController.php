<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\CategoryDonation;

class CategoryDonationController extends Controller
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
    public function create(Request $request)
    {
        //
        $category = $request->query('category');
        $campaign_id = $request->query('campaign_id');
         $campaign = \App\Models\Campaign::find($campaign_id);

        // FIX: Sesuaikan dengan folder 'donations' dan file 'category'
        return view('donations.category', compact('category', 'campaign'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
    $request->validate([
        'category_id' => 'required',
        'amount' => 'nullable|numeric',
        'manual_amount' => 'nullable|numeric',
    ]);

    // Tentukan nominal
    $nominal = $request->manual_amount ?: $request->amount;

    if (!$nominal) {
        return back()->with('error', 'Silakan pilih atau masukkan nominal.');
    }

    // Simpan data ke database
    \App\Models\ConfirmedDonation::create([
        'category_donation_id' => $request->category_id,
        'donator_name' => 'Hamba Allah', // Bisa diganti input nama jika ada
        'amount' => $nominal,
        'status' => 'pending',
    ]);

    return back()->with('success', 'Konfirmasi Anda sebesar Rp ' . number_format($nominal, 0, ',', '.') . ' telah terkirim ke Staff.');
    }

    /**
     * Display the specified resource.
     */

    public function manageIncoming()
{
    // Ambil data donasi masuk beserta nama kategorinya
    $donations = \App\Models\IncomingDonation::with('category')->latest()->get();
    return view('staff.incoming.index', compact('donations'));
}

public function indexConfirmed()
{
    // Ambil data dari tabel confirmed_donations
    $donations = \App\Models\ConfirmedDonation::with('category')->latest()->get();
    
    // Sesuaikan path view ke folder kelola_donasi
    return view('staff.kelola_donasi.index', compact('donations'));
}

public function verify($id)
{
    $donation = \App\Models\ConfirmedDonation::findOrFail($id);

    if ($donation->status == 'pending') {
        // 1. Ubah status donasi jadi success
        $donation->status = 'success';
        $donation->save();

        // 2. Tambahkan nominal ke saldo 'raised' di tabel CategoryDonation
        $category = $donation->category;
        $category->raised += $donation->amount;
        $category->save();

        return back()->with('success', 'Donasi berhasil diverifikasi! Saldo program otomatis bertambah.');
    }

    return back()->with('error', 'Donasi ini sudah diverifikasi sebelumnya.');
}
    
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
