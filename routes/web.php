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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Controladores */
//Route::controller('blog', 'BlogController');
Route::get('/home/blog', 'BlogController@getIndex')->name('index');
Route::get('/home/blog/crud', 'BlogController@getCrud')->name('crud');
Route::get('/home/blog/crud/{id}', 'BlogController@getCrud')->name('crud');
Route::post('/home/blog/crud', 'BlogController@postCrud');
Route::get('/home/blog/ver/{id}', 'BlogController@getVer')->name('ver');
Route::get('/home/blog/eliminar/{id}', 'BlogController@getEliminar')->name('eliminar');
Route::post('/home/blog/adjuntar', 'BlogController@postAdjuntar');

