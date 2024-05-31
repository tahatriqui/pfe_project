<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == "user") {
            $products =  Product::limit(10)->get();
            return view('user.dashboard',compact("products"));
        } else {
            $count = Notification::where('checked',true)->count();
            $nots = Notification::orderBy('created_at', 'desc')->paginate(3);

            return view('admin.dashboard',compact("nots","count"));
        }
    }

    public function details($id){
        $usertype = Auth::user()->usertype;
        if ($usertype == "user") {
        $products = Product::find($id);
        return view("user.prod_details",compact("products"));
        } else {
            return redirect()->route('home');
        }
    }

    public function cart(){
        $products = auth()->user()->products;
        return view("user.cart",compact("products"));
    }


    public function addtocart($id){
        {

            $user = auth()->user();
            $product = Product::find($id);
            if ($product) {
                $user->products()->attach($product->id);
                return redirect()->back()->with('success', 'Product added to cart!');
            }
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

    public function clearCart(){
        {
            auth()->user()->products()->detach();
           return redirect()->back();
        }
    }
    public function delete($id){
        {

            auth()->user()->products()->detach($id);
           return redirect()->back();
        }
    }



}
