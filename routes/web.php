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

//
Route::get('/','HomeController@index');

Route::get('/admin', 'AdminController@index');

// Admin controller
Route::get('/admin/projects', 'ProjectController@index');
Route::get('/admin/projects/{project}', 'ProjectController@show');
Route::get('/admin/projects/{project}/edit', 'ProjectController@edit');
Route::post('/admin/projects', 'ProjectController@store');
Route::patch('/admin/projects/{project}', 'ProjectController@update');
Route::delete('/admin/projects/{project}', 'ProjectController@destroy');

//ImageController
Route::get('/admin/images', 'ImageController@index');
Route::get('/admin/images/{image}', 'ImageController@show');
Route::post('/admin/images/store', 'ImageController@store');
Route::get('/admin/images/{image}/edit', 'ImageController@edit');
Route::patch('/admin/images/{image}', 'ImageController@update');
Route::delete('/admin/images/{image}', 'ImageController@destroy');

// Contact
Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');

Auth::routes(['register'=>false, 'reset' => false]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/{project}','HomeController@show');
