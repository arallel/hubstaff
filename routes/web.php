<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('project/all', function () {
//     return view('pages.project-all');
// });

Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/all', 'index')->name('project.index');
    Route::get('project/archive', 'archive');
    Route::post('/project/store', 'store')->name('project.store');
    Route::put('/project/update/{project_id}', 'update')->name('project.update');
    Route::delete('/project/delete/{project_id}', 'delete')->name('project.delete');
});

Route::view('register', 'auth.register');
Route::view('log', 'auth.login');

Route::get('activity', function() {
    return view('admin.project.activity',['type_menu' => 'activity']);
});

Route::get('members', function() {
    return view('admin.project.member',['type_menu' => 'People']);
});

Route::get('invites', function() {
    return view('admin.project.invites', ['type_menu' => 'People']);
});

