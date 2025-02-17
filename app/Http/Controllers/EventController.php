<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')->paginate(7);
        return view('dashboard.events.index', [
            'events' => $events,
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
    public function store(StoreEventRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|min:200|max:5120' // max 5MB
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/event-images', $imageName);
                $validatedData['image'] = $imageName;
            }
            Event::create($validatedData);
            // return redirect()->route('events.index')->with('success', 'Event created successfully.');
            return redirect('/dashboard/events')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating the event.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try{
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required',
                'image' => 'nullable|image|file|max:5120' // max 5MB
            ]);
    
            // Check if a new image is uploaded
            if ($request->hasFile('image')) { 
                // Delete old image if it exists
                if ($event->image) {
                    // Ensure the path is correct for deletion
                    Storage::delete('public/event-images/' . $event->image);
                }
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/event-images/', $imageName);
                $validatedData['image'] = $imageName; // Set the new image name
            } else {
                // If no new image is uploaded, retain the existing image
                $validatedData['image'] = $event->image; // Retain the existing image
            }
    
            // Update the event with the validated data
            $event->update($validatedData);
            return redirect('/dashboard/events')->with('success', 'Event updated successfully');
        }
        catch(\Exception $e){
            return back()->withInput()->with('error', 'An error occurred while updating the event.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            if ($event->image) {
                Storage::delete('public/event-images/' . $event->image);
            }
    
            // Delete the member from the database
            $event->delete();
    
            return redirect('/dashboard/events')->with('success', 'Event deleted successfully');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the event.');
        }
    }
}
