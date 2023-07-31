<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{
    use WithFileUploads;

    Public $product_img;
    Public $product_name;
    Public $price;
    Public $qty;
    Public $discription;
    Public $ids;

    public function render()
    {
        return view('livewire.admin.edit-product-component')->extends('layouts.template');
    }

    public function mount($ids){
        $this->ids=$ids;
        }

    public function editproduct(){
        
    }


}
