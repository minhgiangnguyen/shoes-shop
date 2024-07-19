<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

session_start();

class CheckoutController extends Controller
{
    function checkout(){
        if(Auth::check()){
            return view("shoppingCart/checkout");
        }else{
            return view("shoppingCart/checkoutForGuest");
        }
        
    }
    function confirmation(){
        return view("shoppingCart/confirmation");
    }

    public function save_checkout(Request $request){
        $data = array();
        if(Auth::check()){
            $data['shipping_userID'] = Session::get('OrderUserID');
        }else{
            $data['shipping_userID'] = "1"; //guest
        }
        $request->validate([
            'shipping_name' => 'required',
            'shipping_phone' => 'required',
            'shipping_email' => 'required',
            'shipping_address' => 'required',
            'shipping_city' => 'required',
        ]);
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_city'] = $request->shipping_city;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('shipping')->insertGetId($data);
       
        Session::put('shipping_id',$shipping_id);

        return view("shoppingCart/payment");
    }

    public function payment_checkout(){
        return view("shoppingCart/payment");
    }

    public function order_place(Request $request){
        //insert payment
        $data = array();
        $data['PaymentMethod'] = $request->payment;
        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order_data = array();
        if(Auth::check()){
            $order_data['OrderUserID'] = Session::get('OrderUserID');
        }else{
            $order_data['OrderUserID'] = "1";//guest
        }
        $order_data['OrderShippingID'] = Session::get('shipping_id');
        $order_data['OrderPaymentID'] = $payment_id;
        $order_data['OrderTotalPrice'] = Cart::total(1);
        $order_data['OrderStatus'] = "Processing !";
        $order_id = DB::table('orders')->insertGetId($order_data);

        //insert order_detail
        $content = Cart::content();
        // dd($content);
        foreach($content as $val){
            $order_d_data['DetailOrderID'] = $order_id;
            $order_d_data['DetailProductID'] = $val->id;
            $order_d_data['DetailProductName'] = $val->name;
            $order_d_data['DetailPrice'] = $val->price;
            $order_d_data['DetailQuantity'] = $val->qty;
            $order_d_data['DetailSize'] = $val->options->size;
            DB::table('orderdetails')->insert($order_d_data);
        }
        if($data['PaymentMethod'] == 1){
            Cart::destroy();
            return view("shoppingCart/handCash");
        }else{
            Cart::destroy();
            return view("shoppingCart/VNpay");
        }
    }

    //Thanh toan vnpay
    public function vnpay_payment(){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/shoppingCart/paymentIndex";
        $vnp_TmnCode = "TKRKLZZ2";//Mã website tại VNPAY 
        $vnp_HashSecret = "AWKPBKDVWNHOGSTXGOSVPNHTUQOVLPOV"; //Chuỗi bí mật

        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 20000 * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        
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
            "vnp_TxnRef" => $vnp_TxnRef
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
    public function paymentIndex(){
        return view('shoppingCart/paymentIndex');
    }
}