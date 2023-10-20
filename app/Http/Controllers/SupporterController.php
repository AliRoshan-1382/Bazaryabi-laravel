<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;

class SupporterController extends Controller
{
    public function SupporterDetail()
    {
        $user["id"] = Auth::user()->id; 
        $user["name"] = Auth::user()->name; 
        $user["email"] = Auth::user()->email; 
        $user["picture"] = Auth::user()->Pic_location;


        return $user;
    }

    public function Dashboard(){
        $user = $this->SupporterDetail();
        
        return view('Supporter.dashboard', compact('user'));
    }

    public function shopForm()
    {
        $user = $this->SupporterDetail();

        return view('Supporter.ShopAdderForm', compact('user'));
    }

    public function shopAdd(Request $request)
    {
        $count = Shop::where('shop_number', $request->tel)->count();
        if ($count == 0) 
        {
            $email = '';
            if (isset($request->email)) {
                $email = $request->email;
            }
            $shop = new Shop;
            $shop->shop_name = $request->name;
            $shop->shop_number = $request->tel;
            $shop->shop_email = $email;

            $shop->save();

            $data['status'] = true;
            $data['message'] = 'فروشگاه با موفقیت ثبت شد';

            $data['url'] = 'Supporter/shoptable';
        }
        else 
        {
            return redirect()->back()->with('error', 'فروشگاه با این شماره تلفن در سامانه وجود دارد');
        }
        return view('erorr-success.index', $data);
    }

    public function shoptable()
    {
        $user = $this->SupporterDetail();
        $shops = Shop::all();

        return view('Supporter.shoptable', compact('user', 'shops'));
    }
}
