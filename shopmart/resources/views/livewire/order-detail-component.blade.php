<div style="background-color: lavender; min-height:100vh">







    <?php
    use App\Models\Orderdetail;
    use App\Models\Product;
    use App\Models\Cart;
    use App\Models\User;
    ?>
    {{-- {{ dd($orders) }}; --}}


<style>
    .search{
        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;        
        transition-duration: 0.3s;
    }
</style>

        {{-- navbar start for big screen --}}
    {{-- cart badge code --}}
    @if (Auth::user() == null)
        <?php
        $cartproducts = [];
        foreach ($_COOKIE as $key => $value) {
            if (preg_match('/add\d/', $key)) {
                $cartproducts[] = $value;
            }
        }
        $badge = 0;
        ?>
        @foreach ($cartproducts as $result)
            <?php $badge++; ?>
        @endforeach
    @endif
    {{-- cart badge code ends --}}
    @if (isset(Auth::user()->id))
        <?php
        $badge = Cart::where('user_id', Auth::user()->id)->count();
        ?>
    @endif

    <nav style="position:sticky ; z-index:999 ; top:0"
        class=" navbar  navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark"
        data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand me-0 fw-bold fs-3" href="{{ url('/') }}">ShopMart</a>
            <div class="d-grid">

                <ul class="navbar-nav ms-3 d-sm-block d-lg-none mb-lg-0">
                    <li>
                    <a class="text-decoration-none text-white ms-2 me-2 fs-5" href="{{ url('cart') }}">Cart
                        <i class="fa-solid fa-cart-shopping fa-lg">
                        </i>
                        @if ($badge > 0)
                            <span class=" position-relative "><span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $badge }}
                                    <span class="visually-hidden">cart</span>
                                </span></span>
                        @endif
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mt-2 me-3">
                        <a class="nav-link disabled">Shop Kro Moz Kro</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link active" aria-current="page" href="{{ url('about') }}">About</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="{{ url('topdeals') }}">Top Deals</a>
                    </li>
                    <li class="nav-item dropdown fs-5">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item fs-5" href="{{ url('/profile') }}">Profile <i
                                        class="fa-solid ms-2 fa-user"></i></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item fs-5" href="{{ url('/orderdetail') }}">My Orders <i
                                        class="fas fa-bags-shopping ms-2"></i></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-3 d-none d-lg-block mb-lg-0">
                    <li>
                        <a class="text-decoration-none text-white ms-2 me-2 fs-5" href="{{ url('cart') }}">Cart
                            <i class="fa-solid fa-cart-shopping fa-lg">
                            </i>
                            @if ($badge > 0)
                                <span class=" position-relative "><span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $badge }}
                                        <span class="visually-hidden">cart</span>
                                    </span></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar ends --}}



    
    <div class="d-flex justify-content-center mt-4">

        <div class="w-75 mb-3">
            <input type="search" name="search" placeholder="Search Orders By Product Name" wire:model="search"
            class="form-control m-3 mb-0 search fs-5">
        </div>
    </div>

    <div class="d-flex shadow mx-3 mt-5 justify-content-between orderhead" style="border-radius: 12px">
        <div style="text-transform: captilize; border-radius:12px" class="p-3 h1 fw-bold text-primary">
            Order Details
        </div>
        <div class="name h5 text-success fw-bold p-3">
            {{ Auth::user()->name }}
        </div>
    </div>
    <div class="text-center alert alert-warning w-100" wire:loading wire:target="search">
        Searching Order 😇🙂...
    </div>
    <div class="container">
        <div class="row p-3 pt-0 " style="flex-direction: column-reverse">
            
           {{-- {{ dd($orders)}} --}}
            {{-- @foreach ($pros as $pro)     --}}
            @if(isset($orders))
            @foreach ($orders as $order)    
            @php
                $pro = Product::where('product_id' , $order->product_id)->first();
            @endphp
            <div class="p-3 col-sm-12 ">
                <a href="{{ url('oneproduct/'.$pro->product_id) }}" class="order card p-4 container-fluid hovershadow" style="border-radius: 9px;text-decoration:none">
                            <div class="row justify-content-between w-100">
                                <div class="imgandname col-lg-4 col-sm-12 d-flex  align-items-center    ">
                                    <div class="img">
                                        <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                            alt="product_img" class="rounded object-fit-contain" width="150px"
                                            height="150px">
                                    </div>
                                    <div class="name d-flex flex-column" style="text-transform: capitalize">
                                        {{-- {{ dd($order->payment_id) }} --}}
                                        <div class=" fw-bold">{{ $pro->product_name }} </div>
                                        <div class="text-secondary">{{ $order->payment_id }} </div>
                                        <div class="text-success">{{ $order->payment_status }}</div>
                                    </div>
                                </div>
                                {{-- product name and imf flex container div ends here --}}
                                <div class="price d-flex align-items-center col-lg-4 col-sm-6">
                                    <div class="d-flex flex-column">
                                        <div class="h5 text-success ms-5" style="flex: 1">
                                            ₹ {{ $order->price }}
                                        </div>
                                        <div class="qty text-secondary ms-5">QTY :- {{ $order->orderqty }}</div>
                                    </div>
                                </div>
                                {{-- price div ends here --}}
                                <div
                                class="d-flex align-items-center justify-content-center orderedon col-lg-4 col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="time text-success fw-bold ms-5 h5"
                                    style="text-transform: capitalize">Ordered on {{ $order->created_at }}
                                </div>
                                <div>
                                    <div style="text-transform: capitalize" class="qty text-secondary ms-5 fw-bold">Status :- {{ $order->status }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- orderedon div ends here --}}
                        
                        
                    </div>
                </a>
            </div>
            @endforeach
            {{-- @endforeach --}}
            @endif  


{{-- end for all product details of one user --}}


{{-- code for orders by search --}}
            @if(isset($pros))
            @foreach ($pros as $pro)    
            @php
                $orders = Orderdetail::where('product_id' , $pro->product_id)->where('user_id' , Auth::user()->id)->get();
            @endphp
            
@php
$orders = Orderdetail::where('product_id' , $pro->product_id)->where('user_id' , Auth::user()->id)->paginate();

@endphp
@foreach ($orders as $order)
    
            <div class="p-3 col-sm-12">
                <a href="{{ url('oneproduct/'.$pro->product_id) }}" class="order hovershadow card p-2" style="border-radius: 9px; text-decoration :none">
                            <div class="row justify-content-between w-100">
                                <div class="imgandname col-lg-4 col-sm-12 d-flex  align-items-center    ">
                                    <div class="img">
                                        <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                            alt="product_img" class="rounded object-fit-contain" width="150px"
                                            height="150px">
                                    </div>
                                    <div class="name d-flex flex-column" style="text-transform: capitalize">
                                        {{-- {{ dd($order->payment_id) }} --}}
                                        <div class=" fw-bold">{{ $pro->product_name }} </div>
                                        <div class="text-secondary">{{ $order->payment_id }} </div>
                                        <div class="text-success">{{ $order->payment_status }}</div>
                                    </div>
                                </div>
                                {{-- product name and imf flex container div ends here --}}
                                <div class="price d-flex align-items-center col-lg-4 col-sm-6">
                                    <div class="d-flex flex-column">
                                        <div class="h5 text-success ms-5" style="flex: 1">
                                            ₹ {{ $order->price }}
                                        </div>
                                        <div class="qty text-secondary ms-5">QTY :- {{ $order->orderqty }}</div>
                                    </div>
                                </div>
                                {{-- price div ends here --}}
                                <div
                                class="d-flex align-items-center justify-content-center orderedon col-lg-4 col-sm-6">
                                <div class="d-flex flex-column">
                                    <div class="time text-success fw-bold ms-5 h5"
                                    style="text-transform: capitalize">Ordered on {{ $order->created_at }}
                                </div>
                                <div>
                                    <div style="text-transform: capitalize" class="qty text-secondary ms-5 fw-bold">Status :- {{ $order->status }}</div>
                                </div>
                            </div>
                        </div>
                        {{-- orderedon div ends here --}}
                        
                        
                    </div>
                </a>
            </div>
            @endforeach
            @endforeach
            @endif     
        </div>
    </div>











</div>
