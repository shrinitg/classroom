<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\AuthStudent;
use App\Http\Middleware\AuthTeacher;
use Illuminate\Support\Facades\Auth;
=======

>>>>>>> 656604f (repo setup)
=======

>>>>>>> 656604f (repo setup)
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

<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/', function () { return view('index'); });
Route::get('/register', function() { return view('register'); });
Route::get('/login', function() { return view('login'); });

Route::post('/register', [GeneralController::class, 'register']);
Route::post('/login', [GeneralController::class, 'login']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::middleware([AuthStudent::class])->group(function () {
    Route::get('/student', [StudentController:: class, 'index']);
    Route::post('/student/joinSubject', [StudentController:: class, 'joinSubject']);
    Route::get('student/unsubscribe/{subjectUuid}', [StudentController::class, 'unsubscribe']);
    Route::get('student/access/{subjectUuid}', [StudentController::class, 'access']);
    
    Route::get('/student/access/markTestDone/{id}', [StudentController::class, 'markTestDone']);
    Route::get('/student/access/markClassDone/{id}', [StudentController::class, 'markClassDone']);
    Route::get('/student/access/markAssignDone/{id}', [StudentController::class, 'markAssignDone']);
});

Route::middleware([AuthTeacher::class])->group(function () {
    Route::get('/teacher', [TeacherController:: class, 'index']);
    Route::post('/addSubject', [TeacherController::class, 'addSubject']);
    Route::get('/teacher/access/{subjectUuid}', [TeacherController::class, 'access']);
    Route::get('/teacher/delete/{subjectUuid}', [TeacherController::class, 'delete']);
    Route::get('/teacher/publish/{subjectUuid}', [TeacherController::class, 'publish']);

    Route::post('/teacher/newTest', [TeacherController::class, 'addTest']);
    Route::post('/teacher/newClass', [TeacherController::class, 'addClass']);
    Route::post('/teacher/newAssignment', [TeacherController::class, 'addAssignment']);
    Route::get('/teacher/delete/test/{id}', [TeacherController::class, 'deleteTest']);
    Route::get('/teacher/delete/class/{id}', [TeacherController::class, 'deleteClass']);
    Route::get('/teacher/delete/assignment/{id}', [TeacherController::class, 'deleteAssignment']);

});
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 656604f (repo setup)
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 656604f (repo setup)
