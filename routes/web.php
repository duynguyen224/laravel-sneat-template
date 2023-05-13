<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
                 * Suppliers Routes
                 */
                // Route::group(['prefix' => 'suppliers'], function () {
                //     Route::controller(SupplierController::class)->group(function () {
                //         Route::get('/', 'index')->name('admin.suppliers.index');
                //         Route::get('/create', 'create')->name('admin.suppliers.create');
                //         Route::post('/store', 'store')->name('admin.suppliers.store');
                //         Route::get('/{supplier}/edit', 'edit')->name('admin.suppliers.edit');
                //         Route::post('/{supplier}/update', 'update')->name('admin.suppliers.update');
                //         Route::post('/{supplier}/destroy', 'destroy')->name('admin.suppliers.destroy');
                //     });
                // });
            });
        });
    });
});
