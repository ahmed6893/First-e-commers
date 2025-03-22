<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
use Cart;


class CustomerController extends Controller
{
    public $customer;

    public function register()
    {
        return view('website.customer.register');
    }
    public function login()
    {
        return view('website.customer.login');
    }
    public function saveNewCustomer(Request $request)
    {
        $this->customer =Customer::saveCustomer($request);

        Session::put('customerId',$this->customer->id);
        Session::put('customerName',$this->customer->name);

        if (Session::get('checkout'))
        {
            return redirect('/checkout');
        }
        return redirect('/');
    }
    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email',$request->user_name)->orWhere('mobile',$request->user_name)->first();

        if($this->customer){
                        if(password_verify($request->password,$this->customer->password))
                        {
                            Session::put('customerId',$this->customer->id);
                            Session::put('customerName',$this->customer->name);

                            if (Session::get('checkout'))
                            {
                                return redirect('/checkout');
                            }
                            return redirect('/');
                        }
                        else{
                            return back()->with('message','please use valid password');
                        }
        }
        else{
            return back()->with('message','please use valid email or phone');
        }
    }

    public function logout()
    {
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
}
