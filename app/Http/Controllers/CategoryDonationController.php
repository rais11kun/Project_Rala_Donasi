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
        // 1. Logika memilih nominal: Prioritaskan input manual jika diisi
        $finalAmount = $request->custom_nominal ?: $request->nominal;

        if (!$finalAmount || $finalAmount < 10000) {
            return back()->with('error', 'Minimal donasi adalah Rp 10.000');
        }

        // 2. Simpan ke tabel category_donations (Model baru)
        $donation = \App\Models\CategoryDonation::create([
            'campaign_id' => $request->campaign_id,
            'category'    => $request->category,
            'amount'      => $finalAmount,
            'status'      => 'pending',
        ]);

        // 3. Langsung tampilkan halaman QR (confirmation.blade.php)
        return view('donations.confirmation2', [
            'amount'   => $donation->amount,
            'category' => $donation->category
        ]);
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
