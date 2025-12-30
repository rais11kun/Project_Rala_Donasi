<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $donations = \App\Models\CategoryDonation::orderBy('created_at', 'desc')->get();
        return view('staff.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function verify($id) {
        $donation = \App\Models\CategoryDonation::findOrFail($id);
        $donation->update(['status' => 'success']);

        // Update juga nominal "Raised" di tabel Campaign jika status jadi success
        $campaign = \App\Models\Campaign::find($donation->campaign_id);
        if ($campaign) {
            $campaign->increment('raised', $donation->amount);
        }

        return back()->with('success', 'Donasi telah berhasil diverifikasi!');
    }
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
