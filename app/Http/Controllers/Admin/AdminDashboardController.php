<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Category;


class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // SUMMARY
        $totalDonations   = Donation::count();
        $totalAmount      = Donation::where('status', 'approved')->sum('amount');
        $pendingDonations = Donation::where('status', 'pending')->count();
        $approvedDonations = Donation::where('status', 'approved')->count();

        // CHART DONASI PER KATEGORI
        $donationsByCategory = Category::withCount([
            'donations as total_amount' => function ($query) {
                $query->select(DB::raw('SUM(amount)'));
            }
        ])->get();

        return view('admin.dashboard', compact(
            'totalDonations',
            'totalAmount',
            'pendingDonations',
            'approvedDonations',
            'donationsByCategory'
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
