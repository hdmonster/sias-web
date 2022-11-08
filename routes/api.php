<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ClassApiController;
use App\Http\Controllers\api\StudentApiController;
use App\Http\Controllers\api\TeacherApiController;
use App\Http\Controllers\api\AcademicYearApiController;
use App\Http\Controllers\api\AcademicClassYearApiController;

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
    
Route::resource('/students', StudentApiController::class);
Route::resource('/teachers', TeacherApiController::class);
Route::get('/classes', [ClassApiController::class, 'index']);
Route::get('/academic-years', [AcademicYearApiController::class, 'index']);
Route::get('/academic-class-years', [AcademicClassYearApiController::class, 'index']);
Route::get('/academic-class-years/homeroom/{id}', [AcademicClassYearApiController::class, 'homeroomTeachers']);
