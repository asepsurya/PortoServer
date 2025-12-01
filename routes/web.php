<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TokenUser;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\Media\MediaController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Statistik\StatistikController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/tokens', [TokenUser::class, 'index'])->name('tokens.index');
    Route::post('/tokens/create', [TokenUser::class, 'create'])->name('tokens.create');
    Route::delete('/tokens/{id}', [TokenUser::class, 'destroy'])->name('tokens.destroy');
    Route::post('/logout', [AuthApiController::class, 'logout'])->name('logout');

    // ----------------------- POST --------------------------------------------------------
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/add', [PostsController::class, 'add'])->name('posts.add');
    // ------------------------ project --------------------------------------------
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/add', [ProjectController::class, 'add'])->name('project.add');
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{slug}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update/{slug}', [ProjectController::class, 'update'])->name('project.update');
    // -------------------------Statistisk--------------------------------------------
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    // -------------------------- media ---------------------------------------------
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::post('/media/drop', [MediaController::class, 'drop'])->name('media.store.drop');
    // ---------------------- Kategori ------------------------------------
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');


});

Route::get('/contact', [AuthApiController::class, 'contact'])->name('contact');
Route::get('/about', [AuthApiController::class, 'about'])->name('about');
Route::get('/portofolio', [PortofolioController::class, 'porto'])->name('porto');
Route::get('/portfolio/filter', [PortofolioController::class, 'filter'])->name('portfolio.filter');

Route::get('/blog', [AuthApiController::class, 'blog'])->name('blog');
Route::get('/portofolio/detail/{slug}', [PortofolioController::class, 'detail'])->name('porto.detail');
Route::get('/login', [AuthApiController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::get('/mocup', [AuthApiController::class, 'mocup'])->name('mocup');
Route::post('/login', [AuthApiController::class, 'login'])->middleware('guest')->name('login.process');
