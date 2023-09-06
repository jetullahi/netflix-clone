<?php

use App\Http\Controllers\CategoryController;
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
Route::post('category/store', [CategoryController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);
Route::post('category/update/{id}', [CategoryController::class, 'update']);
Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy']);
Route::get('category/show/{id}', [CategoryController::class, 'show']);


Route::post('movie/store', [MovieController::class, 'store']);
Route::post('movie/update/{id}', [MovieController::class, 'update']);
Route::get('movies', [MovieController::class, 'index']);
Route::delete('movie/destroy/{id}', [MovieController::class, 'destroy']);
Route::get('movie/show/{id}', [MovieController::class, 'show']);

Route::post('serie/store', [SerieController::class, 'store']);
Route::get('series', [SerieController::class, 'index']);
Route::post('serie/update/{id}', [SerieController::class, 'update']);
Route::delete('serie/destroy/{id}', [SerieController::class, 'destroy']);
Route::get('serie/show/{id}', [SerieController::class, 'show']);
