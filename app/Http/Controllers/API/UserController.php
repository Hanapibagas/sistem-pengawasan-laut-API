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
use Illuminate\Support\Facades\Auth;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception('Invalid Credentials');
        }

        $credentials = $request->only('email', 'password');
        if (!$token = auth()->guard("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $data['token'] = $token;
        $data['nama'] = $user->name;
        $data['roles'] = $user->roles;

        return response()->json([
            'user' => $data,
            'expires' => auth()->guard("api")->factory()->getTTL()
        ], 200);
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

        $data = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt($request->password),
            'password-confirm' => bcrypt($request->password),
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::guard("api")->attempt($credentials);

        return response()->json([
            "user" => $data,
            "token" => $token
        ]);
    }

    public function user()
    {
        $data = Auth::user();

        if ($data->file) {
            $data['file'] =  env('APP_URL') . '/gambar/user/' . $data->file;
        }

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function updateprofile(Request $request)
    {
        $data = Auth::user();

        if ($request->file('file')) {
            $file = $request->file('file');
            $name = Str::random(10) . $file->getClientOriginalName();
            $file->move('gambar/user', $name);
        } else {
            $name = $data->file;
        }


        $data->update([
            'name' => request('name'),
            'email' => request('email'),
            // 'password' => bcrypt($request->password),
            // 'password_confirmation' => bcrypt($request->password),
            'file' => $name
        ]);

        return response()->json([
            "status" => 200,
            "message" => "succes",
            "data" => $data
        ]);
    }
}
