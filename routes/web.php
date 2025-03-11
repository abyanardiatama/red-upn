<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\MerchOrderController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectedIfNotAuthenticated;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'login'])
    ->middleware(RedirectIfAuthenticated::class)->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('/login', [LoginController::class, 'autenthicate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/events', [HomeController::class, 'events']);

Route::get('/articles', [HomeController::class, 'articles']);
Route::get('/articles/{slug}', [HomeController::class, 'showArticle']);
Route::get('/articles/categories/{slug}', [HomeController::class, 'showCategory']);

Route::get('/merchandises', [HomeController::class, 'merchandises']);
Route::post('/merchandises/order', [HomeController::class, 'orderMerch']);



// Route::resource('/dashboard/articles', ArticleController::class);
// Route::resource('/dashboard/categories', CategoryController::class);
// Route::resource('/dashboard/events', EventController::class);
// Route::resource('/dashboard/members', MemberController::class);
// Route::resource('/dashboard/users', UserController::class);
// Route::resource('/dashboard/carousels', JumbotronController::class);
// Route::resource('/dashboard/merchandises', MerchandiseController::class);
// Route::resource('/dashboard/orders', MerchOrderController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/profile', [DashboardController::class, 'profile']);
    Route::resource('/dashboard/articles', ArticleController::class);
    Route::post('/dashboard/articles/upload', [ArticleController::class, 'upload'])->name('ckeditor.upload');
    Route::post('/dashboard/articles/delete-image', [ArticleController::class, 'deleteImage'])->name('ckeditor.delete-image');
    Route::get('/dashboard/about', [AboutController::class, 'edit']);
    Route::put('/dashboard/about', [AboutController::class, 'update']);
    Route::resource('/dashboard/categories', CategoryController::class);
    Route::resource('/dashboard/events', EventController::class);
    Route::resource('/dashboard/members', MemberController::class);
    Route::resource('/dashboard/users', UserController::class);
    Route::resource('/dashboard/carousels', JumbotronController::class);
    Route::resource('/dashboard/merchandises', MerchandiseController::class);
    Route::resource('/dashboard/orders', MerchOrderController::class);
});
