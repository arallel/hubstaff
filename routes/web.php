<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\membersController;
use App\Http\Controllers\TodosController;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


// Route::get('project/all', function () {
//     return view('pages.project-all');
// });

Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/all', 'index')->name('project.index');
    Route::get('project/archive', 'archive')->name('project.archive');
    Route::post('/project/store', 'store')->name('project.store');
    Route::post('/project/duplicate/{project_id}', 'duplicate')->name('project.duplicate');
    Route::put('/project/update/{project_id}', 'update')->name('project.update');
    Route::delete('/project/delete/{project_id}', 'delete')->name('project.delete');
});
Route::controller(membersController::class)->group(function () {
    Route::post('/members/send/invite/mail', 'store')->name('members.mail');
    Route::get('members','index')->name('members.index');
    Route::get('members/archive','archive')->name('members.archive');
    Route::get('invites','invites')->name('members.invites');
   Route::get('invitation/{token}/{company}','requestregister')->name('invit.request');
});
Route::controller(TodosController::class)->group(function () {
    Route::get('task','index')->name('task.index');
    Route::get('task/archive','archive')->name('task.archive');
    Route::post('task/archive','store')->name('task.store');
});

Route::view('register', 'auth.register');
Route::view('log', 'auth.login');

Route::get('screnshot', function() {
    return view('admin.project.activity');
})->name('screnshot');

Route::get('setting', function () {
    return view('setting');
});
Route::get('display', function () {
    return view('display');
});

// Route::view('','mail.invitmember');

