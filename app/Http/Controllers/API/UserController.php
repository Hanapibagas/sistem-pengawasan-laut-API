<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use JWTAuth;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return (new UserResource($request->user()))
            ->additional(['meta' => [
                'token' => $token,
            ]]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password-confirm' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($request->password),
            'password-confirm' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        $token = auth()->attempt($credentials);

        return (new UserResource($request->user()))
            ->additional(['meta' => [
                'token' => $token,
            ]]);
    }

    public function user(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['error' => 'token_invalid'], 400);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['error' => 'token_expired'], 400);
            } else {
                return response()->json(['error' => 'token_not_found'], 401);
            }
        }
        return new UserResource($user);
    }

    // public function logout(Request $request)
    // {
    //     $token = $request->user()->currentAccessToken()->delete();

    //     return ResponseFormatter::success($token, 'Token Revoked');
    // }

    public function updateprofile(Request $request)
    {
        $data = $request->all();
    }
}
