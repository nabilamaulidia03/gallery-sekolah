<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StudentGalleryController;
use App\Http\Controllers\UserManagementController;

Route::get('test', function () {
    return view('authtest');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.home');
Route::get('achievements', [LandingPageController::class, 'achievements'])->name('landingPage.achievements');
Route::get('galleries', [LandingPageController::class, 'galleries'])->name('landingPage.galleries');
Route::get('announcements', [LandingPageController::class, 'announcements'])->name('landingPage.announcements');
Route::get('events', [LandingPageController::class, 'events'])->name('landingPage.events');
Route::get('news', [LandingPageController::class, 'news'])->name('landingPage.news');
Route::post('messages', [ContactMessageController::class, 'store'])->name('messages.store');
Route::post('galleries/{gallery}/like', [GalleryController::class, 'like'])->name('galleries.like');
Route::post('galleries/{gallery}/unlike', [GalleryController::class, 'unlike'])->name('galleries.unlike');
Route::get('/galleries/{gallery}/comments', [GalleryController::class, 'getComments']);
Route::post('/galleries/comment', [GalleryController::class, 'storeComment'])->name('galleries.comment');

/*
|--------------------------------------------------------------------------
| Student Routes (no prefix)
|--------------------------------------------------------------------------
*/
Route::name('student.')->group(function () {

    // Guest only (belum login)
    Route::middleware('guest:student')->group(function () {
        Route::get('/login', [StudentLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [StudentLoginController::class, 'login'])->name('login.submit');

        Route::get('/register', [StudentRegisterController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [StudentRegisterController::class, 'register'])->name('register.submit');
    });

    // Authenticated students
    Route::middleware('auth:student')->group(function () {
        Route::get('/student/dashboard', [StudentGalleryController::class, 'index'])->name('dashboard');
        Route::post('/logout', [StudentLoginController::class, 'logout'])->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes (prefix: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest only (belum login admin)
    Route::middleware('guest:web')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
        // Register
        Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
    });

    // Authenticated admin
    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::prefix('dashboard')->group(function () {
            Route::resource('abouts', AboutController::class)->only(['index', 'update']);
            Route::resource('carousels', CarouselController::class);
            Route::put('carousels/activate/{carousel}', [CarouselController::class, 'activate'])->name('carousels.activate');
            Route::resource('galleries', GalleryController::class);
            Route::resource('study-programs', StudyProgramController::class);
            Route::resource('achievements', AchievementController::class);
            Route::resource('gallery-categories', GalleryCategoryController::class);
            Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
            Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
            Route::resource('events', EventController::class);
            Route::resource('announcements', AnnouncementController::class);
            Route::resource('news', NewsController::class);


            // manage users
            Route::get('users', [UserManagementController::class, 'index'])->name('users.index');
            Route::delete('users/{id}/logout', [UserManagementController::class, 'forceLogout'])->name('users.logout');
        });

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
