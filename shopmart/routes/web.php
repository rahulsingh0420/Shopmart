<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\LoginComponent;
use App\Http\Livewire\RegisterComponent;
use App\Http\Livewire\AllProductComponent;
use App\Http\Livewire\EditProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\LoginCartComponent;
use App\Http\Livewire\AllUserComponent;
use App\Http\Livewire\OrderDetailComponent;
use App\Http\Livewire\AllorderComponent;
use App\Http\Livewire\AdminPanelComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\OneProductComponent;
use App\Http\Livewire\SinglecatComponent;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['islogin'])->group(function () {
    Route::middleware(['isadmin'])->group(function () {
        Route::get('/allproduct' , AllProductComponent::class);
        Route::get('/editproduct/{ids}', EditProductComponent::class);
        Route::get('/alluser' , AllUserComponent::class);
        Route::get('/allorder' , AllorderComponent::class);
        Route::get('/adminpanel' , AdminPanelComponent::class);        
    });
    Route::get('/orderdetail' , OrderDetailComponent::class);
    Route::get('/profile' , ProfileComponent::class);
});


Route::middleware(['isnotlogin'])->group(function () {
    Route::get('/login' , LoginComponent::class);
    Route::get('/register' , RegisterComponent::class);
});

Route::get('/cart' , CartComponent::class);
Route::get('/' , HomeComponent::class);
Route::get('/logincart' , LoginCartComponent::class);
Route::get('/oneproduct/{ids}' ,OneProductComponent::class)->whereNumber("ids");
Route::get('/singlecat/{ids}' , SinglecatComponent::class)->whereNumber("ids");


Route::fallback(function(){
    return redirect('/');
});