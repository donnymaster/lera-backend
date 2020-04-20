<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('root');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('feedback', 'FeedbackController');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::resource('broadcasts', 'BroadcastController');

    Route::resource('players', 'PlayersController');

    Route::resource('teams', 'TeamsController');

    Route::resource('user', 'UserController');

});
