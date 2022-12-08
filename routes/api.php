<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\SchoolController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function(){
    //APIs de escuela
    Route::get('/school/getAll/{teacher_id}', [SchoolController::class, 'index']);
    Route::post('/school/insert', [SchoolController::class, 'store']);
    Route::put('/school/update/{id}', [SchoolController::class, 'update']);
    Route::delete('/school/delete/{id}', [SchoolController::class, 'destroy']);

    //APIs de carrera
    Route::get('/career/getAll/{teacher_id}', [CareerController::class, 'index']);
    Route::post('/career/insert', [CareerController::class, 'store']);
    Route::put('/career/update/{id}', [CareerController::class, 'update']);
    Route::delete('/career/delete/{id}', [CareerController::class, 'destroy']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);