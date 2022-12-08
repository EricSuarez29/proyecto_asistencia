<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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

/*
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

    //APIs de alumno
    Route::get('/student/getAll/{teacher_id}', [StudentController::class, 'index']);
    Route::post('/student/insert', [StudentController::class, 'store']);
    Route::put('/student/update/{id}', [StudentController::class, 'update']);
    Route::delete('/student/delete/{id}', [StudentController::class, 'destroy']);

    //APIs de materia
    Route::get('/subject/getAll/{teacher_id}', [SubjectController::class, 'index']);
    Route::post('/subject/insert', [SubjectController::class, 'store']);
    Route::put('/subject/update/{id}', [SubjectController::class, 'update']);
    Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete']);

    //APIs de grupo
    Route::get('/group/getAll/{teacher_id}', [GroupController::class, 'index']);
    Route::get('/group/show/{id}', [GroupController::class, 'show']);
    Route::post('/group/insert', [GroupController::class, 'store']);
    Route::put('/group/update/{id}', [GroupController::class, 'update']);
    Route::delete('/group/delete/{id}', [GroupController::class, 'destroy']);
});*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
