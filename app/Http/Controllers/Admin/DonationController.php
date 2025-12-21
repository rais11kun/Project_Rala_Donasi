<?php

namespace App\Http\Controllers\Admin;
use App\Models\Donation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ActivityLog;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        //
        $categories = Category::all();

    $donations = Donation::with(['user', 'category'])
        ->when($request->category_id, function ($query) use ($request) {
            $query->where('category_id', $request->category_id);
        })
        ->latest()
        ->get();

    return view('admin.donations.index', compact('donations', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function approve(Donation $donation)
    {
        $donation->update([
        'status' => 'approved'
    ]);

        ActivityLog::create([
        'user_id'  => auth()->id(),   // ⬅️ WAJIB
        'action'   => 'approve',
        'model'    => 'Donation',
        'model_id' => $donation->id,
    ]);

    return back()->with('success', 'Donasi berhasil di-approve');
    }

    public function reject(Donation $donation)
    {
        $donation->update([
        'status' => 'rejected'
    ]);

    ActivityLog::create([
        'user_id'  => auth()->id(),
        'action'   => 'reject',
        'model'    => 'Donation',
        'model_id' => $donation->id,
    ]);

    return back()->with('success', 'Donasi berhasil di-reject');
    }

    public function create()
    {
        //
        $categories = Category::all();
        return view('donasi.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'title'       => 'required',
        'amount'      => 'required|numeric|min:1000',
        'category_id' => 'required|exists:categories,id',
    ]);
        Donation::create([
        'user_id'     => auth()->id(),
        'title'       => $request->title,
        'amount'      => $request->amount,
        'note'        => $request->note,
        'category_id' => $request->category_id,
        'status'      => 'pending',
    ]);

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
