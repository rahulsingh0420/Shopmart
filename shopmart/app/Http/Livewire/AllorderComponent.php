<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orderdetail;
use App\Models\Product;
use Auth;

class AllorderComponent extends Component
{
    public $search;
    protected $queryString = ['search'];
    Public $validate;
    public $status;

    public function render()
    {
        return view('livewire.admin.allorder-component',[
            'pros' => Product::where('product_name', 'like', '%'.$this->search.'%')->paginate(20),
        ])->extends('layouts.template');
    }



    Public function edit ($id){
        
        $user = Orderdetail::where('order_id' , $id)->first();
        $this->status = $user->status;
        
    }

  
    public function logoutUser(){
        Auth::logout();
        return redirect('login')->with('loggedout' , "Logged Out Successfully");
    }


    public function edituser($id){
     
        // dd($product);
        $status = $this->status;
       
          $success  =   Orderdetail::where('order_id' , $id)->update([
                "status"=>"$status",
            ]);                
        if($success){
            return redirect()->back()->with('userupdated' , "Order Updated Successfully");
        }
       
        
    }

    public function editusers(){

    }

    public function delete($id){
        Orderdetail::where('order_id' , $id)->delete();
        return redirect()->back()->with('prodeleted' , "Order Deleted Successfully");
    }








}










