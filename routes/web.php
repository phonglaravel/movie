<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[IndexController::class, 'index'] );
Route::get('/danh-muc/{slug}',[IndexController::class, 'category'])->name('page.category');
Route::get('/the-loai/{slug}',[IndexController::class, 'genre'])->name('page.genre');
Route::get('/quoc-gia/{slug}',[IndexController::class, 'country'])->name('page.country');
Route::get('/phim/{slug}',[IndexController::class, 'movie'])->name('page.movie');
Route::get('/nam/{slug}',[IndexController::class, 'year'])->name('page.year');
Route::get('/xem-phim/{slug_movie}/{tap}',[IndexController::class, 'watch'])->name('page.watch');
Route::get('/episode',[IndexController::class, 'episode'])->name('page.episode');
Route::get('/tag/{tag}',[IndexController::class, 'tag'])->name('page.tag');
Route::get('/search',[IndexController::class, 'search'])->name('page.search');

Route::post('/hot',[MovieController::class,'hot']);
Route::post('/new',[MovieController::class,'new']);
Route::post('/year',[MovieController::class,'year']);


Auth::routes();

Route::get('/admincp', [App\Http\Controllers\HomeController::class, 'admincp'])->name('admincp');

Route::resource('/admincp/category', CategoryController::class);
Route::resource('/admincp/genre', GenreController::class);
Route::resource('/admincp/country', CountryController::class);
Route::resource('/admincp/movie', MovieController::class);
Route::resource('/admincp/episode', EpisodeController::class);
