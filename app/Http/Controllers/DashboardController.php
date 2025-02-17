<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use App\Models\Member;
use App\Models\Article;
use App\Models\Category;
use App\Models\Jumbotron;
use App\Models\MerchOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   
        $countArticle = Article::count();
        $countMember = Member::count();
        $countUser = User::count();
        //4 articles latest
        $articles = Article::latest()->take(3)->get();
        //4 events latest
        $order = MerchOrder::latest()->take(3)->get();
        return view('dashboard.index', [
            'countArticle' => $countArticle,
            'countMember' => $countMember,
            'countUser' => $countUser,
            'articles' => $articles,
            'orders' => $order,
        ]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('dashboard.users.edit-page', [
            'user' => $user,
        ]);
    }
}
