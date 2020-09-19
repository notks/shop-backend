<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Cors;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Cors::class);
    }
    public function show(){
        $products=Products::all();

return json_encode($products);
//        return $products;
    }
}
