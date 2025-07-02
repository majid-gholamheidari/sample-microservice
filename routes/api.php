<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('event', [EventController::class, 'store']);
    Route::get('events', [EventController::class, 'index']);
});
