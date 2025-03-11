<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Models\Jumbotron;
use App\Models\Article;
use App\Models\Category;
use App\Models\Event;
use App\Models\Member;
use App\Models\Merchandise;
use App\Models\MerchOrder;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        $jumbotron = Jumbotron::all();
        return view('home',[
            'articles' => $articles,
            'jumbotron' => $jumbotron
        ]);
    }

    public function events() : View
    {
        return view('events',[
            'events' => Event::paginate(6),
        ]);
    }

    public function articles() : View
    {
        $articles = Article::latest()->paginate(9);
        // foreach($articles as $article){
        //     // Ambil semua paragraf dari body
        //     preg_match_all('/<p>(.*?)<\/p>/s', $article->body, $matches);
            
        //     // Filter paragraf yang tidak kosong
        //     $paragraphs = collect($matches[1])
        //         ->map(fn($p) => trim(str_replace("\xc2\xa0", ' ', html_entity_decode(strip_tags($p)))))
        //         ->filter(fn($p) => !empty($p)) // Hapus yang benar-benar kosong
        //         ->values();

        //     // Set excerpt dari paragraf pertama yang valid
        //     $article->excerpt = $paragraphs->first() ?? '';
        // }
        return view('articles',[
            'articles' => $articles,
        ]);
    }
    public function showArticle($slug)
    {
        $recentArticles = Article::orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Category::all();
        $article = Article::where('slug', $slug)->first();
        return view('show-article',[
            'article' => $article,
            'recentArticles' => $recentArticles,
            'categories' => $categories,
        ]);
    }
    public function showCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $articles = Article::where('category_id', Category::where('slug', $slug)->first()->id)->paginate(9);
        return view('show-category',[
            'category' => $category,
            'articles' => $articles,
        ]);   
    }

    public function about()
    {
        $about = About::find(1);
        $members = Member::all();
        return view('about',[
            'members' => $members,
            'about' => $about
        ]);
    }

    public function merchandises()
    {
        $merchs = Merchandise::where('status_active', 1)->paginate(6);
        return view('merchandises',[
            'merchs' => $merchs
        ]);
    }
    public function orderMerch(Request $request)
    {
        try{
            $id = $request->merch_id;
            $merch = Merchandise::find($id);
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'zip' => 'required||integer|max:7',
                'phone' => 'required|integer|max:15',
                'quantity' => 'required|integer|min:1',
                'payment_method' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            //storeAs
            $request->image->storeAs('public/order_images', $imageName);
            $validatedData['image'] = $imageName;
            $validatedData['merch_id'] = $merch->id;
    
            MerchOrder::create($validatedData);
            return redirect('/merchandises')->with('success', 'Order added successfully');
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
}
