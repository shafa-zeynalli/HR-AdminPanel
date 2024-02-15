<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'authenticate']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function(){



Route::get('roles',[RoleController::class,'index'])->name('roles');
Route::get('roles/edit/{role}',[RoleController::class,'editRole'])->name('roles.edit');
Route::put('roles/update',[RoleController::class,'update'])->name('roles.update');

Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('profile/update',[ProfileController::class,'update'])->name('profile.update');
Route::get('profile-password/edit',[ProfileController::class,'showProfilePassword'])->name('profile-password.edit');
Route::put('profile-password/update',[ProfileController::class,'changeProfilePassword'])->name('profile-password.update');

Route::get('/',[Controller::class,'index'])->name('index')->middleware('auth');
Route::get('users',[UserController::class,'index'])->name('users.index');
Route::get('users/index',[UserController::class,'getIndex'])->name('usersblade');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::post('users/store',[UserController::class,'store'])->name('users.store');
Route::get('users/edit/{user}',[UserController::class,'edit'])->name('users.edit');
Route::put('users/update',[UserController::class,'update'])->name('users.update');
Route::delete('users/delete/{user}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('deleted-users',[UserController::class,'showDeletedUsers'])->name('deletedUsers');
Route::get('deleted-users/index',[UserController::class,'getShowDeletedUsers'])->name('deletedUsers.index');
Route::get('users/restore/{user}',[UserController::class,'restore'])->name('users.restore');
});
