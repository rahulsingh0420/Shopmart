<div>
    <?php
    use App\Models\User;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Cart;
    use App\Models\Mobiledetail;
    use App\Models\Laptopdetail;
    use App\Models\MobileAccessoriesdetail;
    $pro = Product::where('product_id', $ids)->first();
    $cat = Category::where('category_id', $pro->category)->first();
    ?>
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
        class="shadow-lg navbar  navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark"
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



    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-4 d-flex flex-column">
                <div class="d-flex  justify-content-center p-3" style="top: 90px;position:sticky">
                    <div class=" d-flex flex-column">
                        <div class="img">
                            <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                class="w-100 object-fit-contain rounded" style="height: 400px"
                                alt="{{ $pro->product_name }}">
                        </div>
                        <div class="buycart mt-3 row">
                            <div class="col-sm-12 col-md-6 p-2">
                                <div class="btn w-100 btn-warning rounded justify-content-center d-flex" style="flex: 1" wire:click="buy({{ $pro->product_id }})">
                                    <div class="h3 align-self-center "  wire:loading.remove wire:target="buy({{ $pro->product_id }})">
                                            <i class="fas fa-bolt fa-2xl text-white" style="cursor: pointer" ></i>
                                    </i>
                                    </div>
                                    <div class="text-white" wire:loading wire:target="buy({{ $pro->product_id }})">
                                        Buying...😇
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 p-2 d-flex">
                                @if (isset(Auth::user()->id))
                                    <?php
                                    $cart = Cart::where('product_id', $pro->product_id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
                                    ?>
                                    {{-- {{ dd($pro) }} --}}
                                    @if ($cart == null)
                                        {{-- <div class="btn w-100 btn-success rounded"
                                            >

                                            <div >Add
                                                Cart</div>

                                            <div class="h2 text-white" >
                                                Adding...😇</div>
                                            </div> --}}

                                            <div class="btn w-100 btn-primary rounded justify-content-center d-flex" style="flex: 1" wire:click="addcartlogin({{ $pro->product_id }})">
                                                <div class="h3 align-self-center " wire:loading.remove
                                                wire:target="addcartlogin({{ $pro->product_id }})">
                                                        <i class="fa-solid fa-cart-plus fa-2xl text-white" style="cursor: pointer" ></i>
                                                </i>
                                                </div>
                                                <div class=" text-white"  wire:loading wire:target="addcartlogin({{ $pro->product_id }})">
                                                    Adding...😇
                                                </div>
                                            </div>

                                    @endif
                                @elseif(!isset($_COOKIE["add$pro->product_id"]))
                                    <div class="btn w-100 btn-primary rounded justify-content-center d-flex" style="flex: 1" wire:click="addcartbadge({{ $pro->product_id }})">
                                        <div class="h3 align-self-center " wire:loading.remove wire:target="addcartbadge({{ $pro->product_id }})">
                                                <i class="fa-solid fa-cart-plus fa-2xl text-white" style="cursor: pointer" ></i>
                                        </i>
                                        </div>
                                        <div class=" text-white"  wire:loading wire:target="addcartbadge({{ $pro->product_id }})">
                                            Adding...😇
                                        </div>
                                    </div>
                                @endif

                                @if (isset(Auth::user()->id))
                                    <?php
                                    $cart = Cart::where('product_id', $pro->product_id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();
                                    ?>
                                    @if (isset($cart))
                                        <button class="btn w-100 btn-outline-danger rounded"
                                            wire:click="removecartlogin({{ $pro->product_id }})">
                                            <div wire:loading.remove
                                                wire:target="removecartlogin({{ $pro->product_id }})">
                                                Remove</div>
                                            <div wire:loading wire:target="removecartlogin({{ $pro->product_id }})">
                                                Removing...😥</div>
                                        </button>
                                    @endif
                                @elseif(isset($_COOKIE["add$pro->product_id"]))
                                    <button class="btn w-100 btn-outline-danger rounded"
                                        wire:click="removecartbadge({{ $pro->product_id }})">
                                        <div wire:loading.remove wire:target="removecartbadge({{ $pro->product_id }})">
                                            Remove</div>
                                        <div wire:loading wire:target="removecartbadge({{ $pro->product_id }})">
                                            Removing...😥</div>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- col sm 4 ends here --}}
            <div class="col-sm-8">
                <div class="p-3">
                    <div class="d-flex flex-column">
                        <div class="name h1 text-dark " style="text-transform: capitalize">
                            {{ $pro->product_name }}
                        </div>
                        {{-- name div ends  --}}
                        <div class="category">
                            <span style="border-radius: 7px" class="bg-warning text-white fw-bold fs-5 p-1">
                                A Product of {{ $cat->category_name }} Category
                            </span>
                        </div>
                        {{-- category div ends  --}}
                        <div class="price d-flex flex-column">
                            <div class="save text-primary fw-bold fs-5">
                                save extra ₹{{ $pro->price - $pro->sale_price }}
                            </div>
                            <div class=" d-flex flex-row align-items-center">
                                <div class="sale_price fs-1 me-2 fw-bold">
                                    ₹{{ $pro->sale_price }}
                                </div>
                                <div class="price text-secondary">
                                    <del class="fs-5">₹{{ $pro->price }}</del>
                                </div>
                            </div>
                            <div class="text-success  h1" style="font-family: cursive">
                                @php
                                    $salepersent = 100 - ($pro->sale_price / $pro->price) * 100;
                                @endphp
                                {{ number_format($salepersent, 2) }}% off
                            </div>
                        </div>
                        {{-- price ends --}}
                        <div class="offers mt-3">
                            <div class="fs-3">
                                Available Offers
                            </div>
                            <ul class="" style="list-style-type: none">
                                <li class="fs-4 text-secondary">
                                    <i class="fad fa-tags me-2" style="--fa-secondary-color: #0f42f0;"></i>Bank
                                    Offer5% Cashback on Shopmart Axis Bank Card
                                </li>
                                <li class="fs-4 text-secondary">
                                    <i class="fad fa-tags me-2" style="--fa-secondary-color: #0f42f0;"></i>Bank
                                    Offer₹2000 Off On HDFC bank Credit Non EMI, Credit and Debit Card EMI Transactions
                                </li>
                                <li class="fs-4 text-secondary">
                                    <i class="fad fa-tags me-2" style="--fa-secondary-color: #0f42f0;"></i>Bank
                                    Offer₹2000 Off On ICICI bank Credit Non EMI, Credit and Debit Card EMI Transactions
                                </li>
                                <li class="fs-4 text-secondary">
                                    <i class="fad fa-tags me-2" style="--fa-secondary-color: #0f42f0;"></i>Special
                                    PriceGet extra ₹40000 off (price inclusive of cashback/coupon)
                                </li>
                            </ul>

                        </div>
                        {{-- offers ends --}}
                        <div class="specifications">
                            <div class="text-secondary mt-3 h1">SPECIFICATIONS</div>
                            <div class="spec-table">
                                @if ($cat->category_id == '1')
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $detail = Mobiledetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            <tr>
                                                <td>Display</td>
                                                <td>{{ $detail->display }}</td>
                                            </tr>
                                            <td>In The Box</td>
                                            <td>{{ $detail->in_the_box }}</td>
                                            <tr>
                                                <td>RAM</td>
                                                <td>{{ $detail->ram }}</td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td>{{ $detail->storage }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chipset</td>
                                                <td>{{ $detail->chipset }}</td>
                                            </tr>
                                            <tr>
                                                <td>Primary Camera</td>
                                                <td>{{ $detail->primary_camera }}</td>
                                            </tr>
                                            <tr>
                                                <td>Selfie Camera</td>
                                                <td>{{ $detail->selfie_camera }}</td>
                                            </tr>
                                            <tr>
                                                <td>Battery</td>
                                                <td>{{ $detail->battery }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty </td>
                                                <td>{{ $detail->warranty }}</td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                                <td>{{ $detail->operating_system }}</td>
                                            </tr>
                                            <tr>
                                        </tbody>
                                    </table>
                                    {{-- table for mobile specifications --}}
                                    @endif
                                    
                                @if ($cat->category_id == '2')
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $detail = Laptopdetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            <tr>
                                                <td>Display</td>
                                                <td>{{ $detail->display }}</td>
                                            </tr>
                                            <tr>
                                                <td>RAM</td>
                                                <td>{{ $detail->ram }}</td>
                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td>{{ $detail->storage }}</td>
                                            </tr>
                                            <tr>
                                                <td>Chipset</td>
                                                <td>{{ $detail->chipset }}</td>
                                            </tr>
                                            <tr>
                                                <td>Battery</td>
                                                <td>{{ $detail->battery }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty </td>
                                                <td>{{ $detail->warranty }}</td>
                                            </tr>
                                            <tr>
                                                <td>Operating System</td>
                                                <td>{{ $detail->operating_system }}</td>
                                            </tr>
                                            <tr>
                                        </tbody>

                                        {{-- table for laptop specifications --}}
                                    </table>
                                    @endif
                                @if ($cat->category_id == '5')
                                    <table class="table table-sripped table-hover">
                                        <thead>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $detail = MobileAccessoriesdetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            <tr>
                                                <td>Brand</td>
                                                <td>{{ $detail->brand }}</td>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td>{{ $detail->type }}</td>
                                            </tr>
                                            <tr>
                                                <td>Compatible With</td>
                                                <td>{{ $detail->compatible_with }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty </td>
                                                <td>{{ $detail->warranty }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                    {{-- table for Mobile Accessories ends --}}
                                @endif
                                {{-- if condition end --}}
                            </div>
                        </div>
                        {{-- specifications div ends here --}}
                    </div>
                </div>
            </div>
            {{-- col sm 8 ends here --}}
        </div>
        {{-- row div ends here  --}}
    </div>
    {{-- container fluid div is ends here --}}





</div>
