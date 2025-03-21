<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(7);
        return view('dashboard.category.index', [
            'categories' => $categories,
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
    public function store(StoreCategoryRequest $request)
    {
        try {
            //code...
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'unique:categories,slug',
            ]);
            $slug = Str::slug($validatedData['name']);
            $count = Category::where('slug', $slug)->count();
    
            if($count > 0){
                $slug = $slug . '-' . ($count+1);
            }
            
            $validatedData['slug'] = $slug;
            Category::create($validatedData);
            return redirect('/dashboard/categories')->with('success', 'Category added succesfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to add category. Please check your input.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while adding the category.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            //code...
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'slug' => 'unique:categories,slug',
            ]);
            
            // Generate the base slug
            $slug = Str::slug($validatedData['name']);
            
            // Check if slug exists and it's not the current category
            $count = Category::where('slug', $slug)
                            ->where('id', '!=', $category->id)
                            ->count();
            
            // If slug exists, append number
            if($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
            
            $validatedData['slug'] = $slug;
            
            Category::where('id', $category->id)->update($validatedData);
            
            return redirect('/dashboard/categories')->with('success', 'Category updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update category. Please check your input.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // First check for related posts (expected condition)
        if ($category->articles->count() > 0) {
            return redirect('/dashboard/categories')
                ->with('error', 'Cannot delete category with existing posts');
        }

        // Then handle the deletion with potential unexpected errors
        try {
            $category->delete();
            return redirect('/dashboard/categories')
                ->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect('/dashboard/categories')
                ->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}
