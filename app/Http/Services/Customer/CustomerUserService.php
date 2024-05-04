<?php

namespace App\Http\Services\Customer;

use App\Models\Customer;

class CustomerUserService
{
    public function getCustomerAll($key)
    {
        $key = request()->key;
        if($key == ''){
            return Customer::orderBy('id')->paginate();
        }
        return Customer::select('id', 'name', 'email', 'phone', 'address','status', 'created_at')
            ->where('name', 'like', '%'.$key.'%')
            ->paginate('10');
    }
}
