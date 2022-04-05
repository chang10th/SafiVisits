<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){

    // ----------------------------------- Home -----------------------------------
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ----------------------------------- Visit -----------------------------------
    Route::get('/visit',[\App\Http\Controllers\VisitController::class, 'index'])->name('visit.index');
    Route::get('/visit/createVisit',[\App\Http\Controllers\VisitController::class, 'createVisit'])->name('visit.createVisit');
    Route::post('/visit/storeVisit',[\App\Http\Controllers\VisitController::class, 'storeVisit'])->name('visit.storeVisit');
    Route::get('/visit/{id}',[\App\Http\Controllers\VisitController::class, 'show'])->name('visit.show');
    Route::get('/visit/{id}/createVisitreport',[\App\Http\Controllers\VisitController::class, 'createVisitreport'])->name('visit.createVisitreport');
    Route::post('/visit/{id}/storeVisitreport',[\App\Http\Controllers\VisitController::class, 'storeVisitreport'])->name('visit.storeVisitreport');
    Route::get('/visit/{id}/edit',[\App\Http\Controllers\VisitController::class, 'edit'])->name('visit.edit');
    Route::put('/visit/{id}/update',[\App\Http\Controllers\VisitController::class, 'update'])->name('visit.update');
    Route::get('/visit/{id}/deleteForm',[\App\Http\Controllers\VisitController::class, 'deleteForm'])->name('visit.deleteForm');
    Route::delete('/visit/{id}/delete',[\App\Http\Controllers\VisitController::class, 'delete'])->name('visit.delete');

    // ----------------------------------- Practitioner -----------------------------------
    Route::get('/practitioner',[\App\Http\Controllers\PractitionerController::class, 'index'])->name('practitioner.index');

    // ----------------------------------- Employee(Profil) -----------------------------------
    Route::get('/employee',[\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
});
