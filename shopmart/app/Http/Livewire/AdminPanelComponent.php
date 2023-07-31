<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class AdminPanelComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-panel-component')->extends('layouts.template');
    }

      
    public function logoutUser(){
        Auth::logout();
        return redirect('login')->with('loggedout' , "Logged Out Successfully");
    }

}
