<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class StaffEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = \App\Models\Event::all();
        // Sesuaikan dengan folder: staff/kelola_Event
        return view('staff.kelola_Event.index', compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('staff.kelola_Event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
        }

        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $nama_file ?? null,
        ]);

        return redirect()->route('staff.events.index')->with('success', 'Event berhasil dipublikasikan!');
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
        $event = \App\Models\Event::findOrFail($id);
        return view('staff.kelola_Event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $event = \App\Models\Event::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path('asset-landing/img/' . $event->image))) {
                unlink(public_path('asset-landing/img/' . $event->image));
            }
            
            $file = $request->file('image');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('asset-landing/img'), $nama_file);
            $event->image = $nama_file;
        }

        $event->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('staff.events.index')->with('success', 'Event berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
