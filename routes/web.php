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

Route::get('/', 'front\HomeController@index')->name('front.home');

Route::post('login/verify', 'Auth\LoginController@verify')->name('claro_auth');
Route::get('/cupones', 'front\HomeController@cupones')->name('front.cupones');
Route::get('/cupones/{categoria}', 'front\HomeController@categorias')->name('front.categoria');
Route::get('/cupones/{categoria}/{id}/{slug}','front\HomeController@detalle')->name('front.detalle');
Route::get('/buscar','front\HomeController@buscar')->name('front.buscar');

Route::get('/salir', 'front\HomeController@salir')->name('front.salir');


Route::post('/','front\HomeController@verify')->name('front.verify');
Auth::routes();

