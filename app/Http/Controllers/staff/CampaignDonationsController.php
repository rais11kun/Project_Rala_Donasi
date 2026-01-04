<?php

namespace App\Http\Controllers\Staff;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampaignDonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $campaigns = Campaign::latest()->get();
        return view('staff.saluran_and_berita.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
        return view('staff.saluran_and_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Mengambil file gambar
    $file = $request->file('image');
    $nama_file = time() . "_" . $file->getClientOriginalName();

    // Pindahkan gambar langsung ke public/asset-landing
    $file->move(public_path('asset-landing.img'), $nama_file);

    \App\Models\Campaign::create([
        'title' => $request->title,
        'type' => $request->type, // Pastikan input 'type' ada di form create
        'description' => $request->description,
        'image' => $nama_file, // Simpan hanya nama filenya saja
        'goal_amount' => $request->goal_amount,
        'current_amount' => 0,
    ]);

    return redirect()->route('staff.campaigns.index')->with('success', 'Data Berhasil Disimpan');
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
