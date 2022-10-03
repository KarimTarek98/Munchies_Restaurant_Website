<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\AboutMultiImages;
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

    // About Routes
    Route::controller(AboutMultiImages::class)->group(function () {
        Route::get('/about-imgs', 'index')->name('about.multi_images');
        Route::get('/add-images', 'addImages')->name('add.images');
        Route::post('/store-images', 'storeImgs')->name('store.images');
        Route::get('/change-about-img/{id}', 'changeImg')->name('change.image');
        Route::post('/update-about-img', 'updateImg')->name('update.image');
        Route::get('delete-image/{id}', 'deleteImage')->name('delete.image');
    });

    Route::get('/about', [AboutController::class, 'aboutPage'])->name('about.info');
    Route::get('/about/edit/{id}', [AboutController::class, 'editAbout'])->name('edit.about_info');
    Route::post('/update-about', [AboutController::class, 'updateAbout'])->name('update.about');

});
