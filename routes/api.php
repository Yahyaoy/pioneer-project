<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);


    // Send verification email again
        Route::post('/email/verify/resend', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();
            return response()->json(['message' => 'Verification email resent.']);
        })->middleware('auth:sanctum');


    // Handle email verification callback
        Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
            $request->fulfill();
            return response()->json(['message' => 'Email successfully verified.']);
        })->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
    });

    // Step 1: Get Google OAuth URL
            Route::get('/auth/google/redirect', function () {
                return response()->json([
                    'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
                ]);
            });

    // Step 2: Handle Google OAuth Callback
            Route::get('/auth/google/callback', function () {
                try {
                    $googleUser = Socialite::driver('google')->stateless()->user();

                    // Check if the user exists
                    $user = \App\Models\User::where('provider_id', $googleUser->getId())->first();

                    if (!$user) {
                        // Create a new user if they don't exist
                        $user = \App\Models\User::create([
                            'name' => $googleUser->getName(),
                            'email' => $googleUser->getEmail(),
                            'provider' => 'google',
                            'provider_id' => $googleUser->getId(),
                            'password' => bcrypt('randompassword'), // Placeholder password
                        ]);
                    }

                    // Generate an API token
                    $token = $user->createToken('auth_token')->plainTextToken;

                    return response()->json([
                        'user' => $user,
                        'token' => $token
                    ]);

                } catch (\Exception $e) {
                    return response()->json(['error' => 'Invalid credentials'], 401);
                }
            });

    //  Get Authenticated User
            Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
                return response()->json($request->user());
            });

    //  Logout User
            Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
                $request->user()->tokens()->delete();
                return response()->json(['message' => 'Logged out successfully']);
            });


