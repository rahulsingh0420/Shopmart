<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;

class RegisterComponent extends Component
{
    Public $name;
    Public $email;
    Public $password;
    Public $dob;
    public $mobile_no;
    Public $thestate;
    Public $thedis;
    Public $validate;
    Public $registered;

    public function render()
    {
        return view('livewire.register-component')->extends('layouts.template');
    }

    public function register(){
        
        $this->validate([
            "name"=>"required",
            "email"=>"required | unique:users,email",
            "password"=>"required",
            "dob"=>"required",
            "mobile_no"=>"required | max:10",
            "thestate"=>"required",
            "thedis"=>"required",
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->dob = $this->dob;
        $user->mobile_no = $this->mobile_no;
        $user->state = $this->thestate;
        $user->district = $this->thedis;
        $user->save();

        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->dob = '';
        $this->mobile_no = '';
        $this->thestate = '';
        $this->thedis = '';
        


        $this->registered = "Registered Successfully";
        // return redirect('login');
        
    }

}
