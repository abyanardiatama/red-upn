<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // get article with id 17
        return view('dashboard.articles.index', [
            'articles' => Article::latest()->paginate(7),
            'categories' => Category::all(),
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

    //  Ckeditor image upload
    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // validasi file
    //     ]);
    
    //     if ($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName . '_' . time() . '.' . $extension;
    //         $request->file('upload')->move(public_path('uploads'), $fileName);
    //         $url = asset('uploads/' . $fileName);
    
    //         return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    //     }
    
    //     return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded']], 400);
    // }
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // validasi file
        ]);

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Simpan ke storage/app/public/article_images/uploads
            $path = $request->file('upload')->storeAs('public/article_images/uploads', $fileName);

            // Dapatkan URL file
            $url = Storage::url('article_images/uploads/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded']], 400);
    }


    public function store(StoreArticleRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "title" => "required|max:255",
            "category_id" => "required",
            "body" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|min:200|max:5120",
        ]);

        $validatedData['user_id'] = Auth::id();
        // Generate the initial slug from the title
        $slug = Str::slug($validatedData['title']);
        $originalSlug = $slug; // Keep the original slug for comparison
        $count = 1;

        // Check for existing slugs and modify if necessary
        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count; // Append a number to the slug
            $count++;
        }

        $validatedData['slug'] = $slug; // Assign the unique slug to validated data

        //get excerpt from body with <p> tag if not, use 150 character
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100); 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/article_images', $imageName);
            $validatedData['image'] = $imageName;
        }

        Article::create($validatedData);
        return redirect('/dashboard/articles')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedData = $request->validate([
            "title" => "required|max:255",
            "category_id" => "required",
            "body" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|min:200|max:5120",
        ]); 

        $validatedData['user_id'] = Auth::id();
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 100);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete('public/article_images/' . $article->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/article_images', $imageName);
            $validatedData['image'] = $imageName;
        }

        $article->update($validatedData);
        return redirect('/dashboard/articles')->with('success', 'Article updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            // Fungsi untuk mendapatkan daftar gambar dari artikel
            $getRichTextImages = function ($content) {
                preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
                if (!isset($matches[1])) {
                    return [];
                }
                return array_map(function ($url) {
                    // Pastikan hanya path dari storage yang diambil
                    if (str_contains($url, '/storage/article_images/uploads/')) {
                        return str_replace('/storage/', '', $url);
                    }
                    return null;
                }, $matches[1]);
            };

            // Ambil gambar yang ada di dalam body artikel
            $images = array_filter($getRichTextImages($article->body)); // Hapus nilai null

            // Hapus semua gambar dari penyimpanan
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }

            // Hapus gambar utama artikel jika ada
            if ($article->image) {
                Storage::disk('public')->delete('article_images/' . $article->image);
            }

            // Hapus artikel dari database
            $article->delete();

            return redirect('/dashboard/articles')->with('success', 'Article deleted successfully');
        } 
        catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the article.');
        }
    }

}
