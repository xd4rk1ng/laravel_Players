<?php


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

Route::get('/', 'PlayerController@index');
Route::get('/home', function () {
    return redirect('/');
});

Route::get('/players/export', "PlayerController@export")->name('players.export');
Route::post('/players/import', "PlayerController@import")->name('players.import');

Route::get('/players', 'PlayerController@index')->name('players.index');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/players/create', 'PlayerController@create')->name('players.create');
        Route::post('/players', 'PlayerController@store')->name('players.store');
    });

    Route::get('/players/{player}/edit', 'PlayerController@edit')->name('players.edit');
    Route::put('/players/{player}', 'PlayerController@update')->name('players.update');
    Route::delete('/players/{player}', 'PlayerController@destroy')->name('players.destroy');
});

Route::get('/players/{player}', 'PlayerController@show')->name('players.show');


Auth::routes();

