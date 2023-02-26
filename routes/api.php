<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
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
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company/{company}', [CompanyController::class, 'show']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/{employee}', [EmployeeController::class, 'show']);

Route::get('/project', [ProjectController::class, 'index']);
Route::get('/project/{project}', [ProjectController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/company', CompanyController::class)->except(['index', 'show']);
    Route::apiResource('/employee', EmployeeController::class)->except(['index', 'show']);
    Route::apiResource('/project', ProjectController::class)->except(['index', 'show']);
});
