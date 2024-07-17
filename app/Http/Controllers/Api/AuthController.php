<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    public function register(Request $request){
     $validatedData = $request->validate([
        'first_name' => 'required|max:55',
        'last_name' => 'required|max:55',
        'email' => 'required|email|max:255|unique:users',
        'phone' => 'required|max:255',
        'city' => 'required|max:255',
        'password' => 'required|min:5|confirmed',
    ]);


    $user = User::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'city' => $validatedData['city'],
        'password' => Hash::make($validatedData['password']),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Registration successful',
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user,
        'status' => true,
    ]);
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($validatedData)) {
            return response()->json([
                'message' => 'Invalid credentials',
                'status' => false,
            ], 401);
        }

        $user = User::where('email', $validatedData['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'status' => true,
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout successful',
            'status' => true,
        ]);
    }

    public function refresh(Request $request){
        $user = $request->user();

        $new_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Token refreshed',
            'access_token' => $new_token,
            'token_type' => 'Bearer',
            'status' => true,
        ]);
    }
    
    public function getProfile(Request $request){
        return response()->json([
            'user' => $request->user(),
            'status' => true,
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not found',
                'status' => false,
            ], 404);
        }

        $code = mt_rand(100000, 999999);

        $user->password_reset_code = $code;
        $user->save();

        Mail::raw("Your password reset code is: $code", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Password Reset Code');
        });

        return response()->json([
            'message' => 'Password reset code sent to your email',
            'code' => $code,
            'status' => true,
        ]);
    }

    public function verifyAccount(Request $request){

        $validatedData = $request->validate([
            'code' => 'required|numeric',
        ]);

        $user = User::where('password_reset_code', $validatedData['code'])
                    ->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid code',
                'status' => false,
            ], 400);
        }

        $user->email_verified_at = now();
        $user->password_reset_code = null;
        $user->save();

        return response()->json([
            'message' => 'Account verified successfully',
            'status' => true,
        ]);
    }
    public function resetPassword(Request $request){
          
        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = $request->user();
      

        if (!$user) {
            return response()->json([
                'message' => 'Invalid code',
                'status' => false,
            ], 400);
        }

        $user->password = bcrypt($validatedData['password']);
        $user->password_reset_code = null;
        $user->save();

        return response()->json([
            'message' => 'Password has been reset successfully',
            'status' => true,
        ]);
    }
}