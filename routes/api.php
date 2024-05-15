<?php

use App\Http\Controllers\Apis\Auth\ForgotPassword\ConfirmPasswordController;
use App\Http\Controllers\Apis\Auth\ForgotPassword\ForgotPasswordController;
use App\Http\Controllers\Apis\Auth\ForgotPassword\ResetPasswordController;
use App\Http\Controllers\Apis\Auth\Login\LoginController;
use App\Http\Controllers\Apis\Auth\Registration\EmailVerificationController;
use App\Http\Controllers\Apis\Auth\Registration\RegisterController;
use App\Http\Controllers\Apis\Auth\SocialiteLogin\SocialLoginController;
use App\Http\Controllers\Apis\Auth\UserProfile\ProfileController;
use App\Http\Controllers\Apis\Dashboard\RolesManagement\RolesAndPermissionsController;
use App\Http\Controllers\Apis\Dashboard\SettingsManagement\WebsiteSettingController;
use App\Http\Controllers\Apis\Dashboard\UserManagement\UserController;
use App\Http\Controllers\Apis\GluCare\Appointments\AppointmentController;
use App\Http\Controllers\Apis\GluCare\Blog\CategoryController;
use App\Http\Controllers\Apis\GluCare\Blog\CommentController;
use App\Http\Controllers\Apis\GluCare\Blog\LikeController;
use App\Http\Controllers\Apis\GluCare\Blog\PostController;
use App\Http\Controllers\Apis\GluCare\Detection\PatientData\PatientDataController;
use App\Http\Controllers\Apis\GluCare\Detection\PredictDiabetes\PredictDiabetesController;
use App\Http\Controllers\Apis\GluCare\Doctors\DoctorController;
use App\Http\Controllers\Apis\GluCare\LiveChat\ChatController;
use App\Http\Controllers\Apis\GluCare\Payment\PaymentController;
use App\Http\Controllers\Apis\Notifications\NotificationController;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;


// User routes
//  Route::group(['prefix'=>'users'],function() {

            Broadcast::routes(['middleware' => ['auth:sanctum']]);


        Route::prefix('/user')->group(function () {
            Route::group(['middleware' => 'guest:sanctum'], function () {
                Route::post('register', RegisterController::class);
                Route::post('login', [LoginController::class, 'login']);
                Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
                Route::get('login/{provider}/redirect', [SocialLoginController::class, 'redirectToProvider']);
                Route::post('login/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);
                Route::get('login/{provider}/user', [SocialLoginController::class, 'index']);
            });

            Route::group(['middleware' => 'auth:sanctum'], function () {
                Route::get('send-email-verification-code', [EmailVerificationController::class, 'sendCode']);
                Route::post('check-email-verification-code', [EmailVerificationController::class, 'checkCode']);
                Route::get('resend-email-verification-code', [EmailVerificationController::class, 'resendCode']);
                Route::delete('logout', [LoginController::class, 'logout']);
                Route::delete('logout-all-devices', [LoginController::class, 'logoutAllDevices']);
                Route::get('send-password-reset-code', [ConfirmPasswordController::class, 'sendCode']);
                Route::post('check-password-reset-code', [ConfirmPasswordController::class, 'checkCode']);
                Route::get('resend-password-reset-code', [ConfirmPasswordController::class, 'resendCode']);
                Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']);
                Route::get('/profile', [ProfileController::class, 'profile']);
                Route::put('update-profile', [ProfileController::class, 'updateProfile']);

            });

        });


            Route::group(['prefix' => 'notifications', 'middleware' => 'auth:sanctum'], function () {
                Route::get('/', [NotificationController::class, 'getUserNotifications']);
                Route::get('details/{notificationId}', [NotificationController::class, 'getNotificationDetails']);
                Route::post('/mark-as-read/{notificationId}', [NotificationController::class, 'markNotificationAsRead']);
                Route::delete('destroy/{notificationId}', [NotificationController::class, 'deleteNotification']);
            });


   // Routes for Admin Dashboard
        Route::prefix('dashboard/admin')->group(function () {
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
        });


       // Routes for GluCare application
        Route::prefix('glucare')->group(function () {
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

            Route::prefix('predictDiabetesWithPatientData')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::get('/', [PatientDataController::class, 'index']);
                    Route::get('show/{patient}', [PatientDataController::class, 'show']);
                    Route::post('/store', [PatientDataController::class, 'store']);
                    Route::put('/update/{patient}', [PatientDataController::class, 'update']);
                    Route::delete('/destroy/{patient}', [PatientDataController::class, 'destroy']);
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
                Route::middleware(['auth:sanctum','role:admin,doctor'])->group(function () {
                    Route::put('/approve/{appointment}', [AppointmentController::class, 'approve']);
                    Route::put('/cancel/{appointment}', [AppointmentController::class, 'cancel']);
                });
            });

            Route::prefix('payments')->group(function () {
                Route::middleware(['auth:sanctum','role:admin,user'])->group(function () {
                    Route::post('/stripe-payment', [PaymentController::class, 'stripePayment']);
                });
            });

        });


/*
 * Routes Test
Route::get('/preview-mail', function () {
$user = App\Models\User::findOrFail(4);
return (new \App\Notifications\GluCare\Appointments\AppointmentConfirmationNotification($user))
->toMail($user);
});*/
//Route::post('/predict_diabetes', [PredictDiabetesController::class, 'predictDiabetesWithPatientData']);













