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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/checkout', 'BookSearchController@usercheckout')->name('usercheckout');
Route::get('/home/checkout', 'BookSearchController@viewcheckout')->name('viewcheckout');

Route::post('/booksearch', 'BookSearchController@search')->name('booksearch');
Route::get('/booksearch', 'BookSearchController@index')->name('booksearch');

Route::post('/catalog', 'BookSearchController@show')->name('datatocatalog');
Route::get('/catalog', 'BookSearchController@showall')->name('catalog');
Route::post('/catalog/delete', 'BookSearchController@deleteitem')->name('deleteitem');


Route::get('/cardholders', 'CardHoldersController@show')->name('cardholders');

