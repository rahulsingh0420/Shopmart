<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Auth;

class OneProductComponent extends Component
{   
    public $ids;
    protected $listeners = ['refreshComponent' => '$refresh']; /*Note: activating the refresh*/

    public function mount($ids){
        $this->ids = $ids;
        $pro = Product::where('product_id' , $ids)->first();
        if($pro == null){
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.one-product-component')->extends('layouts.template');
    }




    public function addcartbadge($id){
        $cookie_name = "add$id";
        $cookie_value = $id;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day\
        setcookie("orderqty$id" , 1, time() + (86400 * 30) , "/");
        $this->emit('refreshComponent'); 
        return redirect()->back()->with("added$id" , "Added To Cart");
    }

    public function addcartlogin($id){
        setcookie("orderqty$id" , 1, time() + (86400 * 30) , "/");
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->save();
        $this->emit('refreshComponent');
        return redirect()->back()->with("added$id" , "Added To Cart");
    }

    
    public function removecartlogin($id){
        setcookie("orderqty$id" , "", time() + (86400 * 30) , "/");
        Cart::where('user_id' , Auth::user()->id)->where('product_id' , $id)->delete();
 
        $this->emit('refreshComponent');
        return redirect()->back()->with("removed$id" , "Removed From Cart");
        }

    public function removecartbadge($id){
        $cookie_name = "add$id";
        setcookie("orderqty$id" , "", time() + (86400 * 30) , "/");
        setcookie($cookie_name, "", time() - ( 3600), "/"); 
        $this->emit('refreshComponent');
        return redirect()->back()->with("removed$id" , "Removed From Cart");
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
}
