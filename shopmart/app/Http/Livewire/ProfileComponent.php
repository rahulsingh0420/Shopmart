<?php

namespace App\Http\Livewire;

use App\Models\User;
use  Auth;
use Livewire\Component;

class ProfileComponent extends Component
{

    public $name,$email,$number,$dob;
    public $editname,$editemail,$editnumber,$editdob,$editstate;
    public $validate;
    public $count =0;
    public $state,$dis;


    public function render()
    {
        if($this->count == 0){
            $this->getdata();
            $this->count++;
        }
        return view('livewire.profile-component')->extends('layouts.template');
    }


    public function getdata(){
        $this->name=Auth::user()->name;
        $this->email=Auth::user()->email;
        $this->number=Auth::user()->mobile_no;
        $this->dob=Auth::user()->dob;
        $this->state=Auth::user()->state;
        $this->district=Auth::user()->district;
    }

    public function editname(){
        $this->editname = "edit";
        $this->name=Auth::user()->name;
    }

    public function cancelname(){
        $this->editname = NULL;
        $this->name=Auth::user()->name;
    }

    public function savename(){

        $this->validate([
            "name"=>"required",
        ]);

        User::where('id' , Auth::user()->id)->update([
            "name"=>"$this->name",
        ]);
        $this->editname = NULL;
    }
// name code ends 

public function editemail(){
    $this->editemail = "edit";
    $this->email=Auth::user()->email;
}

public function cancelemail(){
    $this->editemail = NULL;
    $this->email=Auth::user()->email;
}

public function saveemail(){

    $this->validate([
        "email"=>"required",
    ]);

    User::where('id' , Auth::user()->id)->update([
        "email"=>"$this->email",
    ]);
    $this->editemail = NULL;
}
// edit email code ends 


public function editnumber(){
    $this->editnumber = "edit";
    $this->number=Auth::user()->mobile_no;
}

public function cancelnumber(){
    $this->editnumber = NULL;
    $this->number=Auth::user()->mobile_no;
}

public function savenumber(){

    $this->validate([
        "number"=>"required",
    ]);

    User::where('id' , Auth::user()->id)->update([
        "mobile_no"=>"$this->number",
    ]);
    $this->editnumber = NULL;
}
// number code ends 


public function editdob(){
    $this->editdob = "edit";
    $this->dob=Auth::user()->dob;
}

public function canceldob(){
    $this->editdob = NULL;
    $this->dob=Auth::user()->dob;
}

public function savedob(){

    $this->validate([
        "dob"=>"required",
    ]);

    User::where('id' , Auth::user()->id)->update([
        "dob"=>"$this->dob",
    ]);
    $this->editdob = NULL;
}
// dob code ends 



public function editstate(){
    $this->editstate = "edit";
    $this->state=Auth::user()->state;
    $this->district=Auth::user()->district;
}

public function cancelstate(){
    $this->editstate = NULL;
    $this->state=Auth::user()->state;
    $this->district=Auth::user()->district;
}

public function savestate(){

    $this->validate([
        "state"=>"required",
        "dis"=>"required",
    ]);
    // dd($this->dis);
    User::where('id' , Auth::user()->id)->update([
        "state"=>"$this->state",
        "district"=>"$this->dis",
    ]);
    $this->editstate = NULL;
}
// edit state ends 

public function logoutUser(){
    Auth::logout();
    return redirect('login')->with('loggedout' , "Logged Out Successfully");
}
// log out user
}
