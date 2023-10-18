<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class AdminController extends Controller
{
    public function login(){
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
    public function AuthLogin(Request $request){
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
            return redirect()->back()->with('error', 'please enter currect email and password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function adminDetail()
    {
        $user["id"] = Auth::user()->id; 
        $user["name"] = Auth::user()->name; 
        $user["email"] = Auth::user()->email; 

        return $user;
    }

    public function Dashboard(){
        $user = $this->adminDetail();

        return view('Dashboard.Dashboard', compact('user'));
    }

    public function SupporterForm()
    {
        $user = $this->adminDetail();

        return view('Admin.supporterform', compact('user'));
    }

}
