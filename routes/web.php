<?php

use App\Http\Controllers\AssistanceListController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Assistance Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('pages.dashboard.dashboard'))->name('dashboard');

Route::controller(GroupController::class)
    ->name('group.')
    ->prefix('group')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/update/{id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });

Route::controller(AssistanceListController::class)
    ->name('assistanceList.')
    ->prefix('assistance-list')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/update/{id}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });

//Attendance List section
Route::get('/attendanceList', fn () => view('pages.attendanceList.attendanceL'))->name('attendanceList');

//Assistance generator section
//  Route::get('/assistanceGenerator', fn () => view('pages.assistanceGenerator.assistanceG'))->name('assistanceGenerator');

//saved groups section
Route::get('/savedGroups', fn () => view('pages.savedGroups.savedGroups'))->name('savedGroups');
