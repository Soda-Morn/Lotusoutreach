<?php

use App\Http\Controllers\Api\V1\Mission_CardController;
use App\Http\Controllers\Api\V1\MissionCardController;
use App\Http\Controllers\Api\V1\PageContentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function ($request) {
    return $request->user();
});

// API Routes under v1 prefix
Route::prefix('v1')->group(function () {
    Route::apiResource('mission-cards', Mission_CardController::class);
    Route::apiResource('page-contents', PageContentController::class);
});