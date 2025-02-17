<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Jumbotron;
use Illuminate\Support\Facades\Gate;


class UpdateJumbotronRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    //    // Check if the user is authenticated
    //     if (!Auth::check()) {
    //         return false; // Not authorized if the user is not authenticated
    //     }

    //     // Fetch the Jumbotron instance from the route parameter
    //     $carousel = Jumbotron::find($this->route('carousels')); // Ensure 'carousels' matches your route parameter

    //     // If the carousel is not found, deny access
    //     if (!$carousel) {
    //         return false; // Optionally handle the case where the carousel is not found
    //     }

    //     // Check if the authenticated user can update the Jumbotron
    //     return Gate::allows('update', $carousel);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
