<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/profile', 'adminProfile')->name('admin.profile');
        Route::get('/edit-profile', 'editProfile')->name('edit.profile');
        Route::post('/update-profile', 'updateProfile')->name('update.profile');
        Route::get('/change-pass', 'changePass')->name('change.pass');
        Route::post('/update-pass', 'updatePass')->name('update.pass');
    });
});
