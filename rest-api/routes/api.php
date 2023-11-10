<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function (){
    #method get all students
    Route::get('/students', [StudentController::class, 'index']);

    #method post  
    Route::post('/students', [StudentController::class, 'store']);

    #method get detail students
    Route::get('/students/{id}', [StudentController::class, 'show']);

    #method put
    Route::put('/students/{id}', [StudentController::class, 'update']);

    #method delete
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});

Route::get('/animals', [AnimalController::class, 'index']);
Route::post('/animals', [AnimalController::class, 'store']);
Route::put('/animals/{id}', [AnimalController::class, 'update']);
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);