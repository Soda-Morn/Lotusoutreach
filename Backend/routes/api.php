<?php

use App\Http\Controllers\Api\V1\AboutContentController;
use App\Http\Controllers\Api\V1\CambodiaContentController;
use App\Http\Controllers\Api\V1\NewContentController;
use App\Http\Controllers\Api\V1\PageContentController;
use App\Http\Controllers\Api\V1\ProgramController;
use App\Http\Controllers\Api\V1\WhyGirlController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Routes for PageContent
Route::prefix('v1')->group(function () {
    Route::apiResource('pagecontents', PageContentController::class);
    Route::apiResource('whygirl', WhyGirlController::class);
    Route::apiResource('program', ProgramController::class);
    Route::apiResource('aboutcontents',AboutContentController::class);
    Route::apiResource('cambodia-contents', CambodiaContentController::class);
    Route::apiResource('newcontents', NewContentController::class);


});

