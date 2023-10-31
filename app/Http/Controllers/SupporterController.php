<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;


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
        $ُShopNames = Shop::where('shop_access', 'on')->pluck('shop_name');
        $customers = Customer::whereIn('customer_shop', $ُShopNames)->get();
        $shops = Shop::all();
	    $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.dashboard', compact('user', 'customers', 'shops', 'color'));
    }

    public function shopForm()
    {
        $user = $this->SupporterDetail();
        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.ShopAdderForm', compact('user', 'color'));
    }

    public function shopAdd(Request $request)
    {
        $count = Shop::where('shop_name', $request->name)->count();
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
            $shop->shop_access = 'on';

            $shop->save();

            $data['status'] = true;
            $data['message'] = 'فروشگاه با موفقیت ثبت شد';

            $data['url'] = '';
        }
        else 
        {
            $data['status'] = false;
            $data['message'] = 'فروشگاه با این نام وجود دارد';
            $data['url'] = 'Supporter/shopForm';
        }
        return view('erorr-success.index', $data);
    }

    public function shoptable()
    {
        $user = $this->SupporterDetail();
        $shops = Shop::all();
        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.shoptable', compact('user', 'shops', 'color'));
    }

    public function customerForm()
    {
        $user = $this->SupporterDetail();
        $shops = Shop::all();
        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.CustomerAdderForm', compact('user', 'shops', 'color'));
    }

    public function customerAdd(Request $request)
    {
        $customer_count = Customer::where('customer_phone', $request->tel)->where('customer_shop', $request->shop)->count();

        if ($customer_count == 0) 
        {
            $email = '';
            if (isset($request->email)) 
            {
                $email = $request->email;
            }

            $data = explode(' ', \Morilog\Jalali\Jalalian::now());

            $customer = new Customer;
            $customer->customer_name = $request->name;
            $customer->customer_phone = $request->tel;
            $customer->customer_email = $email;
            $customer->customer_address = $request->address;
            $customer->customer_city = $request->city;
            $customer->customer_province = $request->province;
            $customer->customer_shop = $request->shop;
            $customer->submit_date = $data[0];
            $customer->submit_time = $data[1];

            $save = $customer->save();

            if ($save) 
            {
                $data['status'] = true;
                $data['message'] = 'مشتری مورد نظر با موفقیت ثبت شد';
                $data['url'] = 'Supporter/customerTable';
            } 
            else 
            {
                $data['status'] = false;
                $data['message'] = 'مشکلی پیش آمده است';
                $data['url'] = 'Supporter/customerTable';
            }

        }
        else 
        {
            $data['status'] = false;
            $data['message'] = 'مشتری با این شماره تلفن در فروشگاه مورد نظر قبلا ثبت شده است';
            $data['url'] = 'Supporter/customerTable';
        }
        return view('erorr-success.index', $data);
    }

    public function customerTable(){
        $user = $this->SupporterDetail();
        $ُShopNames = Shop::where('shop_access', 'on')->pluck('shop_name');
        $customers = Customer::whereIn('customer_shop', $ُShopNames)->get();

        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.CustomerTable', compact('user', 'customers', 'color'));
    }

    public function reportForm()
    {
        $user = $this->SupporterDetail();
        $ُShopNames = Shop::where('shop_access', 'on')->pluck('shop_name');
        $customers = Customer::whereIn('customer_shop', $ُShopNames)->get();

        $color = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('Supporter.reportForm', compact('user', 'customers', 'color'));
    }
}
