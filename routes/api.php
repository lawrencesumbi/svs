<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ViolationController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);

    Route::get('/get-students', [StudentController::class, 'getStudents']);
    Route::post('/add-student', [StudentController::class, 'addStudent']);
    Route::put('/edit-student/{id}', [StudentController::class, 'editStudent']);
    Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudent']);

    Route::get('/get-violations', [ViolationController::class, 'getViolations']);
    Route::post('/add-violation', [ViolationController::class, 'addViolation']);
    Route::put('/edit-violation/{id}', [ViolationController::class, 'editViolation']);
    Route::delete('/delete-violation/{id}', [ViolationController::class, 'deleteViolation']);
    
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});