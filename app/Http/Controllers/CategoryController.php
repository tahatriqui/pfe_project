<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(){
        $userType = Auth::user()->usertype;
        if($userType == "admin"){
        $category = Category::paginate(6);
        $count = Notification::where('checked',true)->count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(3);
        return view("admin.category.index",compact('category',"count","nots"));
        }else{
            return redirect()->route('home');
        }
    }


    public function addPage(){
        $userType = Auth::user()->usertype;
        if($userType == "admin"){
        $count = Notification::where('checked',true)->count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(3);
        return view("admin.category.ajoutePage",compact("count","nots"))->with(['suc'=>"added successfully"]);
    }else{
        return redirect()->route('home');
    }
    }

    public function add(Request $req){
        $req->validate([
            "cat"=>"required|min:5|max:20"
        ],[
            "cat.required"=>"ce champs est obligatoire"
        ]);

        Category::insert([
            "category"=>$req->cat
        ]);

        return redirect()->route('cat.index')->with(['suc'=>"added successfully"]);
    }


    public function modPage($id){
        $cat = Category::findOrFail($id);
        $count = Notification::where('checked',true)->count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(3);
        return view('admin.category.modPage',compact('count','nots',"cat"));
    }


    public function mod(Request $req,$id){
        $req->validate([
            "cat"=>"required|min:5|max:20"
        ],[
            "cat.required"=>"ce champs est obligatoire"
        ]);

        Category::findOrFail($id)->update([
            "category"=>$req->cat
        ]);

        return redirect()->route('cat.index')->with(['mod'=>"modifier successfully"]);
    }


    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('cat.index')->with(['sup'=>"deleted successfully"]);
    }
}
