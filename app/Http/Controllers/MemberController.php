<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = DB::table('members')->paginate(7);
        return view('dashboard.members.index', [
            'members' => $members,
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
    public function store(StoreMemberRequest $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'jabatan' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|min:200|max:5120',
            ]);
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/member_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            Member::create($validatedData);
            return redirect('/dashboard/members')->with('success', 'Member added successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add member. Please check your input.');
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
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);
            if ($request->hasFile('image')) {
                // Delete old image
                if ($member->image) {
                    Storage::delete('public/member_images/' . $member->image);
                }
    
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/member_images', $imageName);
                $validatedData['image'] = $imageName;
            }

            $member->update($validatedData);
            return redirect('/dashboard/members')->with('success', 'Member updated successfully');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update member. Please check your input.');
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
    public function destroy(Member $member)
    {
        try {
            // Delete the associated image file if it exists
            if ($member->image) {
                Storage::delete('public/member_images/' . $member->image);
            }
            // Delete the member from the database
            $member->delete();
            return redirect('/dashboard/members')->with('success', 'Member deleted successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'An error occurred while deleting the member. Please try again.');
        }
    }
}
