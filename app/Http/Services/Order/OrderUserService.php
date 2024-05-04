<?php

namespace App\Http\Services\Order;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderUserService
{
    public function getOrderID()
    {
        $orderID = Order::select('id')->orderBuDesc('id');
        return $orderID;
    }

    public function getProductID($id)
    {
         $product_id = OrderDetail::orderByDesc('id')->where('id',$id);
         return $product_id;
    }

    public function getCustomerID($customer_id)
    {
        $customerID = Order::orderByDesc('id')->where('id', $customer_id);
        return $customerID;
    }
}
