<?php

use App\Http\Controllers\ShortenUrlController;
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
    return Inertia::render('Index');
})->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('u')->group(function () {
    Route::get('/', [ShortenUrlController::class, 'create'])
        ->name('url.shorten');

    Route::post('/', [ShortenUrlController::class, 'store'])
        ->name('url.submit');
});

require __DIR__.'/auth.php';
