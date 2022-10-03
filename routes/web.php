<?php

use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ServiceController;
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
    return view('app.index');
})->name('home');

Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', 'appServices')->name('services');
});

Route::get('/about', [AboutController::class, 'appAbout'])->name('about.page');

Route::get('/dashboard', function () {
    //return view('dashboard');
    return view('back.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
