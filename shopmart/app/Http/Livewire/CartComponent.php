<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Session;


class CartComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh']; /*Note: activating the refresh*/

    public $checked = [];
    public $proqty = 1;
    public $orderqty;
    public $selected;
    public $validate;

    public function render()
    {
        $cartproducts = array();
        foreach ($_COOKIE as $key => $value) {
            if (preg_match('/add\d/', $key)) {
                $cartproducts[] = $value;
                if(isset($_COOKIE["orderqty$value"] )){
                                                        
                }else{
                    setcookie("orderqty$value",1, time() + (86400 * 30), "/");
                }
            }
        }

        return view('livewire.cart-component', ['cartproducts' => $cartproducts])->extends('layouts.template');
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect('login')->with('loggedout', "Logged Out Successfully")->with('loggedout' , "Logged Out Successfully");
    }



    public function removecartlogin($id)
    {
        Cart::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
        setcookie("orderqty$id", "", time() - 3600, "/");
        return redirect()->back()->with("removed$id", "Removed From Cart");
        $this->emit('refreshComponent');
    }

    public function removecartbadge($id)
    {
        $cookie_name = "add$id";
        setcookie($cookie_name, "", time() - (3600), "/");
        setcookie("orderqty$id", "", time() - 3600, "/");
        $this->emit('refreshComponent');
        return redirect()->back()->with("removed$id", "Removed From Cart");
    }

    public function buynow()
    {
        foreach ($this->checked as $check) {
        }
    }
    public function increament($id)
    
        {
        $pro = Product::where('product_id', $id)->first();

        if (isset($_COOKIE["orderqty$id"])) {
             $value = $_COOKIE["orderqty$id"];
             if($value < $pro->qty){
                 $value++;
             }
        } else {
            setcookie("orderqty$id", 1, time() + (86400 * 30), "/");
        }
            if (isset(Auth::user()->id)) {
                $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->first();
                $value = $cart->orderqty;
                if($value < $pro->qty){
                    $value++;
                }
                Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->update([
                    "orderqty" => "$value",
                ]);
            } else {
                setcookie("orderqty$id", $value, time() + (86400 * 30), "/");
            }
            $this->emit('refreshComponent');
        }
    

    public function decreament($id)
    {
        $pro = Product::where('product_id', $id)->first();

        if (isset($_COOKIE["orderqty$id"])) {
             $value = $_COOKIE["orderqty$id"];
            if($value > 1){
                $value--;
            }
        } else {
            setcookie("orderqty$id", 1, time() + (86400 * 30), "/");
        }
            if (isset(Auth::user()->id)) {
                $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->first();
                $value = $cart->orderqty;
                if($value > 1){
                    $value--;
                }
                Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->update([
                    "orderqty" => "$value",
                ]);
            } else {
                setcookie("orderqty$id", $value, time() + (86400 * 30), "/");
            }
            $this->emit('refreshComponent');
        }

    public function orderqtys($id)
    {
        $this->selected = $id;
        $pro = Product::where('product_id', $id)->first();
        $this->validate([
            "orderqty" => "required|numeric|min:1|max:$pro->qty",
        ]);
        $val = $this->orderqty;
        // dd($pro->qty);
        if (
            isset(Auth::user()->id)
        ) {
            Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->update([
                "orderqty" => "$val",
            ]);
        } else {

            // dd($val);
            $success = setcookie("orderqty$id", $val, time() + (86400 * 30), "/");
        }

        $this->emit('refreshComponent');
    }


    public function buynowcart()
    {


        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $mobile_no = Auth::user()->mobile_no;
        // dd($this->checked);
        $ammount = 0;
        foreach ($this->checked as $check) {
            $pro = Product::where('product_id', $check)->first();
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->first();
            $ammount = $ammount + ($pro->sale_price) * $cart->orderqty;
        }




        $PAYMENT_API_KEY = "test_9b445b3544d9b4a1e873c99a214";
        $PAYMENT_AUTH_TOKEN = "test_aee5d676309dd5c3911bf8ae13c";
        $PAYMENT_WEBSITE = "test.instamojo.com";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://$PAYMENT_WEBSITE/api/1.1/payment-requests/");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$PAYMENT_API_KEY",
                "X-Auth-Token:$PAYMENT_AUTH_TOKEN"
            )
        );






        $payload = array(
            'purpose' => 'SHOPMART',
            'amount' => $ammount,
            'phone' => $mobile_no,
            'buyer_name' => $name,
            'redirect_url' => 'http://127.0.0.1:8000/orderdetail',
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        // echo $response;
        $result = json_decode($response, true);
        // echo"<pre>";
        // dd($result);
        // echo"</pre>";

        $longurl = $result["payment_request"]["longurl"];
            $data = "";
            foreach($this->checked as $check){
                $data =  $data.$check;

            }

        setcookie('checked' , "$data" , time() + (86400*30) , "/");
        // $checks = '';
        // session()->put("checked", );
        

        return redirect("$longurl");
        exit();
        // echo 'working';



    }

    
    public function buy($id)
    {

        if(isset(Auth::user()->id)){
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $mobile_no = Auth::user()->mobile_no;
        // dd($this->checked);
        $ammount = 0;
            $pro = Product::where('product_id', $id)->first();
            $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $pro->product_id)->first();
            $ammount = $ammount + ($pro->sale_price) * $cart->orderqty;

        $PAYMENT_API_KEY = "test_9b445b3544d9b4a1e873c99a214";
        $PAYMENT_AUTH_TOKEN = "test_aee5d676309dd5c3911bf8ae13c";
        $PAYMENT_WEBSITE = "test.instamojo.com";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://$PAYMENT_WEBSITE/api/1.1/payment-requests/");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$PAYMENT_API_KEY",
                "X-Auth-Token:$PAYMENT_AUTH_TOKEN"
            )
        );






        $payload = array(
            'purpose' => 'SHOPMART',
            'amount' => $ammount,
            'phone' => $mobile_no,
            'buyer_name' => $name,
            'redirect_url' => 'http://127.0.0.1:8000/orderdetail',
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);

        // echo $response;
        $result = json_decode($response, true);
        // echo"<pre>";
        // dd($result);
        // echo"</pre>";

        $longurl = $result["payment_request"]["longurl"];
            // $data = "";
            // foreach($this->checked as $check){
                $data =  $pro->product_id;

            // }

        setcookie('checked' , "$data" , time() + (86400*30) , "/");
        // $checks = '';
        // session()->put("checked", );
        

        return redirect("$longurl");
        exit();
        // echo 'working';
    }else{
        return redirect('/login')->with("loggedout",'Login First To place Orders');
    }


    }

    public function edit($id)
    {
        $this->orderqty = '';
        $this->selected = '';
    }
}
