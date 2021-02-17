<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'ArticleController@index_home');

// Route untuk greetings page
Route::get('/greetings', function () {
    return view('greetings');
});

// Route untuk home page
Route::get('/home', 'ArticleController@index_home');

// Route untuk blog (my articles)
Route::get('/blog', 'ArticleController@getArticleByUser');
// Route untuk create article
Route::post('/blog/{article}', 'ArticleController@store');
// Route untuk destroy article
Route::delete('/blog/{article}', 'ArticleController@destroy');
// Route untuk destroy article (admin)
Route::delete('/blog/admin/{article}', 'ArticleController@destroyed_by_admin');
// Route untuk tampilin form create article
Route::get('/blog/create', 'ArticleController@create');
// Route untuk detail article
Route::get('/blog/{article}', 'ArticleController@getArticleDetail')->name('article_detail');
// Route untuk tampilin article by category
Route::get('/blog/category/{category}', 'ArticleController@show_by_category')->name('article_by_category');
// Route untuk tampilin form untuk update profile user
Route::get('/profile', 'UserController@edit')->name('edit_profile');
// Route untuk update profile user
Route::patch('/profile/update/{id}', 'UserController@update');

// Route untuk tampilin all user
Route::get('/alluser','UserController@index');
// Route untuk hapus user
Route::delete('/alluser/{user}', 'UserController@destroy');

// Route yang menampilkan page about us
Route::get('/about_us',function() {
    return view('about_us');
});



Auth::routes();
