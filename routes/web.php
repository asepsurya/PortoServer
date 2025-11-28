<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TokenUser;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/tokens', [TokenUser::class, 'index'])->name('tokens.index');
    Route::post('/tokens/create', [TokenUser::class, 'create'])->name('tokens.create');
    Route::delete('/tokens/{id}', [TokenUser::class, 'destroy'])->name('tokens.destroy');
    Route::post('/logout', [AuthApiController::class, 'logout'])->name('logout');

});

Route::get('/contact', [AuthApiController::class, 'contact'])->name('contact');
Route::get('/about', [AuthApiController::class, 'about'])->name('about');
Route::get('/portofolio', [AuthApiController::class, 'porto'])->name('porto');
Route::get('/blog', [AuthApiController::class, 'blog'])->name('blog');
Route::get('/detail', [AuthApiController::class, 'detail'])->name('detail');
Route::get('/login', [AuthApiController::class, 'showLoginForm'])->name('login');
Route::get('/mocup', [AuthApiController::class, 'mocup'])->name('mocup');
Route::post('/login', [AuthApiController::class, 'login'])->name('login.process');
