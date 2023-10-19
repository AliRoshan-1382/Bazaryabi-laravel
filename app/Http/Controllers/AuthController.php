<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) 
        {
            if (Auth::user()->user_type == 1) 
            {            
                return redirect('Admin/dashboard');
            }
            else if (Auth::user()->user_type == 2) 
            {
                return redirect('Supporter/dashboard');
            }    
        }
        return view('Login.Adminlogin'); 
    }
    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remember)) //ریممبر برای یادآوری شخص هستش
        { //  اگر ریممبر فعال بود سشن کاربر رو سیو میکنه
            if (Auth::user()->user_type == 1) 
            {            
                return redirect('Admin/dashboard');
            }
            else if (Auth::user()->user_type == 2) 
            {
                return redirect('Supporter/dashboard');
            }
        }
        else 
        {
            return redirect()->back()->with('error', 'لطفا ایمیل و پسورد را به درستی وارد کنید');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
