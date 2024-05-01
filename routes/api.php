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
use App\Http\Controllers\Apis\GluCare\Appointments\AppointmentController;
use App\Http\Controllers\Apis\GluCare\Detection\PatientData\PatientController;
use App\Http\Controllers\Apis\GluCare\Doctors\DoctorController;
use App\Http\Controllers\Apis\GluCare\LiveChat\ChatController;
use App\Http\Controllers\Apis\Notifications\NotificationController;
use App\Http\Controllers\Apis\GluCare\Blog\CategoryController;
use App\Http\Controllers\Apis\GluCare\Blog\CommentController;
use App\Http\Controllers\Apis\GluCare\Blog\LikeController;
use App\Http\Controllers\Apis\GluCare\Blog\PostController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;



// User routes
//  Route::group(['prefix'=>'users'],function() {

            Broadcast::routes(['middleware' => ['auth:sanctum']]);



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
                    Route::get('/profile', [ProfileController::class, 'profile']);
                    Route::put('update-profile', [ProfileController::class, 'updateProfile']);

             });
            /*      Route::get('/preview-mail', function () {
                            $user = App\Models\User::findOrFail(4);
                           return (new App\Notifications\PatientDataAddedNotification($user))
                               ->toMail($user);
                            });*/

            Route::group(['prefix' => 'notifications', 'middleware' => 'auth:sanctum'], function () {
                Route::get('/', [NotificationController::class, 'getUserNotifications']);
                Route::get('details/{notificationId}', [NotificationController::class, 'getNotificationDetails']);
                Route::post('/mark-as-read/{notificationId}', [NotificationController::class, 'markNotificationAsRead']);
                Route::delete('destroy/{notificationId}', [NotificationController::class, 'deleteNotification']);
            });

   // Routes for Admin Dashboard
            Route::middleware(['role:admin', 'auth:sanctum'])->group(function () {
                Route::group(['prefix' => 'user-management'], function () {
                    Route::group(['prefix' => 'role-permissions'], function () {
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




   // Routes for GluCare application
            Route::prefix('categories')->group(function () {
                Route::middleware(['role:admin'])->group(function () {
                    Route::post('/store', [CategoryController::class, 'store']);
                    Route::put('/update/{category}', [CategoryController::class, 'update']);
                    Route::delete('/destroy/{category}', [CategoryController::class, 'destroy']);
                    Route::get('/trash', [CategoryController::class, 'trash']);
                    Route::put('/restore/{category}', [CategoryController::class, 'restore']);
                    Route::delete('/force-delete/{category}', [CategoryController::class, 'forceDelete']);
                });

                Route::middleware( 'role:user,admin')->group(function () {
                    Route::get('/', [CategoryController::class, 'index']);
                    Route::get('/show/{category}', [CategoryController::class, 'show']);
                });
            });

            Route::prefix('posts')->group(function () {
                Route::middleware(['role:admin', 'auth:sanctum'])->group(function () {
                    Route::post('/store', [PostController::class, 'store']);
                    Route::put('/update/{post}', [PostController::class, 'update']);
                    Route::delete('/destroy/{post}', [PostController::class, 'destroy']);
                    Route::get('/trash', [PostController::class, 'trash']);
                    Route::put('/restore/{post}', [PostController::class, 'restore']);
                    Route::delete('/force-delete/{post}', [PostController::class, 'forceDelete']);
                });
                Route::middleware(['role:admin,user', 'auth:sanctum'])->group(function () {
                    Route::get('/', [PostController::class, 'index']);
                    Route::get('show/{post}', [PostController::class, 'show']);
               });
            });

            Route::prefix('comments')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::get('/', [CommentController::class, 'index']);
                    Route::get('show/{comment}', [CommentController::class, 'show']);
                    Route::post('/store', [CommentController::class, 'store']);
                    Route::put('/update/{comment}', [CommentController::class, 'update']);
                    Route::delete('/destroy/{comment}', [CommentController::class, 'destroy']);

                    Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
                        Route::put('/approve/{comment}', [CommentController::class, 'approve']);
                        Route::put('/reject/{comment}', [CommentController::class, 'reject']);

                    });

                });
            });

            Route::prefix('likes')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::post('/like', [LikeController::class, 'toggleLike']);
                    Route::post('/dislike', [LikeController::class, 'toggleDislike']);
                });
            });

            Route::prefix('patients')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::get('/', [PatientController::class, 'index']);
                    Route::get('show/{patient}', [PatientController::class, 'show']);
                    Route::post('/store', [PatientController::class, 'store']);
                    Route::put('/update/{patient}', [PatientController::class, 'update']);
                    Route::delete('/destroy/{patient}', [PatientController::class, 'destroy']);
                });
            });

            Route::prefix('chat')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user,doctor'])->group(function () {

                    Route::get('/get-chats', [ChatController::class, 'getChats']);
                    Route::post('/create-chat', [ChatController::class, 'createChat']);
                    Route::get('/get-chat-by-id/{chat}', [ChatController::class, 'getChatById']);
                    Route::post('/send-text-message', [ChatController::class, 'sendTextMessage']);
                    Route::post('/search-user', [ChatController::class, 'searchUsers']);
                    Route::get('/message-status/{message}', [ChatController::class, 'messageStatus']);
                    Route::post('/user/join-chat/{user}', [ChatController::class, 'userJoinsChat']);
                    Route::post('/user/leave-chat/{user}', [ChatController::class, 'userLeavesChat']);
                });
            });

            Route::prefix('doctors')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::get('/', [DoctorController::class, 'index']);
                    Route::get('/show/{doctor}', [DoctorController::class, 'show']);
                });
            });

            Route::prefix('appointments')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::get('/', [AppointmentController::class, 'index']);
                    Route::get('/create', [AppointmentController::class, 'create']);
                    Route::post('/store', [AppointmentController::class, 'store']);
                    Route::get('/show/{appointment}', [AppointmentController::class, 'show']);
                    Route::get('/edit/{appointment}', [AppointmentController::class, 'edit']);
                    Route::put('/update/{appointment}', [AppointmentController::class, 'update']);
                    Route::delete('/destroy/{appointment}', [AppointmentController::class, 'destroy']);
                });
            });

