<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    public function index (){
        $products = Product::paginate(5);
        $count = Notification::where('checked', true)->count();
        $all = Notification::count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.prouct.index',compact("products","all", "count", "nots"));
    }

    public function delete ($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with("sup",'deleted with success');
    }

    public function addPage (){
        $cat = Category::all();
        $products = Product::paginate(5);
        $count = Notification::where('checked', true)->count();
        $all = Notification::count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.prouct.ajouter',compact("cat","products","all", "count", "nots"));
    }

    public function add (Request $req){
        $req->validate([
            'nom' => 'required|string|min:3|max:25',
            'prix' => 'required|numeric',
            'category' => 'required',
            'description' => 'required|string|max:1000',
            'img' => 'required|image|max:2048',
        ]);

        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $imagePath = $image->store('images', 'public'); // Store the image in the 'public/images' directory
        }

        Product::create([
            "nom"=>$req->nom,
            "prix"=>$req->prix,
            "category_id"=>$req->category,
            "desc"=>$req->description,
            "img"=>$imagePath
        ]);
        return redirect()->route("prod.index")->with('suc',"ajoute succecfully");
    }

    public function editPage ($id){
        $cat = Category::all();
        $products = Product::find($id);
        $count = Notification::where('checked', true)->count();
        $all = Notification::count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.prouct.modifier',compact("cat","products","all", "count", "nots"));
    }

    public function edit (Request $req,$id){
        $products = Product::find($id);

        $req->validate([
            'nom' => 'required|string|min:3|max:25',
            'prix' => 'required|numeric',
            'category' => 'required',
            'description' => 'required|string|max:1000',
        ]);

        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $imagePath = $image->store('images', 'public');
            $products->update([
                "nom"=>$req->nom,
                "prix"=>$req->prix,
                "category_id"=>$req->category,
                "desc"=>$req->description,
                "img"=>$imagePath
            ]);
        }else{
            $products->update([
                "nom"=>$req->nom,
                "prix"=>$req->prix,
                "category_id"=>$req->category,
                "desc"=>$req->description,
            ]);
        }

        return redirect()->route("prod.index")->with('mod',"modifier succecfully");
    }
}
