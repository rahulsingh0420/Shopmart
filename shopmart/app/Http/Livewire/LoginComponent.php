<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;


class LoginComponent extends Component
{

    Public $email;
    Public $password;


    public function render()
    {
        return view('livewire.login-component')->extends('layouts.template');
    }

    public function login(){
        $email = $this->email;
        $password = $this->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            session();
            return redirect()->intended('/');
        }
        return redirect('/login')->with('notlogin' , "Email or Password Dismatched");

    }

}
