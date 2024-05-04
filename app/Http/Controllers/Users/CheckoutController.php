<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth('cus')->user();
        return view('order.checkout', compact('auth'),[
            'title' => 'Check Out'
        ]);
    }
    public function history()
    {
        $auth = auth('cus')->user();
        return view('order.history', compact('auth'),[
            'title' => 'History'
        ]);
    }
    public function detail(Order $order)
    {
        $auth = auth('cus')->user();
        return view('order.detail', compact('auth', 'order'),[
            'title' => 'Detail'
        ]);
    }
    public function pos_checkout(Request $req)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $auth = auth('cus')->user();

        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $data = $req->only('name', 'email', 'phone', 'address');

        $data['customer_id'] = $auth->id;

//        dd($data);
        if($order = Order::create($data))
        {
            $token = \Str::random(40);
            foreach ($auth->carts as $cart)
            {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price
                ];

                OrderDetail::create($data1);
            }
            //Xóa giỏ hàng khi đặt hàng xong
            $auth->carts()->delete();

            //
//            $product->quantity--;

            //Gửi email xác nhận
            $order->token=$token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order, $token));
//            return redirect()->route('main')->with('success', 'Please check your email to confirm your order');
            return redirect()->route('order.history')->with('success', 'Please check your email to confirm your order');
        }
        return redirect()->route('main')->with('error', 'Something error!');
    }

    public function verify($token)
    {
        $order = Order::where('token', $token)->first();
        if($order)
        {
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('order.history')->with('success', 'Order confirmation successful');
        }
        return abort(404);
    }

    public function vnpay(Request $req)
    {

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://nongsancantho.test/order/checkout";
        $vnp_TmnCode = "758RTF2M";//Mã website tại VNPAY
        $vnp_HashSecret = "IVLFJZVYJMMVVQADDWBKPRESVDKVGBME"; //Chuỗi bí mật

        $vnp_TxnRef = '1234'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 100000*10000;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
//Billing
//        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
//        $vnp_Bill_Email = $_POST['txt_billing_email'];
//        $fullName = trim($_POST['txt_billing_fullname']);
//        if (isset($fullName) && trim($fullName) != '') {
//            $name = explode(' ', $fullName);
//            $vnp_Bill_FirstName = array_shift($name);
//            $vnp_Bill_LastName = array_pop($name);
//        }
//        $vnp_Bill_Address=$_POST['txt_inv_addr1'];
//        $vnp_Bill_City=$_POST['txt_bill_city'];
//        $vnp_Bill_Country=$_POST['txt_bill_country'];
//        $vnp_Bill_State=$_POST['txt_bill_state'];
// Invoice
//        $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
//        $vnp_Inv_Email=$_POST['txt_inv_email'];
//        $vnp_Inv_Customer=$_POST['txt_inv_customer'];
//        $vnp_Inv_Address=$_POST['txt_inv_addr1'];
//        $vnp_Inv_Company=$_POST['txt_inv_company'];
//        $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
//        $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
//            "vnp_ExpireDate"=>$vnp_ExpireDate,
//            "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
//            "vnp_Bill_Email"=>$vnp_Bill_Email,
//            "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
//            "vnp_Bill_LastName"=>$vnp_Bill_LastName,
//            "vnp_Bill_Address"=>$vnp_Bill_Address,
//            "vnp_Bill_City"=>$vnp_Bill_City,
//            "vnp_Bill_Country"=>$vnp_Bill_Country,
//            "vnp_Inv_Phone"=>$vnp_Inv_Phone,
//            "vnp_Inv_Email"=>$vnp_Inv_Email,
//            "vnp_Inv_Customer"=>$vnp_Inv_Customer,
//            "vnp_Inv_Address"=>$vnp_Inv_Address,
//            "vnp_Inv_Company"=>$vnp_Inv_Company,
//            "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
//            "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
