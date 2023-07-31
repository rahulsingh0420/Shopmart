<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Mobiledetail;
use App\Models\Laptopdetail;
use App\Models\MobileAccessoriesdetail;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Auth;

class AllProductComponent extends Component
{
    use WithFileUploads;

    public $search;
    protected $queryString = ['search'];
    Public $sale_price;
    Public $product_category;
    Public $product_name;
    Public $price;
    Public $qty;
    Public $discription;
    Public $product_img;
    Public $product_img_updated;
    Public $validate;
    Public $extention;
    Public $category_name;
    public $display,$in_the_box,$ram,$storage,$selfie_camera,$chipset,$primary_camera,$battery,$operating_system,$warranty,$brand,$type,$compatible_with;

    public function render()
    {
        // sleep(1);
        return view('livewire.admin.all-product-component', [

            'products' => Product::where('product_name', 'like', '%'.$this->search.'%')->paginate(20),

        ])->extends('layouts.template');
    }

    public function addproduct(){

        $this->validate([
            "product_name"=>"required",
            "price"=>"required",
            "sale_price"=>"required",
            "product_category"=>"required",
            "qty"=>"required",
            "product_img"=>"required",
            "discription"=>"required",
        ]);


        $product = new Product;

        $product_name = $this->product_name;
        $price = $this->price;
        $sale_price = $this->sale_price;
        $product_category = $this->product_category;
        $qty = $this->qty;
        $discription = $this->discription;
        

        $product_img_name = time().".".$this->product_img->extension();
        $this->product_img->storeAs('product_images', $product_img_name, 'public');
        // $this->file->store('files', 'public');
        // $this->product_img->
        
        
        $product->product_name = $product_name;
        $product->price = $price;
        $product->sale_price  = $sale_price;
        $product->category = $product_category;
        $product->qty = $qty;
        $product->product_img = $product_img_name;
        $product->discription = $discription;
        $product->save();


        $this->product_name = '';
        $this->price = '';
        $this->sale_price = '';
        $this->product_category = '';
        $this->qty = '';
        $this->discription = '';
        $this->product_img = '';


        return redirect()->back()->with('imguploaded' , "Image Uploaded Successfully")->with('proadded' , "Product Added Successfully");

    }

      
    public function logoutUser(){
        Auth::logout();
        return redirect('login')->with('loggedout' , "Logged Out Successfully");
    }

    public function delete($id){
        Mobiledetail::where('product_id' , $id)->delete();
        Product::where('product_id' , $id)->delete();
        return redirect()->back()->with('prodeleted' , "Product Deleted Successfully");
    }

    
    public function deletecat($id){
        $cat = Category::where('category_id' , $id)->first();
        $successdelete = Category::where('category_id' , $id)->delete();
        return redirect()->back()->with('deleted' , "Category $cat->category_name deleted successfully");
    }

    public function editproduct($id){
        // $id = $this->product_id;

        $this->validate([
            "product_name"=>"required",
            "price"=>"required",
            "sale_price"=>"required",
            "product_category"=>"required",
            "qty"=>"required",
            "discription"=>"required",
            
        ]);
        // dd($product);
        $product_name = $this->product_name;
        $price = $this->price;
        $sale_price = $this->sale_price;
        $product_category = $this->product_category;
        $qty = $this->qty;
        $discription = $this->discription;
        if($this->product_img_updated){
            $name = time().".".$this->product_img_updated->extension();
        $this->product_img_updated->storeAs('product_images', $name, 'public');
        //       $name  =  time().".".$this->product_img_updated->extension();
        // $this->product_img_updated->storeAs('product_images' , $name , 'public');
            Product::where('product_id' , $id)->update([
                "product_img"=>"$name"
            ]);                
            $this->product_img_updated = '';
        }
        $product = Product::where('product_id' , $id)->first();
        $success = Product::where('product_id' , $id)->update([
             "product_name"=> "$product_name",
        "price" => "$price",
        "sale_price" => "$sale_price",
        "category" => "$product_category",
        "qty" => "$qty",
        "discription" => "$discription",
        ]);
        if($success){
            return redirect()->back()->with('proupdated' , "Product Updated Successfully");
        }
       
        
    }

    public function editcategory($id){
        $category_name = $this->category_name;
        
        Category::where('category_id' , $id)->update([
             "category_name"=> "$category_name",
        ]);
        return redirect()->back()->with('catupdated' , "Category Updated Successfully");
    }

    Public function edit ($id){
        
        $product = Product::where('product_id' , $id)->first();
        $this->product_name = $product->product_name;
        $this->price = $product->price;
        $this->qty = $product->qty;
        $this->discription = $product->discription;
        $this->sale_price = $product->sale_price;
        $this->product_category = $product->category;
        
    }

    Public function editcat ($id){
        
        $product = Category::where('category_id' , $id)->first();
        $this->category_name = $product->category_name;
    }

    Public function add (){
        
        $this->product_name = '';
        $this->price = '';
        $this->sale_price = '';
        $this->product_category = '';
        $this->qty = '';
        $this->discription = '';
        $this->product_img = '';
        
    }

    Public function addcat (){
        $this->category_name = '';
    }

    Public function addcategory (){

            $cat = new Category;        
            $cat->category_name = $this->category_name;
            $cat->save();
            return redirect()->back()->with('catadded' , "Category Added Successfully");
      
    }
    

// add details code in mobile product

public function adddetail1($id){
    $exist = Mobiledetail::where('product_id',$id)->first();
    if($exist == NULL){
            $this->display = "";
            $this->in_the_box = "";
            $this->ram = "";
            $this->storage = "";
            $this->chipset = "";
            $this->primary_camera = "";
            $this->selfie_camera = "";
            $this->battery = "";
            $this->operating_system = "";
            $this->warranty = "";
    }else{
            $this->display = "$exist->display";
            $this->in_the_box = "$exist->in_the_box";
            $this->ram = "$exist->ram";
            $this->storage = "$exist->storage";
            $this->chipset = "$exist->chipset";
            $this->primary_camera = "$exist->primary_camera";
            $this->selfie_camera = "$exist->selfie_camera";
            $this->battery = "$exist->battery";
            $this->operating_system = "$exist->operating_system";
            $this->warranty = "$exist->warranty";
    }
}
// adddetails in mobiles
public function detailmobile($id){
    $exist = Mobiledetail::where('product_id',$id)->first();

    $this->validate([
        "display" => "required",  
        "in_the_box" =>  "required",      
        "ram" => "required",
        "storage" => "required",    
        "chipset" => "required",    
        "primary_camera" => "required",
        "selfie_camera" => "required",
        "battery" =>  "required",   
        "operating_system" => "required",
        "warranty" => "required", ]);

    if($exist == NULL){
        $detail = new Mobiledetail;
        $detail->product_id = $id;
        $detail->display = $this->display;
        $detail->in_the_box = $this->in_the_box;
        $detail->ram = $this->ram;
        $detail->storage = $this->storage;
        $detail->chipset = $this->chipset;
        $detail->primary_camera = $this->primary_camera;
        $detail->selfie_camera = $this->selfie_camera;
        $detail->battery = $this->battery;
        $detail->operating_system = $this->operating_system;
        $detail->warranty = $this->warranty;
        $detail->save();
        return redirect()->back()->with('detailadded' , "Details Added Successfully");
    }else{
        Mobiledetail::where('product_id',$id)->Update([
        "display" => $this->display,
        "in_the_box" => $this->in_the_box,
        "ram" => $this->ram,
        "storage" => $this->storage,
        "chipset" => $this->chipset,
        "primary_camera" => $this->primary_camera,
        "selfie_camera" => $this->selfie_camera,
        "battery" => $this->battery,
        "operating_system" => $this->operating_system,
        "warranty" => $this->warranty,
        ]);
        return redirect()->back()->with('detailadded' , "Details Updated Successfully");
    }

}

// all details in mobile code ends 

public function adddetail2($id){
    $exist = Laptopdetail::where('product_id',$id)->first();
    if($exist == NULL){
            $this->display = "";
            $this->ram = "";
            $this->storage = "";
            $this->chipset = "";
            $this->battery = "";
            $this->operating_system = "";
            $this->warranty = "";
    }else{
            $this->display = "$exist->display";
            $this->ram = "$exist->ram";
            $this->storage = "$exist->storage";
            $this->chipset = "$exist->chipset";
            $this->battery = "$exist->battery";
            $this->operating_system = "$exist->operating_system";
            $this->warranty = "$exist->warranty";
    }
}

public function detaillaptop($id){
    $exist = Laptopdetail::where('product_id',$id)->first();

    $this->validate([
        "display" => "required",  
        "ram" => "required",
        "storage" => "required",    
        "chipset" => "required",    
        "battery" =>  "required",   
        "operating_system" => "required",
        "warranty" => "required", ]);

    if($exist == NULL){
        $detail = new Laptopdetail;
        $detail->product_id = $id;
        $detail->display = $this->display;
        $detail->ram = $this->ram;
        $detail->storage = $this->storage;
        $detail->chipset = $this->chipset;
        $detail->battery = $this->battery;
        $detail->operating_system = $this->operating_system;
        $detail->warranty = $this->warranty;
        $detail->save();
        return redirect()->back()->with('detailadded' , "Details Added Successfully");
    }else{
        Mobiledetail::where('product_id',$id)->Update([
        "display" => $this->display,
        "ram" => $this->ram,
        "storage" => $this->storage,
        "chipset" => $this->chipset,
        "battery" => $this->battery,
        "operating_system" => $this->operating_system,
        "warranty" => $this->warranty,
        ]);
        return redirect()->back()->with('detailadded' , "Details Updated Successfully");
    }

}
// add details for laptops

// add details for mobile accesseries

public function adddetail5($id){
    $exist = MobileAccessoriesdetail::where('product_id',$id)->first();
    // dd($exist);
    if($exist == NULL){
            $this->brand = "";
            $this->type = "";
            $this->compatible_with = "";
            $this->warranty = "";
    }else{
            $this->brand = "$exist->brand";
            $this->type = "$exist->type";
            $this->compatible_with = "$exist->compatible_with";
            $this->warranty = "$exist->warranty";
    }
}



public function detailaccessories($id){
    $exist = MobileAccessoriesdetail::where('product_id',$id)->first();
    $this->validate([
        "brand" => "required",  
        "type" => "required",
        "compatible_with" => "required",
        "warranty" => "required", ]);

    if($exist == NULL){
        $detail = new MobileAccessoriesdetail;
        $detail->product_id = $id;
        $detail->brand = $this->brand;
        $detail->type = $this->type;
        $detail->compatible_with = $this->compatible_with;
        $detail->warranty = $this->warranty;
        $detail->save();
        return redirect()->back()->with('detailadded' , "Details Added Successfully");
    }else{
        MobileAccessoriesdetail::where('product_id',$id)->Update([
        "brand" => $this->brand,
        "type" => $this->type,
        "compatible_with" => $this->compatible_with,
        "warranty" => $this->warranty,
        ]);
        return redirect()->back()->with('detailadded' , "Details Updated Successfully");
    }

}

}
