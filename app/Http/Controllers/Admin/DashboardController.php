<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $totalDonasi = Donation::where('status', 'approved')->sum('amount');
        $donasiPending = Donation::where('status', 'pending')->count();
        $donasiRejected = Donation::where('status', 'rejected')->count();
        $totalTransaksi = Donation::count();
        $totalDonatur = User::whereIn('role', ['guest', 'staff'])->count();

        return view('admin.dashboard', compact(
            'totalDonasi',
            'donasiPending',
            'donasiRejected',
            'totalTransaksi',
            'totalDonatur'
            
        ));

        
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
