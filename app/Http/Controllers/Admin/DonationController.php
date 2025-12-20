<?php

namespace App\Http\Controllers\Admin;
use App\Models\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $donations = Donation::with('user')->latest()->get();
        return view('admin.donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function approve(Donation $donation)
    {
        $donation->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Donasi disetujui');
    }

    public function reject(Donation $donation)
    {
        $donation->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Donasi ditolak');
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
