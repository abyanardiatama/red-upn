<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.users.index', [
            'users' => $users,
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
    public function store(Request $request)
    {
        $image = null;
        // Initialize image variables
        $imageName = null;
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg|min:200|max:5120'
            ]);

            // Hash the password
            $validatedData['password'] = bcrypt($validatedData['password']);
            // Handle image upload
            if ($request->file('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/user_images', $imageName);
                $validatedData['image'] = $imageName;
            }

            // Create the user
            User::create($validatedData);
            return redirect('/dashboard/users')->with('success', 'User  added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add member. Please check your input.');
        } catch (\Exception $e) {
            Log::error('User  creation error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the user. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::find($user->id);
        // return view('dashboard.users.edit-page', [
        //     'user' => $user,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        try {
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email:dns|unique:users,email,' . $user->id, 
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|min:200|max:5120'
            ];
            
            $validatedData['password'] = $user->password;
            $validatedData = $request->validate($rules);
    
            if ($request->hasFile('image')) {
                // Delete old image
                if ($user->image) {
                    Storage::delete('public/user_images/' . $user->image);
                }
    
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/user_images', $imageName);
                $validatedData['image'] = $imageName;
            }
            else{
                $validatedData['image'] = $user->image;
            }
            $user->update($validatedData);
            return redirect('/dashboard/users')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            // If user has an image/avatar, delete it
            if ($user->image) {
                Storage::delete('public/user_images/' . $user->image);
            }
            // Delete the user from database
            $user->delete();

            return redirect('/dashboard/users')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the user. Please try again.');
        }
    }
}
