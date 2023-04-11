<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//USER
Route::get('/', function () {
    return view('home');
});

Route::controller(AuthController::class)->middleware('user.roles')->group(function () {
    Route::get('login', 'showLoginForm');
    Route::post('login', 'login')->name('login');
    Route::get('register', 'showRegisterForm');
    Route::post('register', 'register')->name('register');
    Route::get('logout', 'logout');
});

Route::controller(UserController::class)->middleware('user.roles')->group(function () {
    Route::get('user', 'showUserPage');
});

Route::controller(PostController::class)->middleware('user.roles')->group(function () {
    Route::get('post', 'showPostPage');
    Route::post('post', 'postBlog')->name('post');
    Route::get('delete-blog', 'deleteBlog')->name('delete-blog');
    Route::get('blog', 'blogDetail')->name('blog');
});

//==============================
//ADMIN
Route::controller(AdminController::class)->middleware('user.roles')->group(function () {
    Route::get('admin', 'showAdmin');
});
