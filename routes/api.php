<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ConferenceController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/conferences', [ConferenceController::class, 'index']);
Route::get('/conferences/{id}', [ConferenceController::class, 'show']);

Route::get('/reports', [ReportController::class, 'index']);
Route::get('/reports/{id}', [ReportController::class, 'show']);
//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
     Route::put('/profile/{id}', [AuthController::class, 'updateProfile']);
     Route::put('/reports/{id}', [ReportController::class, 'update']);
     Route::delete('/reports/{id}', [ReportController::class, 'destroy']);
     Route::post('/reports', [ReportController::class, 'store']);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
     Route::put('/conferences/{id}', [ConferenceController::class, 'update']);
     Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy']);
     Route::post('/conferences', [ConferenceController::class, 'store']);
});
Route::group(['middleware' => ['auth:sanctum']], function () {
     Route::put('/conferences/{id}', [FavouriteController::class, 'update']);
     Route::delete('/conferences/{id}', [FavouriteController::class, 'destroy']);
     Route::post('/conferences', [FavouriteController::class, 'store']);
});

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
     $user = Auth::user(); 
     $response = [
            'user' => $user,
            'roles' => $user->roles,
            'permissions'=>User::with('roles.permissions')->get()->find($user)
      
            
        ];
        
             return response($response, 201);
});