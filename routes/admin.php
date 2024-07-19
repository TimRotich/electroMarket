<?php

use Illuminate\Routing\Route;

Route::prefix('admin')
    ->namespace('App\Plugins\Total\Discount\Controllers')
    ->group(function () {
        Route::get('discount', 'FrontController@index');
    });
