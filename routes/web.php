<?php

use App\Http\Controllers\AssistanceListController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Assistance Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => redirect()->route('assistanceList.index'));

Route::controller(GroupController::class)
    ->name('group.')
    ->prefix('group')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{group:id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });

Route::controller(AssistanceListController::class)
    ->name('assistanceList.')
    ->prefix('assistance-list')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{attendanceList:id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });

Route::controller(StudentController::class)
    ->name('students.')
    ->prefix('students')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{student:id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });

//Attendance List section
//Route::get('/attendanceList', fn () => view('pages.attendanceList.attendanceL'))->name('attendanceList');

//Assistance generator section
//  Route::get('/assistanceGenerator', fn () => view('pages.assistanceGenerator.assistanceG'))->name('assistanceGenerator');

//saved groups section
//Route::get('/savedGroups', fn () => view('pages.savedGroups.savedGroups'))->name('savedGroups');
