<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Cors;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_decode;

class OrderController extends Controller
{
    public function __construct()
    {
        error_log('1111111111111111111111111111111111111111');
        $this->middleware('auth:api');
        $this->middleware(Cors::class);
        error_log('22222222222222222222222222222222');
    }
    public function show(Request $request)
    {
        $order=new Order;
     
     $cartstr=json_encode($request->cart);
     $cart=json_decode($cartstr);
     //error_log($cart[0]->name);
     foreach($cart as $item){
         error_log($item->name);
         error_log($item->id);
     }
     return $cart;
     
       

        error_log('//////////////////////////////////');
        return 200;    }
}