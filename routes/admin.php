<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\ServiceController;
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


    // Services Routes
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services', 'index')->name('admin.services');
        Route::get('/add-service', 'addService')->name('add.service');
        Route::post('/store-service', 'storeService')->name('store.service');
        Route::get('/edit-service/{id}', 'editService')->name('edit.service');
        Route::post('/update-service', 'updateService')->name('update.service');
        Route::get('/delete-service/{id}', 'deleteService')->name('delete.service');
    });

});
