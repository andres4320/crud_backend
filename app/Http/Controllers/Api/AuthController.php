<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;

class AuthController extends Controller
{
    public function register (RegisterRequest $request) {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'profession' => $request->profession,
            // 'country' => $request->country,
            // 'department' => $request->department,
            'municipality_id' => $request->municipality_id
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'),201);
        
    }

    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $user = User::where('email',$request->email)->first();

        return response()->json(compact('user', 'token'),200);
    }

}