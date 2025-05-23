<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\InitiativeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NotificationssController;
use App\Http\Controllers\Admin\OwnersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\website\AuthWebsiteController;
use App\Http\Controllers\website\ContactController as WebsiteContactController;
use App\Http\Controllers\website\InitiativeRecommendationController;
use App\Http\Controllers\website\JoinInitiativeController;
use App\Http\Controllers\website\NewsController as WebsiteNewsController;
use App\Http\Controllers\website\ProfileController;
use App\Http\Controllers\website\ReviewController;
use App\Http\Controllers\website\UserInitiativeController;
use App\Http\Controllers\website\WebsiteController;

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
Route::get('/dashboard',[AdminController::class,'index'])->name('admin.index')->middleware('auth');

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



// News Routes
Route::resource('news',NewsController::class);
Route::resource('initiative',InitiativeController::class);
Route::resource('users',UserController::class);
Route::resource('owners',OwnersController::class);
Route::resource('contacts',ContactsController::class);
Route::resource('notifications',NotificationssController::class);







// Chart Routes

Route::get('/getChartData', [ChartController::class, 'getChartData'])->name('getChartData');
Route::get('/getDonutChartData', [ChartController::class, 'getDonutChartData'])->name('getDonutChartData');



// Website Routes
// Route::get('/', [WebsiteController::class,'index'])->name('website.index');

Route::get('/',[WebsiteController::class,'index'])->name('website.index');

Route::get('/details/initiative/{id}',[WebsiteController::class,'details'])->name('details.initiative');


Route::get('join/{id}',[JoinInitiativeController::class ,'index'])->name('website.join.index');
Route::post('join/{id}',[JoinInitiativeController::class ,'requestToJoin'])->name('website.join');

Route::delete('/initiatives/{id}/leave', [UserInitiativeController::class, 'leaveInitiative'])->name('initiatives.leave'); // Leave initiative


Route::get('user/initiative/{id}',[UserInitiativeController::class ,'index'])->name('user.initiative');


Route::get('user/requests/initiative',[UserInitiativeController::class,'userInitiativeRequests'])->name('user.initiative.requests');

// Auth User Routes


Route::get('user-login' ,[AuthWebsiteController::class,'showUserLoginForm'])->name('user.login');


Route::post('/login-user', [AuthWebsiteController::class, 'loginUser'])->name('login.user');



Route::get('user-register' ,[AuthWebsiteController::class,'showUserRegisterForm'])->name('userRegister');


Route::post('/register-user', [AuthWebsiteController::class, 'registerUser'])->name('user.register');

Route::post('user-logout',[AuthWebsiteController::class,'logoutUser'])->name('user.logout');



Route::get('user-profile',[ProfileController::class,'index'])->name('user.profile');

Route::post('/contact', [WebsiteContactController::class, 'store'])->name('user.contact');


Route::get('/details/news/{id}',[WebsiteNewsController::class,'newsDetails'])->name('details.news');

Route::get('/recommendations', [InitiativeRecommendationController::class, 'showRecommendationStepper'])->name('recommendations.stepper');
Route::post('/recommendations', [InitiativeRecommendationController::class, 'getRecommendations'])->name('recommendations.get');



Route::post('/product/{id}/review', [ReviewController::class, 'product_review'])->name('site.product_review');


// add notification to users
// give certificate to user in initiative 
// ==========================================












