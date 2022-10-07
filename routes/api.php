<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ConferenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/conferences', [ConferenceController::class, 'index']);

//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/conferences/{id}', [ConferenceController::class, 'show']);
    Route::post('/conferences', [ConferenceController::class, 'store']);
    Route::post('/conferences/{id}', [ConferenceController::class, 'show']);
    Route::put('/conferences/{id}', [ConferenceController::class, 'update']);
    Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
