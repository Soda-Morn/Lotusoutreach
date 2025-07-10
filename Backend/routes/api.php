<?php

<<<<<<< HEAD
use App\Http\Controllers\Api\V1\ApproachTableController;
=======
use App\Http\Controllers\Api\V1\HeroImageController;
>>>>>>> 470ef4a22b10ca9dc87b3df81c4daef3c2a0f60c
use App\Http\Controllers\Api\V1\PageContentController;
use App\Http\Controllers\Api\V1\WaterSectionController;
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
<<<<<<< HEAD
    Route::apiResource('approachtables',ApproachTableController::class);
    Route::apiResource('water-sections', WaterSectionController::class);
=======
    Route::apiResource('heroImage', HeroImageController::class);
>>>>>>> 470ef4a22b10ca9dc87b3df81c4daef3c2a0f60c
});

