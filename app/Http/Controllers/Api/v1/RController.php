<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Cors;
use Illuminate\Http\Request;

class RController extends Controller
{
    public function __construct()
    {
        error_log('mmmmmmmmmmm');
        $this->middleware(Cors::class);
        
    }

public function register(Request $request){
error_log('aaaaaaaaaaa');
error_log($request);
return $request->a;

}}
