<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin',  [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/member', [App\Http\Controllers\UserController::class, 'member'])->name('admin.member');
    Route::get('/admin/worker', [App\Http\Controllers\UserController::class, 'worker'])->name('admin.worker');
    Route::get('/profile/{user}', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    Route::put('/admin/worker/{user}/delete', [App\Http\Controllers\UserController::class, 'delete_worker'])->name('worker.delete');
    Route::delete('/admin/member/{user}/delete', [App\Http\Controllers\UserController::class, 'delete_member'])->name('member.delete');
    
    Route::put('profile/{user}/join', [App\Http\Controllers\UserController::class, 'join'])->name('department.join');
    Route::put('profile/{user}/leave', [App\Http\Controllers\UserController::class, 'leave'])->name('department.leave');



    Route::get('/admin/department', [App\Http\Controllers\DepartmentController::class, 'index'])->name('admin.department');
    Route::post('department/create', [App\Http\Controllers\DepartmentController::class, 'store'])->name('department.create');
    Route::delete('department/{department}/delete', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('department.delete');
});