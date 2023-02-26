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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/company', CompanyController::class);
    Route::apiResource('/employee', EmployeeController::class);
    Route::apiResource('/project', ProjectController::class);
});
