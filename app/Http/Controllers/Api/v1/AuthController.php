<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);


    }

    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function me()
    {
        $me = auth()->user();
        return new JsonResponse(['result' => $me]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return response()->json(['message' => 'User sukses logout dari aplikasi']);
    }

    // public function refresh() {
    //     return $this->createNewToken(auth()->refresh());
    // }

    protected function createNewToken($token){
        return response()->json([
            'access' => $token,
            'user' => auth()->user()
        ]);
    }
}
