<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;


class AllUserComponent extends Component
{
    public $search;
    protected $queryString = ['search'];
    public $thestate;
    public $thedis;
    public $name,$email,$dob,$mobile_no;
    Public $validate;

    public function render()
    {
        return view('livewire.admin.all-user-component',[
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(20),
        ])->extends('layouts.template');
    }

  
    public function logoutUser(){
        Auth::logout();
        return redirect('login')->with('loggedout' , "Logged Out Successfully");
    }

    Public function edit ($id){
        
        $user = User::where('id' , $id)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->dob = $user->dob;
        $this->mobile_no = $user->mobile_no;
        $this->thestate = $user->thestate;
        $this->thedis = $user->thedis;
        
    }




    public function edituser($id){
        // $id = $this->product_id;

        $this->validate([
            "name"=>"required",
            "email"=>"required",
            "dob"=>"required",
            "mobile_no"=>"required",            
        ]);
        // dd($product);
        $name = $this->name;
        $email = $this->email;
        $dob = $this->dob;
        $mobile_no = $this->mobile_no;
          $success  =   User::where('id' , $id)->update([
                "name"=>"$name",
                 "email" => "$email",
                 "mobile_no" =>"$mobile_no",
        "dob" => "$dob",
            ]);                
        if($success){
            return redirect()->back()->with('userupdated' , "User Updated Successfully");
        }
       
        
    }

    public function editusers(){

    }

    public function delete($id){
        User::where('id' , $id)->delete();
        return redirect()->back()->with('prodeleted' , "User Deleted Successfully");
    }








}
