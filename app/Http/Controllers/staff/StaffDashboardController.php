<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDonation; 
use App\Models\Volunteer;
use App\Models\Contact;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class StaffDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Mengambil statistik untuk kotak atas
    // Jika ingin nominal uang gunakan sum('amount'), jika jumlah orang gunakan count()
    $total_donations = \App\Models\Donation::where('status', 'approved')->sum('amount');
    $total_volunteers = \App\Models\Volunteer::count();
    $total_contacts = \App\Models\Contact::count();

    // Mengambil data terbaru untuk tabel dan list
    $recent_donations = \App\Models\Donation::latest()->take(5)->get();
    $recent_contacts = \App\Models\Contact::latest()->take(5)->get();
    
    // Ambil relawan terbaru beserta relasi eventnya
    $recent_volunteers = \App\Models\Volunteer::with('event')->latest()->take(5)->get();

    return view('staff.dashboard', compact(
        'total_donations', 
        'total_volunteers', 
        'total_contacts', 
        'recent_donations', 
        'recent_contacts', 
        'recent_volunteers'
    ));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function profile()
    {
        $user = Auth::user();
        return view('staff.profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        // 1. VALIDATION FORM (Bobot 10%)
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // 2. UPLOAD FILE (Bobot 10%)
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada di folder uploads/profile
            if ($user->profile_photo && File::exists(public_path('uploads/profile/' . $user->profile_photo))) {
                File::delete(public_path('uploads/profile/' . $user->profile_photo));
            }

            $file = $request->file('photo');
            $filename = time() . '_' . str_replace(' ', '_', $user->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $filename);
            $user->profile_photo = $filename; 
        }

        $user->save();
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
    
    public function contactsIndex() {
        // Ganti dengan view pesan masuk Anda nanti
        return view('staff.contacts.index');
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
