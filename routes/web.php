<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PostController;

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

/* Route::get('/', function(){
    return view('welcome');
}); */

Route::get('/', [PageController::class, 'posts']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('blog/{post:slug}', [PageController::class, 'post'])->name('post');

Route::resource('/posts', PostController::class)
->middleware('auth')
->except('show');