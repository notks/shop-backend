<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Cors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        error_log('1111111111111111111111111111111111111111');
        $this->middleware('auth:api');
        error_log('22222222222222222222222222222222');
    }
    public function show(Request $request)
    {
        error_log($request);

        error_log('//////////////////////////////////');
        return Auth::user();
    }
}