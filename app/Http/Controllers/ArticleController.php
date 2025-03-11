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
            'articles' => Article::with('category')->latest()->paginate(7),
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

            // Simpan ke storage/app/public/article_images/temp
            $path = $request->file('upload')->storeAs('public/article_images/temp', $fileName);

            // Dapatkan URL file
            $url = Storage::url('article_images/temp/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded']], 400);
    }


    public function store(StoreArticleRequest $request)
    {
        try {
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
    
            //get excerpt from body with <p> tag if not, use 20 character
            // === APLIKASI EXCERPT ===
            preg_match_all('/<p>(.*?)<\/p>/s', $validatedData['body'], $matches);
            $paragraphs = collect($matches[1])
                ->map(fn($p) => trim(str_replace("\xc2\xa0", ' ', html_entity_decode(strip_tags($p)))))
                ->filter(fn($p) => !empty($p)) // Hapus yang benar-benar kosong
                ->values();

            $validatedData['excerpt'] = $paragraphs->first() ?? Str::limit(strip_tags($validatedData['body']), 20);
            
            
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/article_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            //exctract image from body
            $tempImages = function ($content) {
                preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
                if (!isset($matches[1])) {
                    return [];
                }
                return array_map(function ($url) {
                    if (str_contains($url, '/storage/article_images/temp/')) {
                        return str_replace('/storage/', '', $url);
                    }
                    return null;
                }, $matches[1]);
            };
            //get image from body
            $images = $tempImages($validatedData['body']);
            //pindahkan gambar yang ada di body dari temp ke uploads
            foreach ($images as $image) {
                $newImage = str_replace('temp', 'uploads', $image);
                Storage::move('public/' . $image, 'public/' . $newImage);
                $validatedData['body'] = str_replace($image, $newImage, $validatedData['body']);
            }
    
            //get all image from folder temp
            $tempImages = Storage::allFiles('public/article_images/temp');
            //delete all image from folder temp
            Storage::delete($tempImages);
    
            Article::create($validatedData);
            return redirect('/dashboard/articles')->with('success', 'Article created successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to create article. Please check your input.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while creating the article.');
        }
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
        try {
            $validatedData = $request->validate([
                "title" => "required|max:255",
                "category_id" => "required",
                "body" => "required",
                "image" => "image|mimes:jpeg,png,jpg,gif|min:200|max:5120",
            ]); 
    
            $validatedData['user_id'] = Auth::id();
            $validatedData['slug'] = Str::slug($validatedData['title']);
            //excerpt
            // === APLIKASI EXCERPT ===
            preg_match_all('/<p>(.*?)<\/p>/s', $validatedData['body'], $matches);
            $paragraphs = collect($matches[1])
                ->map(fn($p) => trim(str_replace("\xc2\xa0", ' ', html_entity_decode(strip_tags($p)))))
                ->filter(fn($p) => !empty($p)) // Hapus yang benar-benar kosong
                ->values();

            $validatedData['excerpt'] = $paragraphs->first() ?? Str::limit(strip_tags($validatedData['body']), 20);
    
            if ($request->hasFile('image')) {
                if ($article->image) {
                    Storage::delete('public/article_images/' . $article->image);
                }
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/article_images', $imageName);
                $validatedData['image'] = $imageName;
            }
    
            //exctract image from body
            $tempImages = function ($content) {
                preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
                if (!isset($matches[1])) {
                    return [];
                }
                return array_map(function ($url) {
                    if (str_contains($url, '/storage/article_images/temp/')) {
                        return str_replace('/storage/', '', $url);
                    }
                    return null;
                }, $matches[1]);
            };
            //get image from body
            $images = $tempImages($validatedData['body']);
            //pindahkan gambar yang ada di body dari temp ke uploads
            foreach ($images as $image) {
                $newImage = str_replace('temp', 'uploads', $image);
                Storage::move('public/' . $image, 'public/' . $newImage);
                $validatedData['body'] = str_replace($image, $newImage, $validatedData['body']);
            }
    
            //get all image from folder temp
            $tempImages = Storage::allFiles('public/article_images/temp');
            //delete all image from folder temp
            Storage::delete($tempImages);
    
            $article->update($validatedData);
            return redirect('/dashboard/articles')->with('success', 'Article updated successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Failed to update article. Please check your input.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the article.');
        }

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
