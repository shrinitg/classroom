<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('index'); });
Route::get('/register', function() { return view('register'); });
Route::get('/login', function() { return view('login'); });

Route::post('/register', [GeneralController::class, 'register']);
Route::post('/login', [GeneralController::class, 'login']);

Route::get('homepage', function() {
    $role = Auth::user()->role;
    if($role == 1)
        return view('teacher.homepage');
    elseif($role == 2)
        return view('student.homepage');
});