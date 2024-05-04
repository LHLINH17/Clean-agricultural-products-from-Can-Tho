<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerUserService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerUserService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $customer = $this->customerService->getCustomerAll($request);
//        dd($customer);
        return view('admin.customer.list', [
            'title' => 'Customer manager',
            'customers' => $customer
        ]);
    }
}
