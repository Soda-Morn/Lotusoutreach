<?php


use App\Http\Controllers\Api\V1\ApproachesController;
use App\Http\Controllers\Api\V1\ApproachTableController;
use App\Http\Controllers\Api\V1\HeroImageController;
use App\Http\Controllers\Api\V1\MissionCardController;
use App\Http\Controllers\Api\V1\MissionsController;
use App\Http\Controllers\Api\V1\PageContentController;
use App\Http\Controllers\Api\V1\WaterSectionController;
use App\Http\Controllers\Api\V1\FocusAreaController;
use App\Http\Controllers\Api\V1\FocusCardController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\MissionCardControllerController;
use App\Models\MissionCards;
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
    Route::apiResource('page_contents', PageContentController::class);
    Route::apiResource('approachtables',ApproachTableController::class);
    Route::apiResource('heroImage', HeroImageController::class);
    Route::apiResource('approachtable',ApproachTableController::class);
    Route::apiResource('approaches', ApproachesController::class);
    Route::resource('missioncards', MissionCardController::class);
    Route::resource('missions', MissionsController::class);
});
