<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginCartComponent extends Component
{
    public function render()
    {
        return view('livewire.login.login-cart-component')->extends('layouts.template');
    }
}
