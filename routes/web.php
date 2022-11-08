<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\AcademicScoreController;
use App\Http\Controllers\ClassHomeTeacherController;
use App\Http\Controllers\AcademicClassYearController;
use App\Http\Controllers\StudentAcademicScoreController;

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

Route::redirect('/','/admin');

Route::get('/admin/login', function() {
    return view('admin.auth.login', [
        'title' => 'Login'
    ]);
})->name('admin.login');

Route::get('/student/login', function() {
    return view('student.auth.login', [
        'title' => 'Login'
    ]);
})->name('student.login');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('/', function () {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'total_students' => Student::all()->count(),
            'total_teachers' => Teacher::all()->count()
        ]);
    });

    Route::resource('/teachers', TeacherController::class);

    Route::get('/students/assign-class', [StudentController::class, 'assignClassIndex']);
    Route::post('/students/assign-class', [StudentController::class, 'assignClass']);
    Route::resource('/students', StudentController::class);

    Route::resource('/classes/homeroom', ClassHomeTeacherController::class);
    Route::resource('/classes', AcademicClassController::class);

    Route::get('/academic-classes/transfer', [AcademicClassYearController::class, 'transfer']);
    Route::post('/academic-classes/transfer', [AcademicClassYearController::class, 'transferClass']);
    Route::get('/academic-classes/homeroom', [AcademicClassYearController::class, 'homeroom']);
    Route::post('/academic-classes/homeroom', [AcademicClassYearController::class, 'addHomeroom']);
    Route::delete('/academic-classes/homeroom', [AcademicClassYearController::class, 'removeHomeroom']);
    Route::resource('/academic-classes', AcademicClassYearController::class);

    Route::resource('/academic-years', AcademicYearController::class);

    Route::get('/academic-score/{academicClassYearId}/{subjectId}', [AcademicScoreController::class, 'academicClassYearScore']);
    Route::post('/academic-score/update-score', [AcademicScoreController::class, 'updateScore']);
    Route::resource('/academic-score', AcademicScoreController::class);

    Route::resource('/subjects', SubjectController::class);

});



Route::group(['prefix' => 'student', 'as' => 'students.'], function(){
    Route::get('/', function () {
        return view('student.dashboard.index', [
            'title' => 'Dashboard'
        ]);
    });

    Route::get('/rapor/{academicClassYearId}/score', [StudentAcademicScoreController::class,'rapor']);
    Route::get('/rapor/{academicClassYearId}/performance', [StudentAcademicScoreController::class, 'performance']);
});
