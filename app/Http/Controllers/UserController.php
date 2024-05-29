<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $userType = Auth::user()->usertype;
        if($userType == "admin"){
        $users = User::where("usertype", "user")->paginate(10);
        $count = Notification::where('checked', true)->count();
        $nots = Notification::orderBy('created_at', 'desc')->paginate(3);
        return view("admin.Users.index", compact('users', "count", "nots"));}
        else{
            return redirect()->route("home");
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
