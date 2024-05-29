<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $userType = Auth::user()->usertype;
        if ($userType == "admin") {
            $count = Notification::where('checked', true)->count();
            $all = Notification::count();
            $nots = Notification::orderBy('created_at', 'desc')->paginate(8);
            return view("admin.notifications.index", compact("all", "count", "nots"));
        } else {
            return redirect()->route('home');
        }
    }

    public function not($id)
    {
        Notification::find($id)->update([
            'checked' => false
        ]);
        return redirect()->back();
    }

    public function delete($id)
    {
        Notification::find($id)->delete();
        return redirect()->back();
    }
}
