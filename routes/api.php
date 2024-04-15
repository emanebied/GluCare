<?php

use App\Http\Controllers\Apis\Auth\ConfirmPasswordController;
use App\Http\Controllers\Apis\Auth\EmailVerificationController;
use App\Http\Controllers\Apis\Auth\ForgotPasswordController;
use App\Http\Controllers\Apis\Auth\LoginController;
use App\Http\Controllers\Apis\Auth\ProfileController;
use App\Http\Controllers\Apis\Auth\RegisterController;
use App\Http\Controllers\Apis\Auth\ResetPasswordController;
use App\Http\Controllers\Apis\Dashboard\RolesAndPermissionsController;
use App\Http\Controllers\Apis\Dashboard\UserController;
use App\Http\Controllers\Apis\Dashboard\WebsiteSettingController;
use App\Http\Controllers\Apis\NotificationController;
use App\Http\Controllers\Apis\Website\Blog\CategoryController;
use Illuminate\Support\Facades\Route;


// User routes
//  Route::group(['prefix'=>'users'],function() {

        Route::group(['middleware' => 'guest:sanctum'], function () {
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

     Route::middleware(['role:admin','auth:sanctum'])->group(function () {

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

    /*  Route::get('/preview-mail', function () {
        $user = App\Models\User::findOrFail(73);
       return (new App\Notifications\VerificationMailNotification($user))
           ->toMail($user);
        });*/


        Route::group(['prefix' => 'notifications', 'middleware' => 'auth:sanctum'], function () {
            Route::get('/', [NotificationController::class, 'getUserNotifications']);
            Route::get('details/{notificationId}', [NotificationController::class, 'getNotificationDetails']);
            Route::post('/mark-as-read/{notificationId}', [NotificationController::class, 'markNotificationAsRead']);
            Route::delete('destroy/{notificationId}', [NotificationController::class, 'deleteNotification']);
        });


        Route::prefix('categories')->group(function () {
            Route::middleware(['role:admin','auth:sanctum'])->group(function () {
                Route::post('/store', [CategoryController::class, 'store']);
                Route::put('/update/{category}', [CategoryController::class, 'update']);
                Route::delete('/destroy/{category}', [CategoryController::class, 'destroy']);
            });
            //  accessible to all users
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/show/{category}', [CategoryController::class, 'show']);
        });











/*    Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum', 'role:admin'], function () {
Route::post('/store', [PostController::class, 'store']);
Route::put('update/{post}', [PostController::class, 'update']);
Route::delete('/destroy/{post}', [PostController::class, 'destroy']);
      Route::get('/posts', [PostController::class, 'index']);
        Route::get('/posts/{post}', [PostController::class, 'show']);
*/
