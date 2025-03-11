<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerchandiseRequest;
use App\Http\Requests\UpdateMerchandiseRequest;
use App\Models\Merchandise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchs = Merchandise::paginate(7);
        return view('dashboard.merchandise.index', compact('merchs'));
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
    public function store(StoreMerchandiseRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer|min:100',
                'image' => 'required|image|mimes:jpeg,png,jpg|min:200|max:5120',
                'status' => 'required|boolean',
                'status_active' => 'required|boolean',
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/merch_images', $imageName);
                $validatedData['image'] = $imageName;
            }
            
            Merchandise::create($validatedData);
            return redirect('/dashboard/merchandises')->with('success', 'Merchandise added successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add merchandise. Please check your input.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchandise $merchandise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchandiseRequest $request, Merchandise $merchandise)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'price' => 'required|integer|min:100',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|min:200|max:5120',
                'status' => 'required|boolean',
                'status_active' => 'required|boolean',
            ]);
            if ($request->hasFile('image')) {
                // Delete old image
                if ($merchandise->image) {
                    Storage::delete('public/merch_images/' . $merchandise->image);
                }
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/merch_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            $merchandise->update($validatedData);
            return redirect('/dashboard/merchandises')->with('success', 'Merchandise updated successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update merchandise data. Please check your input.');;
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        try {
            // Delete the associated image file if it exists
            if ($merchandise->image) {
                Storage::delete('public/merch_images/' . $merchandise->image);
            }
            // Delete the merch from the database
            $merchandise->delete();
            return redirect('/dashboard/merchandises')->with('success', 'Merchandise deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the merchandise. Please try again.');
        }
    }
}
