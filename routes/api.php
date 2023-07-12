<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('dogs', 'DogController@index')->name('dogs.index');
Route::post('dogs', 'DogController@store')->name('dogs.store');
Route::put('dogs/{id}', 'DogController@update')->name('dogs.update');
Route::get('breeds', 'BreedController@index')->name('breeds.index');
Route::get('colors', 'ColorController@index')->name('colors.index');
Route::get('sizes', 'SizeController@index')->name('sizes.index');
