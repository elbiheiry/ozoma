<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\InvitationController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\UserContactController;
use App\Http\Controllers\Site\UserGroupController;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class , 'login']);
Route::post('logout', [LoginController::class , 'logout'])->name('logout');
Route::post('/code' , [LoginController::class , 'code'])->name('login.code');

// Registration Routes...
Route::get('register', [RegisterController::class , 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class , 'register']);

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('auth:site')->group(function (){
    Route::get('/invitation1', [InvitationController::class, 'invitation1'])->name('invitation1');
    Route::get('/invitation2/{id}', [InvitationController::class, 'invitation2'])->name('invitation2');
    Route::get('/invitation3/{id}', [InvitationController::class, 'invitation3'])->name('invitation3');
    Route::get('/invitation4/{id}', [InvitationController::class, 'invitation4'])->name('invitation4');
    Route::get('/invitation5/{id}', [InvitationController::class, 'invitation5'])->name('invitation5');
    Route::get('/invitation/show/{id}', [InvitationController::class, 'invitation'])->name('invitation');
    Route::get('/customize-invitation', [HomeController::class, 'customize'])->name('customize');
    Route::post('/upload-invitation', [HomeController::class, 'new_template'])->name('customize.new_template');

    Route::get('/invitation1/templates/{id}' , [InvitationController::class , 'templates'])->name('invitation1.templates');
    Route::post('store-invitation', [InvitationController::class, 'store'])->name('store1');
    Route::post('/update_invitation/{id}' , [InvitationController::class , 'update'])->name('invitation.update');
    Route::post('/update_invitation2/{id}' , [InvitationController::class , 'update2'])->name('invitation.update2');

    Route::get('/payment/{id}/{status}' , [InvitationController::class , 'paymentStripe'])->name('payment.index');
    Route::post('/payment/stripe/{id}/{status}' , [InvitationController::class , 'payment'])->name('payment.stripe');
});

Route::prefix('profile')->name('profile.')->middleware('auth:site')->group(function (){
    Route::get('/' , [ProfileController::class , 'index'])->name('index');
    Route::get('/settings' , [ProfileController::class , 'settings'])->name('settings');
    Route::get('/qr' , [ProfileController::class , 'qr'])->name('qr');
    Route::get('/notifications' , [ProfileController::class , 'notifications'])->name('notifications');
    
    Route::prefix('contacts')->name('contacts')->group(function (){
        Route::get('/' , [ProfileController::class , 'contact']);
        
        Route::prefix('groups')->name('.groups.')->group(function (){
            Route::post('/store' , [UserGroupController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[UserGroupController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' ,[UserGroupController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [UserGroupController::class , 'destroy'])->name('delete');
        });

        Route::prefix('contacts')->name('.contacts.')->group(function (){
            Route::post('/store' , [UserContactController::class , 'store'])->name('store');
            Route::get('/edit/{id}' ,[UserContactController::class , 'edit'])->name('edit');
            Route::put('/update/{id}' ,[UserContactController::class , 'update'])->name('update');
            Route::delete('/delete/{id}' , [UserContactController::class , 'destroy'])->name('delete');
        });
    });

    Route::post('/phone' , [ProfileController::class , 'change_phone'])->name('phone');
    Route::post('/settings' , [ProfileController::class , 'change_settings']);
    Route::delete('/delete/invitation/{id}' , [ProfileController::class , 'delete_invitation'])->name('invitation.delete');
});