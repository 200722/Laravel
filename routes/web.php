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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'PostsController@index')->name('pages.index');
Route::get('/add', 'PostsController@add');
Route::post('/store', 'PostsController@store');
Route::post('/edit/{id}', 'PostsController@edit');
Route::get('/edit/{id}', 'PostsController@editindex');
Route::post('/update', 'PostsController@update');
Route::get('/delete/{id}', 'PostsController@delete');
