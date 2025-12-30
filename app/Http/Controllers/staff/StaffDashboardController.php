<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDonation; 
use App\Models\Volunteer;
use App\Models\Contact;

class StaffDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Mengambil data ringkasan untuk widget dashboard
        $data = [
            'total_donations'   => CategoryDonation::sum('amount'),
            'total_volunteers'  => Volunteer::count(),
            'total_contacts'    => Contact::count(),
            'recent_donations'  => CategoryDonation::latest()->take(5)->get(),
            'recent_contacts'   => Contact::latest()->take(3)->get(),
            'recent_volunteers' => Volunteer::latest()->take(5)->get(),
        ];

        return view('staff.dashboard', $data); // Mengarah ke views/staff/dashboard.blade.php
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
