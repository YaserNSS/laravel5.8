<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $ActiveCustomers = Customer::active()->get();
        $InactiveCustomers = Customer::Inactive()->get();

        // $ActiveCustomers = Customer::where('active',1)->get();
        // $InactiveCustomers = Customer::where('active',0)->get();
        // $customers = Customer::all();
        // return view('internals.customers',[
        //     'customers' => $customers,
        // ]);

        return view('internals.customers',compact('ActiveCustomers','InactiveCustomers'));
    }


    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required'
        ]);

        Customer::create($data);

        return back();
    }
}
