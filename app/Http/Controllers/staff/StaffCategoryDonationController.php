<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDonation;

class StaffCategoryDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = \App\Models\CategoryDonation::all();
        // Sesuaikan dengan folder: staff/donasi_category
        return view('staff.donasi_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('staff.donasi_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses Upload Gambar ke public/asset-landing/img/
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
        }

        CategoryDonation::create([
            'name' => $request->name,
            'image' => $nama_file ?? null,
        ]);

        return redirect()->route('staff.donations.index')->with('success', 'Kategori berhasil ditambahkan!');
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
        $category = \App\Models\CategoryDonation::findOrFail($id);
        return view('staff.donasi_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = \App\Models\CategoryDonation::findOrFail($id);
    
         if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($category->image && file_exists(public_path('asset-landing/img/' . $category->image))) {
                unlink(public_path('asset-landing/img/' . $category->image));
            }
            
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
            $category->image = $nama_file;
            }

            $category->name = $request->name;
            $category->save();

            return redirect()->route('staff.donations.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
