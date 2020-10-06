<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Cors;
use Illuminate\Http\Request;

class CSRFController extends Controller
{
    public function __construct()
    {
        $this->middleware(Cors::class);
    }
    public function show(){
        error_log('//////////////////////////////');
        error_log(csrf_token());
        $token=['token'=>csrf_token()];
        return ($token);
    }
}
