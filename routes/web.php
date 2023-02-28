<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ShortenURLController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'appName' => config('app.name'),
    ]);
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/url', function () {
        return Inertia::render('ShortenURL');
    })->name('url.new');

    Route::post('/url', [ShortenUrlController::class, 'store'])
        ->name('url.submit');

    Route::get('/image', function () {
        return Inertia::render('UploadImage');
    })->name('image.new');

    Route::post('/image', [ImageController::class, 'store'])
        ->name('image.submit');
});

Route::get('/u/{url}', [ShortenUrlController::class, 'handle'])
    ->name('url.redirect');
