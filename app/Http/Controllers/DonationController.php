<?php

namespace App\Http\Controllers;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
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
        return view('donations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'  => 'required|string|max:255',
            'amount' => 'required|numeric|min:1000',
            'note'   => 'nullable|string',
        ]);

        Donation::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'amount'  => $request->amount,
            'note'    => $request->note,
            'status'  => 'pending',
        ]);

        return redirect('/')->with('success', 'Donasi berhasil dikirim');
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
