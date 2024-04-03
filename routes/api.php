<?php

use App\Http\Controllers\Apis\Auth\ConfirmPasswordController;
use App\Http\Controllers\Apis\Auth\ForgotPasswordController;
use App\Http\Controllers\Apis\Auth\LoginController;
use App\Http\Controllers\Apis\Auth\ProfileController;
use App\Http\Controllers\Apis\Auth\RegisterController;
use App\Http\Controllers\Apis\Auth\EmailVerificationController;
use App\Http\Controllers\Apis\Auth\ResetPasswordController;
use App\Http\Controllers\Apis\Dashboard\RolesAndPermissionsController;
use App\Http\Controllers\Apis\Dashboard\WebsiteSettingController;
use App\Http\Controllers\Apis\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


  // User routes
//  Route::group(['prefix'=>'users'],function() {

      Route::group(['middleware' => 'guest'], function () {
          Route::post('register', RegisterController::class);
          Route::post('login', [LoginController::class, 'login']);
          Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
      });


        Route::group(['middleware' => 'auth:sanctum'], function () {

            Route::get('send-email-verification-code', [EmailVerificationController::class, 'sendCode']);
            Route::post('check-email-verification-code', [EmailVerificationController::class, 'checkCode']);
            Route::get('resend-email-verification-code',[EmailVerificationController::class,'resendCode']);

            Route::delete('logout', [LoginController::class, 'logout']);
            Route::delete('logout-all-devices', [LoginController::class, 'logoutAllDevices']);


            Route::get('send-password-reset-code', [ConfirmPasswordController::class, 'sendCode']);
            Route::post('check-password-reset-code', [ConfirmPasswordController::class, 'checkCode']);
            Route::get('resend-password-reset-code',[ConfirmPasswordController::class,'resendCode']);
            Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);

            Route::get('/profile', [ProfileController::class,'profile']);
            Route::put('update-profile', [ProfileController::class, 'updateProfile']);
        });

     Route::middleware(['role:admin,doctor,employee','auth:sanctum'])->group(function () {

        Route::group(['prefix' => 'user-management'], function (){
            Route::group(['prefix' => 'role-permissions'], function (){
                Route::get('/', [RolesAndPermissionsController::class, 'index']);
                Route::get('/create/', [RolesAndPermissionsController::class, 'create']);
                Route::post('/store/', [RolesAndPermissionsController::class, 'store']);
                Route::get('/edit/{role_permission}', [RolesAndPermissionsController::class, 'edit']);
                Route::put('/update/{role_permission}', [RolesAndPermissionsController::class, 'update']);
                Route::delete('/{role_permission}', [RolesAndPermissionsController::class, 'destroy']);
            });
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);
                Route::get('/create', [UserController::class, 'create']);
                Route::post('/store', [UserController::class, 'store']);
                Route::get('/edit/{user}', [UserController::class, 'edit']);
                Route::put('/update/{user}', [UserController::class, 'update']);
                Route::delete('/destroy/{user}', [UserController::class, 'destroy']);
            });
        });

        Route::group(['prefix' => 'website-settings'], function () {
            Route::get('/', [WebsiteSettingController::class, 'index']);
            Route::post('/store/', [WebsiteSettingController::class, 'store']);
            Route::get('/show/{website_setting}', [WebsiteSettingController::class, 'show']);
            Route::put('/update/{website_setting}', [WebsiteSettingController::class, 'update']);
            Route::delete('/destroy/{website_setting}', [WebsiteSettingController::class, 'destroy']);
        });







    });
