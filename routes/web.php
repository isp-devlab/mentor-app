<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;

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

Route::get('/group', [GroupController::class, 'index'])->name('group'); 
Route::get('/group/{id}/overview', [GroupController::class, 'overview'])->name('group.overview'); 
Route::get('/group/{id}/reset-code', [GroupController::class, 'overviewReset'])->name('group.overview.reset'); 

Route::get('/group/{id}/mentor', [GroupController::class, 'mentor'])->name('group.mentor'); 
Route::post('/group/{id}/mentor', [GroupController::class, 'mentorStore'])->name('group.mentor.store'); 
Route::get('/group/{id}/mentor/{idTeacher}', [GroupController::class, 'mentorDestroy'])->name('group.mentor.destroy'); 

Route::get('/group/{id}/member', [GroupController::class, 'member'])->name('group.member'); 
Route::get('/group/{id}/member/{idMember}', [GroupController::class, 'memberDestroy'])->name('group.member.destroy'); 

Route::get('/group/{id}/discussion', [GroupController::class, 'discussion'])->name('group.discussion'); 
Route::get('/group/{id}/assignment', [GroupController::class, 'assignment'])->name('group.assignment'); 

Route::prefix('/setting')->group(function () {
    Route::get('/class', [SettingController::class, 'class'])->name('setting.class'); 

    Route::get('/group', [SettingController::class, 'group'])->name('setting.group'); 
    Route::post('/group', [SettingController::class, 'groupStore'])->name('setting.group.store'); 
    Route::get('/group/{id}/delete', [SettingController::class, 'groupDestroy'])->name('setting.group.destroy'); 
    Route::post('/group/{id}/update', [SettingController::class, 'groupUpdate'])->name('setting.group.update'); 
});

