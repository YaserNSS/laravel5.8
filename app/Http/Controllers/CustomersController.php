<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list()
    {
        $customers = [
            'Jane Doe',
            'Jone Dao',
            'Yasir Mustafa'
        ];
        return view('internals.customers',[
            'customers' => $customers,
        ]);
    }
}
