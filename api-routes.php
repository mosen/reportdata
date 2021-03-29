<?php

Route::group(['prefix' => 'v6', 'namespace' => 'Munkireport\ReportData'], function () {
    Route::apiResource('reportdata', 'ApiController');
});
