<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PostController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Resource_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//PageController
Route::get('/home', [PageController::class, 'home'])->name('home');
//

//AdminController
Route::get('/admin', [AdminController::class, 'index']);
//


// HomeController
Route::post('/delete-user/{id}', [HomeController::class, 'del_user'])->name('delete-user');
//

// PostsController
Route::post('/delete-post/{id}', [PostController::class, 'destroy'])->name('delete-post');
Route::get('/edit-post/{id}', [PostController::class, 'edit'])-> name('edit-post');
Route::post('/update-post/{id}', [PostController::class, 'update'])-> name('update-post');
Route::get('/view_post/{id}', [PostController::class, 'show'])->name('view-single');
Route::get('/createPost',[PostController::class, 'create'])->name('createPost');
Route::post('/add-post',[PostController::class, 'store'])->name('add-post');
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/profile/{id}', [PostController::class, 'profile'])->name('view-profile');
//
//CommentController
// Route::post('/add-comment', [CommentController::class, 'create'])->name('add-comment');
Route::post('/add-comment', [CommentController::class, 'store'])->name('post-comment');
Route::post('/delete-comment/{id}', [CommentController::class, 'destroy'])->name('delete-comment');
//

//RegisterController
Route::get('/upload-profile-pic/{id}', [HomeController::class, 'edit']);
Route::post('/upload/{id}', [HomeController::class, 'update']);
//


