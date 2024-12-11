<?php

declare(strict_types=1);

use App\Http\Controllers\BadRequestController;
use App\Http\Controllers\GetUserController;
use App\Http\Controllers\ServiceUnavailableController;
use App\Http\Controllers\OkController;
use Illuminate\Support\Facades\Route;

Route::get('/ok', [OkController::class, 'index']);
Route::get('/bad-request', [BadRequestController::class, 'index']);
Route::get('/service-unavailable', [ServiceUnavailableController::class, 'index']);
Route::get('/get-user/{id}', [GetUserController::class, 'index']);
