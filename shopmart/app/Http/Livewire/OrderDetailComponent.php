<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orderdetail;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
// use Illuminate\Support\Facades\Session;
use Auth;

class OrderDetailComponent extends Component
{
    public $count;
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if(isset($_COOKIE['checked'])){

        $data = $_COOKIE['checked'];
        $checked = str_split($data);
    
    // session()->forget('checked');
// dd(session("checked"));
    
    foreach($checked as $check){
    $order = new Orderdetail;
    $pro = Product::where('product_id', $check)->first();
    $cart = Cart::where('user_id', Auth::user()->id)->where('product_id' , $pro->product_id)->first();   
        $exist = Orderdetail::where('payment_id', $_GET['payment_id'])->where('payment_request_id' , $_GET['payment_request_id'])->where('product_id', $check)->first();
        
        if($exist == NULL){
            $order->product_id=$pro->product_id;
            $order->user_id=Auth::user()->id;
            $order->orderqty=$cart->orderqty;
            $order->price=($pro->sale_price)*$cart->orderqty;
            $order->payment_id=$_GET['payment_id'];
            $order->payment_status=$_GET['payment_status'];
            $order->payment_request_id=$_GET['payment_request_id'];
            $order->save();
            Cart::where('user_id', Auth::user()->id)->where('product_id' , $pro->product_id)->delete();   
            $newqty = $pro->qty - $cart->orderqty;
            Product::where('product_id', $check)->update([
                "qty"=>"$newqty"
            ]);
            }
}
setcookie('checked' , "" , time() - (3600) , "/");
}

// dd($pros);
if($this->search == NULL){
    $orders = Orderdetail::where('user_id' , Auth::user()->id)->get();
    // return view('livewire.order-detail-component' , [
    //     'orders'=>$orders,
    //     ])->extends('layouts.template');
    return view('livewire.order-detail-component' , [
        'orders'=>$orders,
        ])->extends('layouts.template');

}else{
    $pros = Product::where('product_name' ,'like' , '%'.$this->search.'%')->get();
    // $order = array();
    // $orders  = array();
    
        return view('livewire.order-detail-component' , [
            'pros'=>$pros,
            ])->extends('layouts.template');
    
    // dd($product_ids);
// $orders = $order;  
}
// dd($orders);

}

public function logoutUser(){
    Auth::logout();
    return redirect('login')->with('loggedout' , "Logged Out Successfully");
}



}
