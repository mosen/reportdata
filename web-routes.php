<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Munkireport\ReportData')->middleware('web')->group(function () {
    Route::get('/report/data/example', 'Controller@index');
});
