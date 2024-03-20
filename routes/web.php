<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('editor/upload', [Controller::class, 'upload'])->name('upload')->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
    Route::post('/auth/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
    Route::get('/auth/forget', [AuthController::class, 'forget'])->name('forget');
    Route::post('/auth/forget', [AuthController::class, 'forgetSubmit'])->name('forget.submit');
    Route::get('/auth/forget/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/auth/forget/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');

});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('/profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});

Route::prefix('/class')->middleware('auth')->group(function () {
    Route::get('/', [ClassController::class, 'index'])->name('class'); 
});

Route::prefix('/group')->middleware('auth')->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('group'); 
    Route::get('/{id}/overview', [GroupController::class, 'overview'])->name('group.overview'); 
    Route::get('/{id}/reset-code', [GroupController::class, 'overviewReset'])->name('group.overview.reset'); 
    
    Route::get('/{id}/mentor', [GroupController::class, 'mentor'])->name('group.mentor'); 
    Route::post('/{id}/mentor', [GroupController::class, 'mentorStore'])->name('group.mentor.store'); 
    Route::get('/{id}/mentor/{idTeacher}', [GroupController::class, 'mentorDestroy'])->name('group.mentor.destroy'); 
    
    Route::get('/{id}/member', [GroupController::class, 'member'])->name('group.member'); 
    Route::get('/{id}/member/{idMember}', [GroupController::class, 'memberDestroy'])->name('group.member.destroy'); 
    
    Route::get('/{id}/discussion', [GroupController::class, 'discussion'])->name('group.discussion');
    Route::post('/{id}/discussion', [GroupController::class, 'discussionStore'])->name('group.discussion.store'); 
    Route::get('/{id}/discussion/{idDiscussion}', [GroupController::class, 'discussionDestroy'])->name('group.discussion.destroy'); 

    Route::get('/{id}/assignment', [GroupController::class, 'assignment'])->name('group.assignment'); 
});

Route::prefix('/setting')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('/class')->group(function () {
        Route::get('/', [SettingController::class, 'class'])->name('setting.class'); 
    });
    Route::prefix('/group')->group(function () {
        Route::get('/', [SettingController::class, 'group'])->name('setting.group'); 
        Route::post('/', [SettingController::class, 'groupStore'])->name('setting.group.store'); 
        Route::get('/{id}/delete', [SettingController::class, 'groupDestroy'])->name('setting.group.destroy'); 
        Route::post('/{id}/update', [SettingController::class, 'groupUpdate'])->name('setting.group.update'); 
    });
});

Route::prefix('/user-management')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::prefix('/mentor')->group(function () {
        Route::get('/', [UserManagementController::class, 'mentor'])->name('user-management.mentor');
        Route::get('/{id}/delete', [UserManagementController::class, 'mentorDestroy'])->name('user-management.mentor.destroy');
        Route::post('/{id}/update', [UserManagementController::class, 'mentorUpdate'])->name('user-management.mentor.update');
    });
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserManagementController::class, 'user'])->name('user-management.user');
        Route::get('/{id}/delete', [UserManagementController::class, 'userDestroy'])->name('user-management.user.destroy');
        Route::post('/{id}/update', [UserManagementController::class, 'userUpdate'])->name('user-management.user.update');
    });

});

