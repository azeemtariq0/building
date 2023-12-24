<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;
use DB;

class apploginController extends Controller
{
    
    public function login(Request $request)
    {
      
        $credentials = $request->only('email', 'password');
        $validate = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        $email = User::where('email', $request->email)->first();

        if ($email) {
            $checkPass = Hash::check($request->password, $email->password);
            if ($checkPass) {
                try {
                    $token = JWTAuth::attempt($credentials);

                    if (!$token) {
                        return response()->json(['error' => 'Invalid Login credentials'], 400);
                    } else {
                        return response()->json(['token' => $token], 200);
                    }

                } catch (JWTException $e) {
                    return response()->json(['error' => $e->getMessage()], 400);
                }
            } else {
                return response()->json(['error' => 'wrong password'], 400);
            }
        } else {
            return response()->json(['error' => 'email does not exists'], 400);
        }
        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $validate = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors(), 400);
        }
        try {
            JWTAuth::invalidate($request->token);
            return response()->json(['success' => 'logged out successfully'], 200);
        } catch (JWTException $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

   
}