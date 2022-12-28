<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectApiController;
use App\Http\Controllers\Api\membersApiController;
use App\Http\Controllers\Api\TodosApiController;

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
//API route for login user
Route::get('/index', [App\Http\Controllers\API\AuthController::class, 'index'])->name('api.index');
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('api.login');


Route::controller(ProjectApiController::class)->group(function () {
    Route::get('/project/all', 'index');
    Route::get('/project/show/{project_id}', 'show');
    Route::post('/project/store', 'store');
    Route::patch('/project/update/{project_id}', 'update');
    Route::delete('/project/delete/{project_id}', 'delete');
});
Route::controller(membersApiController::class)->group(function () {
    Route::get('/members/all', 'index');
    Route::get('/members/archive', 'archive');
    Route::post('/members/store', 'store');
    Route::get('/members/show/{user_id}', 'show');
    Route::patch('/members/update/{user_id}', 'update');
    Route::delete('/members/delete/{user_id}', 'delete');
});
Route::controller(TodosApiController::class)->group(function () {
    Route::get('/task/all', 'index');
    Route::get('/task/show/{todos_id}', 'show');
    Route::post('/task/store', 'store');
    Route::patch('/task/update/{todos_id}', 'update');
    Route::delete('/task/delete/{todos_id}', 'delete');
});