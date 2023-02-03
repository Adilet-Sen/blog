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

Route::get('/', 'HomeController@index');

Route::get('/about', 'HomeController@about');

Route::get('/contact', 'HomeController@contact');

Route::get('/category/{category?}/{sub_category?}','PostController@category');

Route::get('/post/{slug?}', 'PostController@getPost');

Route::get('/create', 'PostController@createView');

Route::post('/store','PostController@store');

Route::get('/edit', 'PostController@editView');

Route::post('/update', 'PostController@updatePost');
