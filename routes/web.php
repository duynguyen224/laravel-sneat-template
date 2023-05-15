<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    // Guest
    Route::group(['middleware' => ['guest']], function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/login', "login")->name('login');
            Route::post("/authenticate", "authenticate")->name('auth.authenticate');
        });
    });

    // Auth
    Route::group(['middleware' => ['auth']], function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', [AuthController::class, "logout"])->name('auth.logout');
        });
    });

    // Prefix admin
    Route::group(['prefix' => 'admin'], function () {
        // Auth
        Route::group(['middleware' => ['auth']], function () {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

            /**
             * Resources Routes
             */
            Route::group(['prefix' => 'manage'], function () {
                /**
                 * User Routes
                 */
                Route::group(['prefix' => 'users'], function () {
                    Route::controller(UserController::class)->group(function () {
                        Route::get('/', 'index')->name('admin.users.index');
                        Route::get('/create', 'create')->name('admin.users.create');
                        Route::post('/store', 'store')->name('admin.users.store');
                        Route::get('/{user}/edit', 'edit')->name('admin.users.edit');
                        Route::post('/{user}/update', 'update')->name('admin.users.update');
                        Route::post('/{user}/destroy', 'destroy')->name('admin.users.destroy');
                    });
                });
            });
        });
    });
});
