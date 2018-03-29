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

Route::get('/home', 'HomeController@index')->name('dashboard');

Route::get('/u/{url}', function (App\Url $url) {
    return $url->redirect();
})->name('url.redirect');

Route::get('/u', 'URLController@showCreateForm')->name('url.form');

Route::post('/u', 'URLController@submitForm');
