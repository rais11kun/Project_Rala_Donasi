<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Total donasi per bulan
    $donationsPerMonth = Donation::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(amount) as total')
    )
    ->where('status', 'approved')
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    return view('admin.dashboard', [
        'totalDonation' => Donation::where('status','approved')->sum('amount'),
        'totalUser' => \App\Models\User::count(),
        'donationsPerMonth' => $donationsPerMonth,
    ]);

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
