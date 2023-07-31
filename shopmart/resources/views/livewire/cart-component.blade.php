<div class="bg-light">

    <?php
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Cart;
    use App\Models\User;
    ?>


    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .text-dark:hover{
        color: #0d6efd !important;
        text-decoration: none;  
                        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
   {{-- navbar start --}}
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
    @php
    foreach ($_COOKIE as $key => $value) {
        if (preg_match('/add\d/', $key)) {
            $cartproducts[] = $value;
        }
    }
    foreach ($cartproducts as $id) {
        $exits = Cart::where('user_id' , Auth::user()->id)->where('product_id', $id)->first();

        if($exits == null){
            setcookie("orderqty$id" , 1, time() + (86400 * 30) , "/");
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $id;
            $cart->save();
        }
    }
    @endphp    
    <?php
        $badge = Cart::where('user_id', Auth::user()->id)->count();
        ?>
    @endif
   <nav style="position:sticky ; z-index:999 ; top:0"
   class="  navbar  navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark"
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
           <ul class="navbar-nav ms-3 mb-lg-0">
               @if (isset(Auth::user()->id))
                   <a wire:click="logoutUser" class="text-primary fw-bold fs-5" style="text-decoration: none">Log Out</a>
               @else
                   <a href="{{ url('login') }}" class="text-primary fw-bold fs-5" style="text-decoration: none">Login</a>
               @endif
           </ul>
       </div>
   </div>
</nav>
   {{-- navbar ends  --}}


    {{--  --}}
    <div class="text-primary container-fluid mt-3">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Animi architecto fugit maiores praesentium error amet
        molestias. Dolores corrupti consequuntur quo maxime maiores inventore ex laudantium consectetur, est minus!
        Nobis fugiat sit maiores odio mollitia ab ipsa dolores iste delectus voluptatem voluptatibus dolorum, dolor,
        aliquid dicta, repudiandae assumenda laborum error earum. Quos minima sed placeat eligendi recusandae est, esse
        facilis unde laudantium laboriosam nisi, nobis itaque quasi alias! Consectetur aliquid corrupti, soluta adipisci
        accusantium dolore maxime commodi ratione vero natus iste, omnis quas fugiat cupiditate id autem totam
        consequatur nobis! Unde impedit aliquid accusamus perspiciatis quisquam, optio aut ipsa veritatis. Inventore,
        quos? Error omnis cupiditate sed nisi, officiis dicta ut sapiente exercitationem doloremque consectetur animi
        praesentium quos rerum fuga quod illum libero.
    </div>
    {{--  --}}
    <div>
        @if (isset(Auth::user()->id))
            <?php
            $cartproducts = Cart::where('user_id', Auth::user()->id)->get();
            $cartproduct = Cart::where('user_id', Auth::user()->id)->first();
            ?>
        @endif
        @if (isset(Auth::user()->id))
            @if ($cartproduct == null)
                <h1 class="text-center p-5 fw-bold">
                    NO PRODUCTS IN CART
                </h1>
                <div class="d-flex justify-content-center">
                    <a href="{{ url('/') }}" class=" btn btn-primary">Add To Cart</a>
                </div>
            @endif
        @endif
        @if (!$cartproducts)
            <?php
            $cartproducts = Cart::all();
            ?>
            <h1 class="text-center p-5 fw-bold">
                NO PRODUCTS IN CART
            </h1>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/') }}" class=" btn btn-primary">Add To Cart</a>
            </div>
        @endif
    </div>
    {{-- products code starts from here --}}
    <?php
    $foreachcount = 0;
    ?>

    @foreach ($cartproducts as $proid)
        <?php $foreachcount++; ?>
        @if ($foreachcount == 2)
            <?php break; ?>
        @endif
        @if (isset(Auth::user()->id))
            <?php $pro = Product::where('product_id', $proid->product_id)->first(); ?>
        @else
            <?php
            $pro = Product::where('product_id', $proid)->first();
            ?>
        @endif


        @if ($pro != null)
            <div class="container-fluid p-0 mt-5">
                <div class="row w-100">
                    <div class="p-3 col-sm-12 col-md-8 bg-white card shadow">
                        <div class="conatainer-fluid">
                            @foreach ($cartproducts as $proid)
                                @if (isset(Auth::user()->id))
                                    <?php $pro = Product::where('product_id', $proid->product_id)->first(); ?>
                                @else
                                    <?php
                                    $pro = Product::where('product_id', $proid)->first();
                                    ?>
                                @endif
                                @if (session()->has("removed$pro->product_id"))
                                    <div
                                        class="alert alert-danger text-center d-flex justify-content-center align-items-center">
                                        {{ session("removed$pro->product_id") }}😥</div>
                                @endif
                            <div style="text-decoration:none" class="row">
                                    <div class="col-sm-12 col-md-4 mb-4">
                                        <div class="img me-2 d-flex flex-row">
                                            <input type="checkbox" checked class="me-3 ms-2" style="scale: 1.5"
                                                wire:model='checked' value="{{ $pro->product_id }}">
                                            <a href="{{ url('oneproduct/'.$pro->product_id) }}" class="img">
                                                <img height="200px" width="100%" class="rounded"
                                                style="object-fit: contain"
                                                src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                                alt="">
                                            </a>
                                        </div>
                                    </div>
                                    {{-- product img div ends here --}}
                                    <div class=" col-sm-12  col-md-8 d-flex justify-content-between" style="flex: 1">
                                        <div class="d-grid flex-column">
                                        <div class="details d-grid">
                                            <a href="{{ url('oneproduct/'.$pro->product_id) }}" class="name m-0 text-dark  h4 fw-bold" style="text-decoration: none">
                                                {{ $pro->product_name }}
                                            </a>
                                            
                                            <?php
                                            $x = $pro->price;
                                            $y = $pro->sale_price;
                                            $z = ($y / $x) * 100;
                                            $salepersent = 100 - $z;
                                            ?>
                                            <div class="price h6 m-0 text-primary" style="text-transform: capitalize">
                                                <del>₹{{ $pro->price }}</del> <span
                                                    class="ms-2 h5 text-success">₹{{ $pro->sale_price }}</span>
                                            </div>
                                            {{-- price end --}}
                                            <div class="salepersent h4 text-success m-0 fw-bold"
                                                style="font-family: cursive">
                                                {{ number_format($salepersent, 2) }}% OFF</div>
                                            {{-- sale price ends --}}
                                            @if (30 > $pro->qty)
                                                <div class="qty text-danger">
                                                    @if ($pro->qty >= 1)
                                                        only {{ $pro->qty }}
                                                        @endif @if ($pro->qty > 1)
                                                            product peices are
                                                            @endif @if ($pro->qty == 1)
                                                                is
                                                                @endif @if ($pro->qty < 1)
                                                                    Not
                                                                @endif available
                                                                @if ($pro->qty > 1)
                                                                    <div class="text-success">hurry up now !</div>
                                                                @endif
                                                </div>
                                            @endif
                                            {{-- message about qty ends --}}
                                            <div class="discription p-2 rounded m-0  ms-0" style="display: contents">
                                                <div class="text-sm text-secondary " style="font-size: 11px">
                                                    <?php
                                                    $catid = $pro->category;
                                                    $cat = Category::where('category_id', $catid)->first();
                                                    ?>
                                                    A {{ $cat->category_name }} Product</div>
                                                <p class=" m-0 text-secondary overflow-x-hidden">
                                                    {{ $pro->discription }}</span>
                                            </div>
                                         </div>
                                        {{-- details div ends here --}}
                                            {{-- discription div ends --}}
                                            <div class="qty d-flex align-items-center p-2 ms-4">
                                                <button wire:click="decreament({{ $pro->product_id }})"
                                                    class="btn btn-outline-danger me-2" style="font-size: 8px">
                                                    <div wire:loading wire:target="decreament({{ $pro->product_id }})">

                                                    </div>
                                                    ➖
                                                </button>
                                                <span>
                                                    @if (isset(Auth::user()->id))
                                                        <?php
                                                        $cart = Cart::where('user_id', Auth::user()->id)
                                                            ->where('product_id', $pro->product_id)
                                                            ->first();
                                                        ?>
                                                        {{ $cart->orderqty }}
                                                    @else
                                                    {{  $_COOKIE["orderqty$pro->product_id"] }}
                                                    @endif
                                                </span>
                                                <button class="btn ms-2 btn-outline-success"
                                                    wire:click="increament({{ $pro->product_id }})"
                                                    style="font-size: 8px">
                                                    <div wire:loading wire:target="increament({{ $pro->product_id }})">

                                                    </div>
                                                    ➕
                                                </button>
                                                {{-- edit --}}
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalupdate{{ $pro->product_id }}"
                                                    wire:click="edit({{ $pro->product_id }})">
                                                    <i class="fa-pen fa"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div wire:ignore.self class="modal fade"
                                                    id="exampleModalupdate{{ $pro->product_id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    ShopMart</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="mt-5 p-3 bg-light"
                                                                    wire:submit.prevent="orderqtys({{ $pro->product_id }})">
                                                                    @csrf
                                                                    <h3 class="mb-5">QTY</h3>
                                                                    <div class="mb-3">
                                                                        <div class="mb-2">
                                                                            <input wire:model="orderqty" type="number"
                                                                                class="form-control" name="orderqty"
                                                                                placeholder="ORDER QTY">
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <button type="submit"
                                                                                class="btn btn-warning rounded-pill w-100 "
                                                                                data-bs-dismiss="modal">DONE</button>
                                                                        </div>
                                                                        {{-- {{ dd($user) }} --}}
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($selected == $pro->product_id)
                                                    @error('orderqty')
                                                        <span
                                                            class="alert-danger alert text-center p-1">{{ $message }}</span>
                                                    @enderror
                                                @endif
                                                {{-- end edit --}}
                                            </div>
                                        </div>
                                        <div class="actionbtns d-grid w-25">
                                                <div class="w-100 d-flex align-items-center justify-content-center">
                                                    <div wire:loading.remove wire:target="buy({{ $pro->product_id }})">
                                                        <i class="fas fa-bolt fa-2xl text-primary" style="cursor: pointer" wire:click="buy({{ $pro->product_id }})">
                                                    </i>
                                                </div>
                                                        <div wire:loading wire:target="buy({{ $pro->product_id }})">
                                                        Buying...😇</div>
                                                </div>
                                                @if (isset(Auth::user()->id))
                                                <?php
                                                $cart = Cart::where('product_id', $pro->product_id)->first();
                                                ?>
                                                @if (isset($cart))
                                                
                                                    <div class="d-flex justify-content-center align-items-center w-100"
                                                        >
                                                        <div wire:loading.remove
                                                            wire:target="removecartlogin({{ $pro->product_id }})">
                                                            <i style="cursor: pointer" class="fa-solid fa-trash fa-2xl text-danger" wire:click="removecartlogin({{ $pro->product_id }})"></i>
                                                        </div>
                                                        <div wire:loading
                                                            wire:target="removecartlogin({{ $pro->product_id }})">
                                                            Removing..😥
                                                        </div>
                                                    </div>
                                                @endif
                                            @elseif(isset($_COOKIE["add$pro->product_id"]))
                                                <div class="d-flex justify-content-center align-items-center w-100"
                                                   >
                                                   <div wire:loading.remove
                                                        wire:target="removecartbadge({{ $pro->product_id }})">
                                                    <i style="cursor: pointer" class="fa-solid fa-trash fa-2xl text-danger"  wire:click="removecartbadge({{ $pro->product_id }})"></i>
                                                    </div>
                                                    <div wire:loading
                                                        wire:target="removecartbadge({{ $pro->product_id }})">
                                                        Removing...😥</div>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- action btn div ends here --}}
                                    </div>
                                    <hr style="border:1px dashed">
                                </div>
                                {{-- row ends  --}}
                            @endforeach
                        </div>
                    </div>
                    {{-- col md 8 ends --}}
                    @if ($checked != null)
                        <div class="p-3 col-md-4 pt-0 mb-5">
                            <div class="shadow-lg p-2 card  w-100 sticky-md-top" style="top: 65px !important">
                                <div class="text-center  h4 text-success">Cart Products Bill</div>
                                <?php
                                $subtotal = 0;
                                $sale_subtotal = 0;
                                ?>
                                <hr style="border: 1px dashed">
                                <div class="text-secondary">Products Name</div>
                                <div class="">
                                    @foreach ($checked as $proid)
                                    <?php
                                    $pro = Product::where('product_id', $proid)->first();
                                        if (isset(Auth::User()->id)) {
                                            $cart = Cart::where('user_id', Auth::user()->id)
                                                ->where('product_id', $pro->product_id)
                                                ->first();
                                            $orderqty = $cart->orderqty;
                                        } else {
                                            $orderqty = $_COOKIE["orderqty$pro->product_id"];
                                        }
                                        $subtotal = ($subtotal + $pro->price) * $_COOKIE["orderqty$pro->product_id"];
                                        $sale_subtotal = $sale_subtotal + $pro->sale_price * $orderqty;
                                        ?>
                                        <div class="text-primary me-2 ">
                                            [{{ $pro->product_name }}]&times; <span class="text-danger">
                                                @if (isset(Auth::User()->id))
                                                    <?php $cart = Cart::where('user_id', Auth::user()->id)
                                                        ->where('product_id', $pro->product_id)
                                                        ->first(); ?>
                                                    {{ $cart->orderqty }}
                                                    @else{{ $_COOKIE["orderqty$pro->product_id"] }}
                                                @endif
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                                <hr style="border: 1px dashed">
                                <div class="d-flex justify-content-between">
                                    <div class="price text-primary fw-bold">Total Price <span class="text-success"><i
                                                class="fa-solid fa-tag"></i></span></div>
                                    <del class="text-danger">₹{{ $subtotal }} </del>
                                </div>
                                <hr style="border: 1px dashed">
                                <div class="d-flex justify-content-between">
                                    <div class="discount text-primary fw-bold">Total Discount <span
                                            class="text-success"><i class="fas fa-badge-percent"></i></span> </div>
                                    <div class="text-success">-₹{{ $subtotal - $sale_subtotal }} </div>
                                </div>
                                <hr style="border: 1px dashed">
                                <div class="d-flex justify-content-between">
                                    <div class="discount text-primary fw-bold">Grand Total </div>
                                    <div class="text-success fw-bold">₹{{ $sale_subtotal }}</div>
                                </div>
                                <hr style="border: 1px dashed">
                            </div>
                        </div>
                    @endif
                </div>
                {{-- row div is ends  --}}
                @if ($checked != null)
                    <div class="sticky-bottom">
                        <div>
                            <form wire:submit.prevent="buynowcart">

                                @if (isset(Auth::user()->id))
                                    <button class=" btn w-100 btn-warning" type="submit">BUY NOW</button>
                                @else
                                    <a type="button" href="{{ url('login') }}" class="btn btn-warning w-100">BUY
                                        NOW</a>
                                @endif
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    @endforeach
</div>
