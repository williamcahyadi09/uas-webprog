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
Route::get('/greetings', function () {
    return view('greetings');
});
Route::get('/home', 'ArticleController@index_home');

Route::get('/blog', 'ArticleController@getArticleByUser');
Route::post('/blog/{article}', 'ArticleController@store');
Route::delete('/blog/{article}', 'ArticleController@destroy');
Route::delete('/blog/admin/{article}', 'ArticleController@destroyed_by_admin');
Route::get('/blog/create', 'ArticleController@create');
Route::get('/blog/{article}', 'ArticleController@getArticleDetail')->name('article_detail');
Route::get('/blog/category/{category}', 'ArticleController@show_by_category')->name('article_by_category');

Route::get('/profile', 'UserController@edit')->name('edit_profile');
Route::patch('/profile/update/{id}', 'UserController@update');

Route::get('/alluser','UserController@index');
Route::delete('/alluser/{user}', 'UserController@destroy');

Route::get('/about_us',function() {
    return view('about_us');
});



Auth::routes();
