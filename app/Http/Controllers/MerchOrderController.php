<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMerchOrderRequest;
use App\Http\Requests\UpdateMerchOrderRequest;
use App\Models\MerchOrder;
use App\Models\Merchandise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MerchOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.orders.index', [
            'orders' => MerchOrder::paginate(7),
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
    public function store(StoreMerchOrderRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'zip' => 'required|integer',
                'phone' => 'required|string|max:20',
                'payment_method' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|min:200|max:5120',
            ]);

            $validatedData['merch_id'] = $request->merch_id;
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/order_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            MerchOrder::create($validatedData);
            return redirect('/dashboard/orders')->with('success', 'Order added successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add order. Please check your input.');
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
    public function show(MerchOrder $merchOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MerchOrder $merchOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchOrderRequest $request, MerchOrder $order)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'zip' => 'required|integer',
                'phone' => 'required|string|max:20',
                'payment_method' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|min:200|max:5120',
            ]);
            if ($request->hasFile('image')) {
                // Delete old image
                if ($order->image) {
                    Storage::delete('public/order_images/' . $order->image);
                }
    
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/order_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            $order->update($validatedData);
            return redirect('/dashboard/orders')->with('success', 'Order updated successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update order. Please check your input.');
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
    public function destroy(MerchOrder $order)
    {
        try {
            // Delete the associated image file if it exists
            if ($order->image) {
                Storage::delete('public/order_images/' . $order->image);
            }
            // Delete the member from the database
            $order->delete();
            return redirect('/dashboard/orders')->with('success', 'Orders deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the merchandise. Please try again.');
        }
    }
}
