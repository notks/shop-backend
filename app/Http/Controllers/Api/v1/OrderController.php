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
    public function save(Request $request)
    {


        $cartstr = json_encode($request->cart);
        $cart = json_decode($cartstr);
        //error_log($cart[0]->name);
        foreach ($cart as $item) {
            for ($i = 0; $i < $item->q; $i++) {
                $order = new Order;
                $order->product_id = $item->id;
                $order->user_id = Auth::user()->id;
                $order->address = $request->address;
                $order->telephone = $request->telephone;
                $order->save();
                error_log($i);
            }
        }
        return $cart;



        error_log('//////////////////////////////////');
        return 200;
    }

    public function show()
    {
     $orders=Order::where('user_id',Auth::user()->id)->join('users','user_id','users.id')->join('products','product_id','products.id')->get();
     return $orders;
    }
}
