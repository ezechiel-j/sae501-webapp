<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(Request $request) {
        try {
            // définition des règles de validation
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'first_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);

            // gestion de l'erreur de validation
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false, 
                    'message' => 'Erreur de validation', 
                    'errors' => $validateUser->errors()
                ], 401);
            }
            // si validation ok création du user
            $user = User::create([
                'name' => $request->name,
                'first_name' => $request->first_name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // réponse renvoyé au frontend
            return response()->json([
                'status' => true,
                'message' => 'User created successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
                // création du token dans la table personal_access_token
            ], 200);
        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500); // renvoie une erreur 500
        }
    }

    public function login(Request $request) {
        // Validation for login request
        $validateUser = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateUser->errors()
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => 'Email or password don\'t match'
            ], 401);
        }
        // création d'un token de connexion
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    public function me(Request $request) {
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'Profil information',
            'data' => $userData,
            'id' => auth()->user()->id
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function forgotPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ]);

    $token = Str::random(64);
    
    // Store reset token
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $request->email],
        [
            'token' => $token,
            'created_at' => Carbon::now()
        ]
    );

    return response()->json([
        'status' => true,
        'message' => 'Password reset token generated successfully',
        'token' => $token // Only for testing, remove this in production
    ]);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'token' => 'required',
        'password' => 'required|min:8|confirmed'
    ]);

    $resetRecord = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();

    if (!$resetRecord) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid reset token'
        ], 400);
    }

    if (Carbon::parse($resetRecord->created_at)->addHours(24)->isPast()) {
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        return response()->json([
            'status' => false,
            'message' => 'Token has expired'
        ], 400);
    }

    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return response()->json([
        'status' => true,
        'message' => 'Password has been reset successfully'
    ]);
}
}