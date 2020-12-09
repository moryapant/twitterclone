<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store')->name('tweets');
    Route::get('/tweets/{tweets}', 'TweetsController@show')->name('tweets.show');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
    Route::get('/lists', 'listController@index')->name('lists');
    Route::post('/profiles/{user:name}/follow', 'FollowsController@store');
    Route::get('/profiles/{user:name}/edit', 'ProfilesController@edit');
    Route::get('/fr/', 'ProfilesController@index')->name('fr');
});

Route::get('/profiles/{user:name}', 'ProfilesController@show')->name('profile');


Auth::routes();

//Route::get('/home', 'HomeController@index');
