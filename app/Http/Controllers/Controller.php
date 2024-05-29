<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function welcome()
    {
        $check = Auth::check();
        if($check){
            if(auth()->user()->usertype == 'user'){
            $products =  Product::limit(10)->get();
            return view('user.dashboard',compact("products"));
            }
            else{
                return redirect()->route('home');
            }
        }else{
            $products =  Product::limit(10)->get();
            return view('visitor.welcome',compact("products"));
        }


    }
}
