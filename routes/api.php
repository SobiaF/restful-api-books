<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/books', 'App\Http\Controllers\BookController@show')->name('view.books');
Route::post('/add-book', 'App\Http\Controllers\BookController@store')->name('add.book');
Route::put('/books/{id}', 'App\Http\Controllers\BookController@update')->name('update.book');
Route::delete('books/{id}', 'App\http\controllers\BookController@destroy')->name('delete.book');