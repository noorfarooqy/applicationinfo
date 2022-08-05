<?php

use Drongotech\Applicationinfo\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('appinfo.middleware_auth')], function () {
    Route::prefix('/appinfo')->group(function () {
        // Route::get('/', function (AppInfoServices $appInfoServices) {
        //     return 'welcome';
        // });
        Route::get('/', [ApplicationController::class, 'appInfo'])->name('appinfo.index');
        Route::get('/status', [ApplicationController::class, 'appStatus'])->name('appinfo.status');

        Route::prefix('/api')->group(function () {
            Route::get('/info', [ApplicationController::class, 'apiGetAppInfo'])->name('appinfo.api.update');
            Route::post('/update', [ApplicationController::class, 'apiUpdate'])->name('appinfo.api.update');
            Route::post('/logo', [ApplicationController::class, 'apiUpdateLogo'])->name('appinfo.api.update');
        });

    });

});
