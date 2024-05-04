<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $order_count = Order::count();
        $customer_count = Customer::count();
        $product_count = Product::count();
        $orders = Order::where('status',0)->get();
        return view('admin.home',compact('order_count','customer_count','product_count','orders'),[
            'title'=>'Admin dashboard',
        ]);
    }

    public function logout()
    {
        \auth()->logout();
        return redirect()->route('adminLogin')->with('success', 'Logout Successful');
    }
}
