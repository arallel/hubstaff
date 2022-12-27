<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\membersController;

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
    Route::get('/members', 'index')->name('member.index');
    Route::get('member/archive', 'archive');
    Route::post('/member/store', 'store')->name('member.store');
    Route::put('/member/update/{member_id}', 'update')->name('member.update');
    Route::delete('/member/delete/{member_id}', 'delete')->name('member.delete');
});
Route::controller(ProjectController::class)->group(function () {
    Route::get('/project/all', 'index')->name('project.index');
    Route::get('project/archive', 'archive');
    Route::post('/project/store', 'store')->name('project.store');
    Route::post('/project/duplicate/{project_id}', 'duplicate')->name('project.duplicate');
    Route::put('/project/update/{project_id}', 'update')->name('project.update');
    Route::delete('/project/delete/{project_id}', 'delete')->name('project.delete');
});
Route::controller(membersController::class)->group(function () {
    Route::post('/mail', 'store')->name('members.mail');
    Route::get('members','index')->name('members.index');
    Route::get('invites','invites')->name('members.invites');
   
});

Route::view('register', 'auth.register');
Route::view('log', 'auth.login');

Route::get('activity', function() {
    return view('admin.project.activity',['type_menu' => 'activity']);
});

// Route::view('mail','mail.invitmember');

