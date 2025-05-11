<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\InitiativeController;
use App\Http\Controllers\Admin\NewsController;

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
Route::get('/',[AdminController::class,'index'])->name('admin.index')->middleware('auth');

// Owner Auth

Route::get('/login-owner', [AuthController::class, 'showLoginOwnerForm'])->name('owner.login');

Route::post('/login-owner', [AuthController::class, 'loginOwner'])->name('owner.login');

Route::get('/register-owner', [AuthController::class, 'showRegisterOwnerForm'])->name('owner.register');
Route::post('/register-owner', [AuthController::class, 'registerOwner'])->name('owner.register');




 // Admin Auth
 Route::get('/login-admin', [AuthController::class, 'showloginAdminForm'])->name('admin.login');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('admin.login');
// Route::post('/register-admin', [AuthController::class, 'registerOwner'])->name('admin.register');



// Logout Route

Route::post('logout',[AuthController::class,'logout'])->name('logout');



// News Route
Route::resource('news',NewsController::class);
Route::resource('initiative',InitiativeController::class);
Route::resource('users',UserController::class);




// Chart Route

Route::get('/getChartData', [ChartController::class, 'getChartData'])->name('getChartData');
Route::get('/getDonutChartData', [ChartController::class, 'getDonutChartData'])->name('getDonutChartData');



// Website Route
Route::get('/website', function () {
    return view('website.index');
})->name('website.index');
