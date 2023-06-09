<?php

use App\Http\Controllers\Api\NewsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreferenceCategoryController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('preference-categories', PreferenceCategoryController::class);
    Route::apiResource('preferences', PreferenceController::class);
    Route::get('user/preferences', [UserController::class, 'getPreferences'])->name('user.preferences');
    Route::get('user/preferences/{preferenceCategory}', [UserController::class, 'getPreferencesCategory'])->name('user.getPreferencesCategory');
    Route::post('news', [NewsApiController::class, 'load_user_feed']);
    Route::get('news/categories', [NewsApiController::class, 'getCategories']);
    Route::get('news/sources', [NewsApiController::class, 'getSources']);
});
/**
 * News API Routes
 */
// Route::controller(NewsApiController::class)->group(function () {
//     Route::get('/news', 'index');
//  })->middleware('auth:sanctum');

