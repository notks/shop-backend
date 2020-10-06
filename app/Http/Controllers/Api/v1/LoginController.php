<?php

namespace App\Http\Controllers\Api\v1;

use Laravel\Passport\Passport;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use GuzzleHttp;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(Cors::class);
    }
    public function login(Request $request)
    {
        $req = json_encode($request);
        //error_log($req);

        $creds = $request->only(['email', 'password']);
        error_log($request);
        if (!Auth::attempt($creds)) {
            return response(['message' => 'Invalid Email or password!'], 401);
        }
        error_log($creds['email']);

        $token = Auth::user()->createToken('accessToken')->accessToken;
        return response(['user' => Auth::user(), 'token' => $token]);
    }
    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();
        return 'logedout';
    }
}