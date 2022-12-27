<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectApiController;

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
Route::get('/index', [App\Http\Controllers\API\AuthController::class, 'index']);
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');


Route::controller(ProjectApiController::class)->group(function () {
    Route::get('/project/all', 'index');
    Route::get('/project/show/{project_id}', 'show');
    Route::post('/project/store', 'store');
    Route::patch('/project/update/{project_id}', 'update');
    Route::delete('/project/delete/{project_id}', 'delete');
    Route::post('/image/store', 'test')->name('test');
});