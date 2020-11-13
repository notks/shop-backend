<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Middleware\Cors;


use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\json_decode;

class NewUserController extends Controller
{
    public function __construct()
    {
       $this->middleware(Cors::class);
        
    }
    
    public function register(Request $request){
     

        if(User::where('email',$request->email)->first()){
            return response(['message'=>'Email exists!']);
        }
        $data=json_encode($request->all());
        error_log($data);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
       // User::create([
         //   'name' => $request->name,
           // 'email' => $request->email,
            //'password' => Hash::make($request->password)
        //]);
        return ['message'=>'Done!'];
        
        }
}
