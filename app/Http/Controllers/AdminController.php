<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class AdminController extends Controller
{
    public function login(){
        if (!empty(Auth::check())) {
            return redirect('Admin/dashboard');
        }
        return view('Login.Adminlogin');  
    }
    public function AuthLogin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remember)) //ریممبر برای یادآوری شخص هستش
        { //  اگر ریممبر فعال بود سشن کاربر رو سیو میکنه
            return redirect('Admin/dashboard');
        }
        else 
        {
            return redirect()->back()->with('error', 'please enter currect email and password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function Dashboard(){
        $user["id"] = Auth::user()->id; 
        $user["name"] = Auth::user()->name; 
        $user["email"] = Auth::user()->email; 

        return view('Dashboard.Dashboard', compact('user'));
    }
}
