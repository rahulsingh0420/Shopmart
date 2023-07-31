<div style="background-color: lavender;">
    <style>
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.4) !important;
        }
    </style>
    <?php
    use App\Models\User;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Cart;
    ?>
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

    {{-- navbar start --}}
    <nav style="position:sticky ; z-index:999 ; top:0"
        class="navbar  navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark"
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                            @if (isset(Auth::user()->id))
                                @if (Auth::user()->actype == 'admin')
                                    <li><a class="dropdown-item fs-5" href="{{ url('/adminpanel') }}">Admin Panel <i
                                        class="fa-solid ms-2 fa-user"></i></a></li>
                                @endif
                            @endif
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
                        <a wire:click="logoutUser" class="text-primary fw-bold fs-5" style="text-decoration: none;cursor:pointer">Log
                            Out</a>
                    @else
                        <a href="{{ url('login') }}" class="text-primary fw-bold fs-5"
                            style="text-decoration: none">Login</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar ends  --}}

    <div class="d-flex flex-row bg-secondary w-100 py-0 p-2" style="height:30px">
        @foreach (Category::all() as $cat)
            <a class="text-white ms-4 fw-bold fs-5" href="{{ url('singlecat/' . $cat->category_id) }}"
                style="cursor: pointer">{{ $cat->category_name }}<i class="fa fa-external-link fa-sm ms-1"></i></a>
        @endforeach
    </div>

    {{-- navbar ends here --}}

    <div class="container mt-4 mb-5">
        <form class="d-flex justify-content-center" role="search">
            <input class="form-control ms-5 fs-4 me-2 w-100 hovershadow " type="search" wire:model="search"
                placeholder="Search" aria-label="Search">
            <div class="align-items-center d-flex">
                <div wire:loading wire:target="search">
                    <div class="text-success">Searching😇</div>
                </div>
            </div>

        </form>
    </div>

    <main class=" mt-3">

        {{-- crowsel starts from here --}}
        @if ($search == null)
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/images/laptop.webp') }}" class="d-block w-100"
                            style="height: 266px; object-fit:cover" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/boult.webp') }}" class="d-block w-100"
                            style="height: 266px; object-fit:cover" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/images/infinix.webp') }}" class="d-block w-100"
                            style="height: 266px; object-fit:cover" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        @endif
        {{-- crowsel ends here --}}


        {{-- Products Starts From Here --}}
        <div class="container-fluid p-3 mt-3">
            @php
                $cats = Category::all();
            @endphp
            <div class="row">
                @if ($search != null)
                    @if ($products != null)
                        @php
                            $pros = $products->get();
                        @endphp
                        <div style="text-decoration: none;z-index: 899; min-height: 100vh;"
                            class="p-3 mt-4 col-sm-12">
                            @foreach ($pros as $pro)
                                <a href="{{ url('oneproduct/' . $pro->product_id) }}"
                                    style="text-decoration: none;border-radius:10px"
                                    class="d-flex p-3 hovershadow flex-row align-items-center">
                                    <div class="img" style="width: 25%">
                                        <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                            width="100%" height="100px" style="object-fit:contain;"
                                            alt="{{ $pro->product_name }}">
                                    </div>
                                    <div class="nameandprice d-flex flex-row h5 fw-bold text-secondary "
                                        style="width: 75%">
                                        {{ $pro->product_name }}

                                    </div>
                                    <div class="d-none d-md-block me-5 h5 text-success">
                                        ₹{{ $pro->sale_price }} <del
                                            class="text-secondary">₹{{ $pro->price }}</del>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                @else
                    @foreach ($cats as $cat)
                        @php
                            $exist = Product::where('category', $cat->category_id)->first();
                        @endphp
                        @if ($exist != null)
                            <div class="d-flex card mt-5 flex-row  justify-content-between"
                                style="background-color: lavender;text-transform: capitalize; border-bottom:none">
                                <div class="text-primary d-flex justify-content-between w-100">
                                    <h1>{{ $cat->category_name }}</h1>
                                    <span class="d-flex align-items-center">
                                        <a href="{{ url('singlecat/' . $cat->category_id) }}"
                                            class="btn-sm btn-primary btn">
                                            view all
                                        </a>
                                    </span>
                                </div>
                            </div>
                        @endif
                        @php
                            $pros = Product::where('category', "$cat->category_id")->paginate(4);
                        @endphp
                        @foreach ($pros as $pro)
                            <div style="text-decoration: none;z-index: 899"
                                class="p-2 pt-0 d-flex col-sm-12 col-xl-3 col-lg-4 col-md-6">

                                <div class="p-2 pt-0 hovernone  card d-grid"
                                    style="z-index:900;border-radius:13px; flex: 1; background-color: cornsilk; box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;">
                                    <a href="{{ url('oneproduct/' . $pro->product_id) }}"
                                        style="text-decoration: none" class="img p-2">
                                        <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                            class="rounded" style="width: 100%; height:200px; object-fit:contain"
                                            alt="">
                                    </a>
                                    <a class="details d-grid ms-2" href="{{ url('oneproduct/' . $pro->product_id) }}"
                                        style="text-decoration: none">
                                        <div class="name fw-bold h5 text-primary " style="text-transform: capitalize">
                                            {{ $pro->product_name }}</div>
                                        <?php
                                        $x = $pro->price;
                                        $y = $pro->sale_price;
                                        $z = ($y / $x) * 100;
                                        $salepersent = 100 - $z;
                                        ?>
                                        <div class="price h6 text-primary" style="text-transform: capitalize">
                                            <del>₹{{ $pro->price }}</del> <span
                                                class="ms-2 h5 text-success">₹{{ $pro->sale_price }}</span>
                                        </div>
                                        <div class="salepersent h4  text-success fw-bold"
                                            style="font-family: cursive">
                                            {{ number_format($salepersent, 2) }}% OFF</div>
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
                                        {{-- <p class="discription rounded  w-100 ms-0 "> --}}
                                        <div class="text-sm text-secondary" style="font-size: 11px">
                                            <?php
                                            $catid = $pro->category;
                                            $cat = Category::where('category_id', $catid)->first();
                                            ?>
                                            A {{ $cat->category_name }} Product</div>
                                        <p class="text-secondary m-0 overflow-x-hidden">{{ $pro->discription }}
                                        </p>
                                        {{-- </p> --}}
                                        @if ($pro->qty >= 1)
                                            @if (session("added$pro->product_id"))
                                                <div class="alert m-0 p-0 py-1 alert-success text-center">
                                                    {{ session("added$pro->product_id") }}😻😃</div>
                                            @endif
                                            @if (session("removed$pro->product_id"))
                                                <div class="alert m-0 p-0 py-1 alert-danger text-center">
                                                    {{ session("removed$pro->product_id") }}😞😥</div>
                                            @endif

                                    </a>
                                    <div class="buycart row">
                                        <div class="col-sm-12 col-md-6 p-2">
                                            <button class="btn w-100 btn-outline-primary rounded-pill"
                                                wire:click="buy({{ $pro->product_id }})">
                                                <div wire:loading.remove wire:target="buy({{ $pro->product_id }})">BUY
                                                    NOW</div>
                                                <div wire:loading wire:target="buy({{ $pro->product_id }})">
                                                    Buying...😇</div>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 col-md-6 p-2">



                                            @if (isset(Auth::user()->id))
                                                <?php
                                                $cart = Cart::where('product_id', $pro->product_id)
                                                    ->where('user_id', Auth::user()->id)
                                                    ->first();
                                                ?>
                                                @if ($cart == null)
                                                    <button class="btn w-100 btn-outline-success rounded-pill"
                                                        wire:click="addcartlogin({{ $pro->product_id }})">
                                                        <div wire:loading.remove
                                                            wire:target="addcartlogin({{ $pro->product_id }})">Add
                                                            Cart</div>
                                                        <div wire:loading
                                                            wire:target="addcartlogin({{ $pro->product_id }})">
                                                            Adding...😇</div>
                                                    </button>
                                                @endif
                                            @elseif(!isset($_COOKIE["add$pro->product_id"]))
                                                <button class="btn w-100 btn-outline-success rounded-pill"
                                                    wire:click="addcartbadge({{ $pro->product_id }})">
                                                    <div wire:loading.remove
                                                        wire:target="addcartbadge({{ $pro->product_id }})">
                                                        Add
                                                        Cart
                                                    </div>
                                                    <div wire:loading
                                                        wire:target="addcartbadge({{ $pro->product_id }})">
                                                        Adding...😇
                                                    </div>
                                                </button>
                                            @endif

                                            @if (isset(Auth::user()->id))
                                                <?php
                                                $cart = Cart::where('product_id', $pro->product_id)
                                                    ->where('user_id', Auth::user()->id)
                                                    ->first();
                                                ?>
                                                @if (isset($cart))
                                                    <button class="btn w-100 btn-outline-danger rounded-pill"
                                                        wire:click="removecartlogin({{ $pro->product_id }})">
                                                        <div wire:loading.remove
                                                            wire:target="removecartlogin({{ $pro->product_id }})">
                                                            Remove</div>
                                                        <div wire:loading
                                                            wire:target="removecartlogin({{ $pro->product_id }})">
                                                            Removing...😥</div>
                                                    </button>
                                                @endif
                                            @elseif(isset($_COOKIE["add$pro->product_id"]))
                                                <button class="btn w-100 btn-outline-danger rounded-pill"
                                                    wire:click="removecartbadge({{ $pro->product_id }})">
                                                    <div wire:loading.remove
                                                        wire:target="removecartbadge({{ $pro->product_id }})">
                                                        Remove</div>
                                                    <div wire:loading
                                                        wire:target="removecartbadge({{ $pro->product_id }})">
                                                        Removing...😥</div>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                        @endif
            </div>
        </div>
        @endforeach
        @endforeach
        @endif
</div>

</div>

</main>


















</div>
