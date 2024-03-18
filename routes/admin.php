<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\InvitationTypeController;
use App\Http\Controllers\Admin\InvitationTypeTemplateController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class , 'login']);
Route::post('logout', [LoginController::class , 'logout'])->name('logout');

Route::group(['middleware' => ['auth:web']], function() {

    //dashboard route
    Route::get('/', [HomeController::class, 'index'])->name('index');

    /**
     * packages routes
     */
    Route::name('packages.')->prefix('packages')->group(function (){
        Route::get('/' , [PackageController::class , 'index'])->name('index');
        Route::get('/edit/{id}' , [PackageController::class , 'edit'])->name('edit');
        Route::post('/store' , [PackageController::class , 'store'])->name('store');
        Route::put('/update/{id}' , [PackageController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [PackageController::class , 'destroy'])->name('delete');
    });

    /**
     * faqs routes
     */
    Route::name('faqs.')->prefix('faqs')->group(function (){
        Route::get('/' , [FaqController::class , 'index'])->name('index');
        Route::get('/edit/{id}' , [FaqController::class , 'edit'])->name('edit');
        Route::post('/store' , [FaqController::class , 'store'])->name('store');
        Route::put('/update/{id}' , [FaqController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [FaqController::class , 'destroy'])->name('delete');
    });

    /**
     * features routes
     */
    Route::name('features.')->prefix('features')->group(function (){
        Route::get('/' , [FeatureController::class , 'index'])->name('index');
        Route::get('/edit/{id}' , [FeatureController::class , 'edit'])->name('edit');
        Route::post('/store' , [FeatureController::class , 'store'])->name('store');
        Route::put('/update/{id}' , [FeatureController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [FeatureController::class , 'destroy'])->name('delete');
    });

    /**
     * testimonials routes
     */
    Route::name('testimonials.')->prefix('testimonials')->group(function (){
        Route::get('/' , [TestimonialController::class , 'index'])->name('index');
        Route::get('/edit/{id}' , [TestimonialController::class , 'edit'])->name('edit');
        Route::post('/store' , [TestimonialController::class , 'store'])->name('store');
        Route::put('/update/{id}' , [TestimonialController::class , 'update'])->name('update');
        Route::delete('/delete/{id}' , [TestimonialController::class , 'destroy'])->name('delete');
    });

    /**
     * testimonials routes
     */
    Route::name('invitations.')->prefix('invitations')->group(function (){
        
        Route::get('/' , [InvitationController::class , 'index'])->name('index');
        Route::get('/show/{id}' , [InvitationController::class , 'show'])->name('show');
        Route::delete('/delete/{id}' , [InvitationController::class , 'destroy'])->name('delete');

        Route::name('types.')->prefix('types')->group(function (){
            Route::get('/' , [InvitationTypeController::class , 'index'])->name('index');
            Route::get('/edit/{id}' , [InvitationTypeController::class , 'edit'])->name('edit');
            Route::post('/store' , [InvitationTypeController::class , 'store'])->name('store');
            Route::put('/update/{id}' , [InvitationTypeController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [InvitationTypeController::class , 'destroy'])->name('delete');
        });

        Route::name('templates.')->prefix('templates')->group(function (){
            Route::get('/' , [InvitationTypeTemplateController::class , 'index'])->name('index');
            Route::get('/edit/{id}' , [InvitationTypeTemplateController::class , 'edit'])->name('edit');
            Route::post('/store' , [InvitationTypeTemplateController::class , 'store'])->name('store');
            Route::put('/update/{id}' , [InvitationTypeTemplateController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [InvitationTypeTemplateController::class , 'destroy'])->name('delete');
        });
    });

    /**
     * terms and conditions routes
     */
    Route::name('terms.')->prefix('terms-and-conditions')->group(function (){
        Route::get('/' , [TermsController::class , 'index'])->name('index');
        Route::put('/update' , [TermsController::class , 'update'])->name('update');
    });

    /**
     * users routes
     */
    Route::name('users.')->prefix('users')->group(function (){
        Route::get('/' , [UserController::class , 'index'])->name('index');
        Route::delete('/delete/{id}' , [UserController::class , 'destroy'])->name('delete');
    });
});