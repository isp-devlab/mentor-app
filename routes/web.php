<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserManagementController;

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

// Route::get('/login', function () {
//     return view('dashboard');
// });
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login_submit'])->name('login.submit');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 


Route::prefix('/group')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('group'); 
    Route::get('/{id}/overview', [GroupController::class, 'overview'])->name('group.overview'); 
    Route::get('/{id}/reset-code', [GroupController::class, 'overviewReset'])->name('group.overview.reset'); 
    
    Route::get('/{id}/mentor', [GroupController::class, 'mentor'])->name('group.mentor'); 
    Route::post('/{id}/mentor', [GroupController::class, 'mentorStore'])->name('group.mentor.store'); 
    Route::get('/{id}/mentor/{idTeacher}', [GroupController::class, 'mentorDestroy'])->name('group.mentor.destroy'); 
    
    Route::get('/{id}/member', [GroupController::class, 'member'])->name('group.member'); 
    Route::get('/{id}/member/{idMember}', [GroupController::class, 'memberDestroy'])->name('group.member.destroy'); 
    
    Route::get('/{id}/discussion', [GroupController::class, 'discussion'])->name('group.discussion'); 
    Route::get('/{id}/assignment', [GroupController::class, 'assignment'])->name('group.assignment'); 
});

Route::prefix('/setting')->group(function () {
    Route::get('/class', [SettingController::class, 'class'])->name('setting.class'); 

    Route::get('/group', [SettingController::class, 'group'])->name('setting.group'); 
    Route::post('/group', [SettingController::class, 'groupStore'])->name('setting.group.store'); 
    Route::get('/group/{id}/delete', [SettingController::class, 'groupDestroy'])->name('setting.group.destroy'); 
    Route::post('/group/{id}/update', [SettingController::class, 'groupUpdate'])->name('setting.group.update'); 
});

Route::prefix('/user-management')->group(function () {
    Route::get('/mentor', [UserManagementController::class, 'mentor'])->name('user-management.mentor');
    Route::get('/mentor/{id}/delete', [UserManagementController::class, 'mentorDestroy'])->name('user-management.mentor.destroy');
    Route::post('/mentor/{id}/update', [UserManagementController::class, 'mentorUpdate'])->name('user-management.mentor.update');

    Route::get('/user', [UserManagementController::class, 'user'])->name('user-management.user');
    Route::get('/user/{id}/delete', [UserManagementController::class, 'userDestroy'])->name('user-management.user.destroy');
    Route::post('/user/{id}/update', [UserManagementController::class, 'userUpdate'])->name('user-management.user.update');
});

