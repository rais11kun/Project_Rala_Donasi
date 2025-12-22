<?php

namespace App\Http\Controllers;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $donations = Donation::latest()->get();
        return view('donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('donations.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'amount' => 'required|numeric|min:1000',
            'note'   => 'nullable|string',
            ]);

            $path = null;

            if ($request->hasFile('proof_image')) {
                $path = $request->file('proof_image')
                            ->store('donation_proofs', 'public');
            }

            \App\Models\Donation::create([
            'user_id' => auth()->id(),
            'title'   => $validated['title'],
            'category_id' => $request->category_id,
            'amount'  => $validated['amount'],
            'note'    => $validated['note'] ?? null,
            'proof_image' => $path,
            'status'  => 'pending',
            ]);

        return redirect()->back()->with('success', 'Donasi berhasil dikirim');
    }

        public function showByCategory($category)
    {
        $allowed = ['food', 'health', 'education'];
    if (!in_array($category, $allowed)) {
        abort(404);
    }

    return view('donations.category', compact('category'));
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
