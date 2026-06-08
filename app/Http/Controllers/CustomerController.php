<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
     public function index()
    {  
        // raw sql
        // $categories = DB::select('SELECT * FROM categories');

        //Query builder
        // $categories = DB::table('categories')->get();

        //Eloquent ROM
        $customers = Customer::all();
        

        // dd($categories);
        return view('customers.list',compact('customers'));
    }
}
