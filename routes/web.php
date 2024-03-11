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


Route::prefix('/setting')->group(function () {
    Route::get('/group', [SettingController::class, 'group'])->name('setting.group'); 
    Route::get('/group/{id}/delete', [SettingController::class, 'groupDestroy'])->name('setting.group.destroy'); 
});

