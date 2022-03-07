<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Http\Request;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $customers=Customer::all();
        return view('customers.index',compact('customers'));

        // $ActiveCustomers = Customer::active()->get();
        // $InactiveCustomers = Customer::Inactive()->get();
        // return view('customers.index',compact('ActiveCustomers','InactiveCustomers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = New Customer;
        return view('customers.create',compact('companies','customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());
        event(new NewCustomerHasRegisteredEvent($customer));


        // Mail::to($customer->email)->send(new WelcomeNewUserMail());

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        return redirect('customers/'.$customer->id);

    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers');

    }



    private function validateRequest()
    {
          return request()->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'active' => 'required',
                'company_id' => 'required',
            ]);
    }


}
