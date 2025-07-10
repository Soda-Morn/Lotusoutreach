<?php

use App\Http\Controllers\Api\V1\ApproachesController;
use App\Http\Controllers\Api\V1\ApproachTableController;
use App\Http\Controllers\Api\V1\HeroImageController;
use App\Http\Controllers\Api\V1\PageContentController;
use App\Http\Controllers\Api\V1\WaterInitiativeController;
use App\Models\Approaches;
use App\Models\HeroImage;
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
    Route::apiResource('page-contents', PageContentController::class);
    Route::apiResource('heroImage', HeroImage::class);
    Route::apiResource('approachtable',ApproachTableController::class);
    Route::apiResource('waterinitiatives', WaterInitiativeController::class);
    Route::apiResource('approaches', ApproachesController::class);
});

