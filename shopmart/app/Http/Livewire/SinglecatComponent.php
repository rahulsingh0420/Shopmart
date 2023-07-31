<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Mobiledetail;
class SinglecatComponent extends Component
{
    public $ids;
    public $ram;
    public $sortprice='asc';
    public $search;
    public $storage;
    protected $queryString = ['ram','search','storage','sortprice'];    
    public function mount($ids)
    {
        $this->ids = $ids;
        $cat = Category::where('category_id' , $ids)->first();
        if($cat == null){
               return redirect('/');
        }
    }
    
    public function render()
    {
        return view('livewire.singlecat-component',["pros"=>Product::where('product_name' , 'like', '%'."$this->search".'%')->where('category',$this->ids)->get()] )->extends('layouts.template');
    }



}
