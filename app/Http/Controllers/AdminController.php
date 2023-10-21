<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Shop;
use Hash;
class AdminController extends Controller
{
    public function adminDetail()
    {
        $user["id"] = Auth::user()->id; 
        $user["name"] = Auth::user()->name; 
        $user["email"] = Auth::user()->email; 
        $user["picture"] = Auth::user()->Pic_location;

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

    public function AddSupporter(Request $request){
        $email = $request->email;
        $count = User::where('email', $email)->count();

        if ($count == 0) {
            $imageName = '';
            if (!is_null($request->picture)) {
                $request->validate([
                    'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
                ]);
                $imageName = 'S' . time() . '.' . $request->picture->extension();
                $request->picture->move(public_path('pictures'), $imageName);
            }
            if (empty($request->access)) 
            {
                $access = 'of';
            }
            else 
            {
                $access = $request->access;
            }

            $Supporter = new User;
            $Supporter->Pic_location = $imageName;
            $Supporter->name = $request->name;
            $Supporter->access = $access;
            $Supporter->user_type = 2;
            $Supporter->email = $request->email;

            $Supporter->password = Hash::make($request->password);

            $Supporter->save();

            $data['status'] = true;
            $data['message'] = 'پشتیبان با موفقیت ثبت شد';

            $data['url'] = 'Admin/supportertable';
        } 
        else {
            $data['message'] = 'کاربر با این ایمیل در سامانه وجود دارد';

            // return redirect()->back()->with('error', 'کاربر با این ایمیل در سامانه وجود دارد');
        }
        return view('erorr-success.index', $data);
    }

    public function supportertable(){
        $user = $this->adminDetail();
        $Supporters = User::where('user_type', 2)->get();

        return view('Admin.supportertable', compact('user', 'Supporters'));
    }

    public function shoptable()
    {
        $user = $this->adminDetail();
        $shops = Shop::all();

        return view('Admin.shoptable', compact('user', 'shops'));
    }

    public function updateSupporter(Request $request)
    {
        $count = User::where('id', $request->id)->where('email', $request->email)->count();

        $data['url'] = 'Admin/supportertable';
        if ($count == 0) {
            $user_count = User::where('email', $request->email)->count();
            if ($user_count == 1) {
                $data['status'] = false;
                $data['message'] = 'کاربر با این ایمیل در سامانه وجود دارد';
                $data['url'] = 'Admin/supportertable';
            }
            else
            {
                if (empty($request->access)) 
                {
                    $access = 'of';
                }
                else 
                {
                    $access = $request->access;
                }
                $user_update = User::where('id',$request->id)->where('user_type', 2)->update(['email'=>$request->email, 'name'=>$request->name, 'access'=>$access]);

                if ($user_update) 
                {
                    $data['status'] = True;
                    $data['message'] = 'پشتیبان مورد تظر با موفقیت ویرایش شد';
                }
                else 
                {
                    $data['status'] = False;
                    $data['message'] = 'خطا در هنگام اجرای عملیات';
                }
            }
        }
        else 
        {
            if (empty($request->access)) 
            {
                $access = 'of';
            }
            else 
            {
                $access = $request->access;
            }
            $user_update = User::where('id',$request->id)->where('user_type', 2)->update(['name'=>$request->name, 'access'=>$access]);

            if ($user_update) 
            {
                $data['status'] = True;
                $data['message'] = 'پشتیبان مورد تظر با موفقیت ویرایش شد';
                $data['url'] = 'Admin/supportertable';
            }
            else 
            {
                $data['status'] = False;
                $data['message'] = 'خطا در هنگام اجرای عملیات';
            }
        }
        return view('erorr-success.index', $data);
    }

    public function updateShop(Request $request)
    {
        
    }
}
