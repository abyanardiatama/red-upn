<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJumbotronRequest;
use App\Http\Requests\UpdateJumbotronRequest;
use App\Models\Jumbotron;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JumbotronController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = DB::table('jumbotrons')->paginate(7);
        return view('dashboard.carousels.index', [
            'carousels' => $carousels
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
    public function store(StoreJumbotronRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'required|image|file|max:5120' // max 1MB
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/jumbotron-images', $imageName);
                $validatedData['image'] = $imageName;
            }
            Jumbotron::create($validatedData);
            // return redirect()->route('carousels.index')->with('success', 'Carousel created successfully.');
            return redirect('/dashboard/carousels')->with('success', 'Carousel added successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add carousel. Please check your input.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating the carousel.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jumbotron $jumbotron)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jumbotron $jumbotron)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJumbotronRequest $request, Jumbotron $carousel)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|min:200|max:5120' // max 1MB
            ]);
            if ($request->hasFile('image')) {
                // Delete old image
                if ($carousel->image) {
                    Storage::delete('public/jumbotron-images/' . $carousel->image);
                }
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/jumbotron-images', $imageName);
                $validatedData['image'] = $imageName;
            }
            else{
                $validatedData['image'] = $carousel->image;
            }
            $carousel->update($validatedData);
            return redirect('/dashboard/carousels')->with('success', 'Carousel updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update carousel. Please check your input.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while updating the carousel.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jumbotron $carousel)
    {
        try {
            if ($carousel->image) {
                Storage::delete('public/jumbotron-images/' . $carousel->image);
            }
            $carousel->delete();
            return redirect('/dashboard/carousels')->with('success', 'Carousel deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the carousel.');
        }
    }
}
