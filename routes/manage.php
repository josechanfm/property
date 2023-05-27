<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Inertia\Inertia;


Route::group(['middleware' => config('fortify.middleware', ['admin_web'])], function () {

    $limiter = config('fortify.limiters.login');

    Route::get('/manage/login', function () {
        return Inertia::render('Community/Login');
    })->middleware(['guest:'.config('fortify.guard')]);
    
    Route::post('/manage/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest:'.config('fortify.guard'),
        $limiter ? 'throttle:'.$limiter : null,
    ]));

    Route::post('/manage/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('manage.logout');
});



Route::middleware([
    'auth:admin_web',
    config('jetstream.auth_session'),
    'role:community',
])->group(function () {
    Route::prefix('/manage')->group(function(){
        Route::get('/',[App\Http\Controllers\Community\DashboardController::class,'index']);
        Route::get('dashboard',[App\Http\Controllers\Community\DashboardController::class,'index'])->name('manage.dashboard');
        Route::get('community/{community}',[App\Http\Controllers\Community\DashboardController::class,'index'])->name('manage.community');
        Route::resource('communities',App\Http\Controllers\Community\CommunityController::class)->names('manage.communities');
        Route::resource('community/{community}/inquiries',App\Http\Controllers\Community\InquiryController::class)->names('manage.community.inquiries');
        Route::resource('notification_mailers',App\Http\Controllers\NotificationMailerController::class)->names('manage.notification_mailers');
        Route::get('notification_mailer/send_mail',[App\Http\Controllers\NotificationMailerController::class,'sendMail']);
        Route::resource('mailers',App\Http\Controllers\MailerController::class)->names('manage.mailers');
    })->name('manage');
});