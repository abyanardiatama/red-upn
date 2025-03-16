<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class PaymentController extends Controller
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
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $payment = Payment::first();
        return view('dashboard.payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        try {
            $payment = Payment::first();
            $validated = $request->validated();
            if ($request->hasFile('image')) {
                if ($payment->barcode) {
                    Storage::delete('public/payment_image/' . $payment->barcode);
                }
                $image = $request->file('image');
                $image_name = time() . '.' . $image->extension();
                $image->storeAs('public/payment_image', $image_name);
                $validated['barcode'] = $image_name;
            }else {
                // Jika tidak ada gambar baru, gunakan gambar lama
                $validated['barcode'] = $payment->barcode;
            }
            $payment->update($validated);
            return redirect("/dashboard/payment")->with('success', 'Payment updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // return redirect("/dashboard/payment")->with('error', 'Payment failed to update');
            return redirect("/dashboard/payment")->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
