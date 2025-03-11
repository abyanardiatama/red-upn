<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAboutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        // get about with id 1
        $about = About::find(1);
        return view('dashboard.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request)
    {
        try {
            $about = About::find(1);
            $validated = $request->validated();
            if ($request->hasFile('image')) {
                if ($about->image) {
                    Storage::delete('public/about_image/' . $about->image);
                }
                $image = $request->file('image');
                $image_name = time() . '.' . $image->extension();
                $image->storeAs('public/about_image', $image_name);
                $validated['image'] = $image_name;
            }else {
                // Jika tidak ada gambar baru, gunakan gambar lama
                $validated['image'] = $about->image;
            }
            $about->update($validated);
            return redirect("/dashboard/about")->with('success', 'About updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            // return redirect("/dashboard/about")->with('error', 'About failed to update');
            return redirect("/dashboard/about")->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
