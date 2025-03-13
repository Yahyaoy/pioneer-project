<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\InitiativeController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes (Public)
Route::post('/register', [AuthController::class, 'register']); // User Registration
Route::post('/login', [AuthController::class, 'login']);       // User Login
Route::post('/register/initiative-owner', [AuthController::class, 'registerInitiativeOwner']);


// Email Verification Routes
Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill(); // Mark email as verified
    return response()->json(['message' => 'Email successfully verified.']);
})->middleware(['signed'])->name('verification.verify');


//  Protected Routes (Require Authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Resend Email Verification
//    Route::post('/email/verify/resend', function (Request $request) {
//        if ($request->user()->hasVerifiedEmail()) {
//            return response()->json(['message' => 'Email is already verified.'], 400);
//        }
//        $request->user()->sendEmailVerificationNotification();
//        return response()->json(['message' => 'Verification email resent.']);
//    });
//
//    // Example of a Protected Route (Requires Email Verification)
//    Route::get('/profile', function (Request $request) {
//        return response()->json($request->user());
//    })->middleware('verified'); // Ensures user is verified
//
//    // Logout User
//    Route::post('/logout', function (Request $request) {
//        $request->user()->tokens()->delete(); // Delete all user tokens
//        return response()->json(['message' => 'Logged out successfully']);
//    });

    //  Public Routes (Accessible by Normal Users)
        Route::get('/initiatives', [InitiativeController::class, 'index']); // View all initiatives
        Route::get('/initiatives/{id}', [InitiativeController::class, 'show']); // View single initiative
        Route::post('/initiatives/{id}/join', [InitiativeController::class, 'requestToJoin']); // Request to join an initiative
        Route::get('/initiatives/{id}/participants', [InitiativeController::class, 'participants']); // View participants
        Route::delete('/initiatives/{id}/leave', [InitiativeController::class, 'leaveInitiative']); // Leave initiative

// Protected Routes for Initiative Owners (Only Owners Can Access)
    Route::middleware(['role:initiative_owner'])->group(function () {
        Route::post('/initiatives', [InitiativeController::class, 'store']); // Create initiative
        Route::put('/initiatives/{id}', [InitiativeController::class, 'update']); // Update initiative
        Route::delete('/initiatives/{id}', [InitiativeController::class, 'destroy']); // Delete initiative
        Route::post('/initiatives/{id}/participants/{participantId}', [InitiativeController::class, 'manageParticipant']); // Accept/Reject participants
    });

    // Home Page
    Route::get('/home',[HomeController::class,'index']);
    Route::get('/home/news', [HomeController::class, 'getNews']); // View more news
    Route::get('/home/organizations', [HomeController::class, 'getOrganizations']); // View more organizations
    Route::get('/home/initiatives', [HomeController::class, 'getInitiatives']); // View more initiatives


    // Organizations
    Route::get('/organizations', [OrganizationController::class, 'index']);
    // Show organization with initiatives
    Route::get('/organizations/{id}', [OrganizationController::class,'show']);

    // show and update profile
    Route::get('/profile',[ProfileController::class, 'show']); // عرض الملف الشخصي
    Route::post('/profile/update', [ProfileController::class, 'update']); // تحديث المعلومات الأساسية

    // News
    Route::get('/news', [NewsController::class,'index']);
    Route::get('/news/{id}', [NewsController::class,'show']);
    Route::post('/news',[NewsController::class,'store'])->middleware('role:initiative_owner');
    Route::put('/news/{id}',[NewsController::class, 'update'])->middleware('role:initiative_owner');
    Route::delete('/news/{id}', [NewsController::class,'destroy'])->middleware('role:initiative_owner');
});// end auth

// Contact Us
Route::post('/contact', [ContactController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/contact-messages', [ContactController::class, 'index'])->middleware('admin'); // Admin only
    Route::get('/contact-messages/{id}', [ContactController::class,'show'])->middleware('admin'); // Admin only
});


//  Google OAuth Routes(For Social Login)
Route::prefix('auth/google')->group(function () {
    //  Redirect to Google for Authentication
    Route::get('/redirect', function () {
        return response()->json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
        ]);
    });

    //  Handle Google OAuth Callback
    Route::get('/callback', function () {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user exists by provider_id
            $user = User::where('provider_id', $googleUser->getId())->first();

            if (!$user) {
                // Create a new user if they don't exist
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                    'password' => bcrypt('randompassword'), // Placeholder password
                ]);
            }

            // Generate an API token for the user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid credentials', 'message' => $e->getMessage()], 401);
        }
    });

}); // end register by google

// الاشعارات
//  عرض جميع الإشعارات
Route::middleware('auth:sanctum')->get('/notifications', [NotificationController::class, 'index']);

//  وضع الإشعار كمقروء
Route::middleware('auth:sanctum')->put('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);

//  حذف إشعار معين
Route::middleware('auth:sanctum')->delete('/notifications/{id}', [NotificationController::class, 'destroy']);

//  إنشاء إشعار جديد (للاستخدام الداخلي)
Route::middleware('auth:sanctum')->post('/notifications', [NotificationController::class, 'store']);

