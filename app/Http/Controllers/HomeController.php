<?php

namespace App\Http\Controllers;

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
        return view('articles',[
            'articles' => Article::paginate(9),
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
        $members = Member::all();
        return view('about',[
            'members' => $members
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
                'zip' => 'required|max:7',
                'phone' => 'required|max:15',
                'quantity' => 'required|numeric|min:1',
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
        }
        catch(\Exception $e){
            return redirect('/merchandises')->with('error', 'Order failed to add');
        }
    }
}
