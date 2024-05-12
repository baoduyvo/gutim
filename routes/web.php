<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GymController;
use App\Http\Controllers\Admin\MemberShipController as AdminMemberShipController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\Client\AboutUsController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\GymController as ClientGymController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LoginClientController;
use App\Http\Controllers\Client\ServiceController as ClientServiceController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('index');
    Route::post('login', [LoginController::class, 'store'])->name('store');
    Route::get('logout', LogoutController::class)->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware('checkLogin')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('booking', 'booking')->name('booking');
        Route::get('showAcceptBooking', 'showAcceptBooking')->name('showAcceptBooking');
        Route::get('showRefuseBooking', 'showRefuseBooking')->name('showRefuseBooking');
        Route::get('handleAcceptBooking/{id}', 'handleAcceptBooking')->name('handleAcceptBooking');
        Route::get('handleRefuseBooking/{id}', 'handleRefuseBooking')->name('handleRefuseBooking');

        Route::get('feedback', 'feedback')->name('feedback');

        Route::get('aboutUs', 'aboutUs')->name('aboutUs');
        Route::get('handleAccept/{id}', 'handleAccept')->name('handleAccept');
        Route::get('handleRefuse/{id}', 'handleRefuse')->name('handleRefuse');

        Route::get('comment', 'comment')->name('comment');
        Route::get('handleAcceptComment/{id}', 'handleAcceptComment')->name('handleAcceptComment');
        Route::get('handleRefuseComment/{id}', 'handleRefuseComment')->name('handleRefuseComment');

        Route::get('handleAcceptAllComment', 'handleAcceptAllComment')->name('handleAcceptAllComment');
        Route::get('handleRefuseAllComment', 'handleRefuseAllComment')->name('handleRefuseAllComment');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');

        Route::get('search', 'search')->name('search');
    });

    Route::prefix('gym')->name('gym.')->controller(GymController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');

        Route::get('search', 'search')->name('search');
    });

    Route::prefix('album')->name('album.')->controller(AlbumController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('show/{id}', 'show')->name('show');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('memberShip')->name('memberShip.')->controller(AdminMemberShipController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
});

Route::prefix('')->name('client.')->group(function () {
    Route::prefix('')->name('home.')->controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');

        Route::post('feedback', 'feedback')->name('feedback');
    });

    Route::prefix('aboutus')->name('aboutus.')->controller(AboutUsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');
    });

    Route::prefix('service')->name('service.')->controller(ClientServiceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');

        Route::get('exercise', 'exercise')->name('exercise');

        Route::get('service_detail/{id}', 'service_detail')->name('service_detail');

        Route::post('booking', 'booking')->name('booking');
        Route::get('chooseService', 'chooseService')->name('chooseService');
    });

    Route::prefix('contact')->name('contact.')->controller(ContactController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');

        Route::post('contact', 'contact')->name('contact');
    });

    Route::prefix('gym')->name('gym.')->controller(ClientGymController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');

        Route::get('show/{id}', 'show')->name('show');

        Route::get('change', 'change')->name('change');

        Route::post('comment', 'comment')->name('comment');
    });

    Route::prefix('login')->name('login.')->controller(LoginClientController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');

        Route::post('resgiter', 'resgiter')->name('resgiter');
        Route::post('login', 'login')->name('login');

        Route::get('logout', 'logout')->name('logout');
    });

    Route::prefix('bmi')->name('bmi.')->controller(BmiController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('index', 'index')->name('index');
    });
});
