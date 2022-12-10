<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//APIs de alumno

Route::controller(StudentController::class)
    ->prefix('students')
    ->group(function () {
        //Route::get('/', 'index')->name('index');
        Route::get('/{student:id}', function (Student $student) {
            return response()->json($student);
        });
    });

Route::post('/group', [GroupController::class, 'store']);

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

    //APIs de lista
    Route::get('/list/getAll/{teacher_id}', [ListController::class, 'index']);
    Route::post('/list/insert', [ListController::class, 'store']);
});*/

//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
