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
        $categories = CategoryDonation::all();
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
        // Validasi input tambahan sesuai kebutuhan Landing Page
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'label' => 'nullable|string|max:50', // Contoh: Food, Health
            'description' => 'nullable|string',
            'goal' => 'required|numeric|min:0',
            'raised' => 'nullable|numeric|min:0',
        ]);

        // Proses Upload Gambar ke public/asset-landing/img/
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
        }

        // Simpan data lengkap ke database
        CategoryDonation::create([
            'name' => $request->name,
            'image' => $nama_file ?? null,
            'label' => $request->label,
            'description' => $request->description,
            'goal' => $request->goal,
            'raised' => $request->raised ?? 0, // Default 0 jika kosong
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
        $category = CategoryDonation::findOrFail($id);
        return view('staff.donasi_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = CategoryDonation::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'label' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'goal' => 'required|numeric|min:0',
            'raised' => 'nullable|numeric|min:0',
        ]);
    
        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada di folder asset-landing/img/
            if ($category->image && file_exists(public_path('asset-landing/img/' . $category->image))) {
                unlink(public_path('asset-landing/img/' . $category->image));
            }
            
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
            $category->image = $nama_file;
        }

        // Update semua field baru
        $category->name = $request->name;
        $category->label = $request->label;
        $category->description = $request->description;
        $category->goal = $request->goal;
        $category->raised = $request->raised ?? 0;
        $category->save();

        return redirect()->route('staff.donations.index')->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = CategoryDonation::findOrFail($id);
        
        // Hapus file gambar sebelum menghapus data dari database
        if ($category->image && file_exists(public_path('asset-landing/img/' . $category->image))) {
            unlink(public_path('asset-landing/img/' . $category->image));
        }

        $category->delete();
        return redirect()->route('staff.donations.index')->with('success', 'Kategori berhasil dihapus');
    }
}
