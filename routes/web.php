<?php

use Drongotech\Applicationinfo\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('appinfo::appinfo.login');
});

Route::group(['middleware' => config('appinfo.middleware_auth')], function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('/appinfo')->group(function () {

            Route::get('/', [ApplicationController::class, 'appInfo'])->name('appinfo.index');
            Route::get('/status', [ApplicationController::class, 'appStatus'])->name('appinfo.status');

            Route::prefix('/api')->group(function () {
                Route::get('/info', [ApplicationController::class, 'apiGetAppInfo'])->name('appinfo.api.update');
                Route::post('/update', [ApplicationController::class, 'apiUpdate'])->name('appinfo.api.update');
                Route::post('/logo', [ApplicationController::class, 'apiUpdateLogo'])->name('appinfo.api.update');
                Route::get('/status', [ApplicationController::class, 'apiGetMaintenanceStatus'])->name('appinfo.api.update');
                Route::post('/appstatus', [ApplicationController::class, 'apiUpdateMaintenanceStatus'])->name('appinfo.api.update');
            });

        });

    });

});
