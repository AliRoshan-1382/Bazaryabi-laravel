<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    public function SupporterDetail()
    {
        $user["id"] = Auth::user()->id; 
        $user["name"] = Auth::user()->name; 
        $user["email"] = Auth::user()->email; 

        return $user;
    }

    public function Dashboard(){
        $user = $this->SupporterDetail();
        
        return view('Supporter.dashboard', compact('user'));
    }
}
