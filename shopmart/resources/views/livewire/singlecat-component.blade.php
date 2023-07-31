<div>

    <?php
    use App\Models\User;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Cart;
    use App\Models\Mobiledetail;
    use App\Models\Laptopdetail;
    use App\Models\MobileAccessoriesdetail;
    $products = array();
    $index = 0;
    ?>
    @php
        $cat = Category::where('category_id', $ids)->first();
    @endphp
    
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

    <div class="d-flex flex-row bg-secondary w-100 py-0 p-2" style="height:30px">
        @foreach (Category::all() as $cate)
            <a class="text-white ms-4 fw-bold fs-5" href="{{ url('singlecat/' . $cate->category_id) }}"
                style="cursor: pointer">{{ $cate->category_name }}<i class="fa fa-external-link fa-sm ms-1"></i></a>
        @endforeach
    </div>
    {{-- navbar ends --}}
    <h1 class="text-primary  m-3 fw-bold mt-3">
        {{ $cat->category_name }}
    </h1>
    {{-- search --}}

<div class="container mt-2">

    <div class="search w-100" >
        <input type="search" placeholder="Search" class="form-control text-black" name="search" wire:model="search" id="search">
    </div>
</div>

@if($cat->category_id == 1)
<div>
<hr>
<div class="px-3">
<h4>Filter</h4>
<div class="d-flex ">
    <div class="mx-2">
        <select class="form-select" style="width: unset" wire:model="ram" name="ram" id="ram">
            <option value="" selected>RAM</option>
            <option value="2GB">2 GB</option>
            <option value="4GB">4 GB</option>
            <option value="6GB">6 GB</option>
            <option value="8GB">8 GB</option>
            <option value="12GB">12 GB</option>
            <option value="16GB">16 GB</option>
        </select>
    </div>
    <div class="mx-2">
        <select class="form-select" style="width: unset" wire:model="storage" name="storage" id="storage">
            <option value="" selected>Storage</option>
            <option value="16GB">16 GB</option>
            <option value="32GB">32 GB</option>
            <option value="64GB">64 GB</option>
            <option value="128GB">128 GB</option>
            <option value="256GB">256 GB</option>
            <option value="512GB">512 GB</option>
            <option value="1TB">1 TB</option>
        </select>
    </div>
    <div class="mx-2">
        <select name="sortprice" wire:model="sortprice" class="form-select" id="sortprice">
            <option value="asc">low to high</option>
            <option value="desc">high to low</option>
        </select>
    </div>
</div>
</div>
<hr>
</div>

@endif

@if($ram == null AND $storage == null)
@php
    $products = $pros;
@endphp


@endif
{{-- {{ dd($ram) }} --}}
@if($ram != null OR $storage != null)
@php
foreach ($pros as $pro) {
    $productsdetails = Mobiledetail::where('product_id' , $pro->product_id)->orWhere('storage', $storage)->orWhere('ram' , $ram)->get();
    }

    foreach ($productsdetails as $proToadd) {
        $pro = Product::where('product_id' , $proToadd->product_id)->first();
    $products[$index] = $pro;
    $index++;
}
// dd($productsdetails);
@endphp
@endif
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($products as $pro)
                    <a style="text-decoration: none" class="p-3" href="{{ url('oneproduct/' . $pro->product_id) }}">
                        <div class="d-flex  flex-row card hovershadow align-items-center p-3">
                            <div class="p-3 img me-3 w-25">
                                <img src="{{ asset('storage/product_images/' . $pro->product_img) }}"
                                    style="max-width: 150px; max-height:150px" alt="">
                            </div>
                            <div class="h3 w-50 text-secondary d-flex flex-column namespecs">
                                {{ $pro->product_name }}
                                <div class="specs">   
                                    <ul class="m-0">
                                        @if ($cat->category_id == 1)
                                            @php
                                                $detail = Mobiledetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            @if ($detail != null)
                                                <li>
                                                    RAM
                                                    {{ $detail->ram }}
                                                    |
                                                    Storage
                                                    {{ $detail->storage }}
                                                </li>
                                                <li>
                                                    Chipset
                                                    {{ $detail->chipset }}
                                                </li>
                                                <li>
                                                    Primary Camera
                                                    {{ $detail->primary_camera }}
                                                    | Selfie Camera
                                                    {{ $detail->selfie_camera }}
                                                </li>
                                                <li>
                                                    Battery</td>
                                                    {{ $detail->battery }}
                                                </li>
                                            @else
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
                                            @endif
                                        @endif
                                        @if ($cat->category_id == 2)
                                            @php
                                                $detail = Laptopdetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            @if ($detail != null)
                                            <li>
                                                Display
                                                {{ $detail->display }}
                                            </li>
                                            <li>
                                                RAM
                                                {{ $detail->ram }}
                                                |
                                                Storage
                                                {{ $detail->storage }}
                                            </li>
                                            <li>
                                                Chipset
                                                {{ $detail->chipset }}
                                            </li>
                                            <li>
                                                Battery
                                                {{ $detail->battery }}
                                            </li>
                                            <li>
                                                Operating System
                                                {{ $detail->operating_system }}
                                            </li>
                                            @else
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
                                            @endif
                                            
                                            {{-- table for laptop specifications --}}
                                            {{-- {{ dd($detail) }} --}}
                                        @endif
                                        @if ($cat->category_id == 5)
                                            @php
                                                $detail = MobileAccessoriesdetail::where('product_id', $pro->product_id)->first();
                                            @endphp
                                            @if ($detail != null)
                                            <li>
                                                Brand
                                                {{ $detail->brand }}
                                            </li>
                                            <li>
                                                Type
                                                {{ $detail->type }}
                                            </li>
                                            <li>
                                                {{ $detail->compatible_with }} Compatible
                                            </li>
                                            <li>
                                                Warranty
                                                {{ $detail->warranty }} Year
                                            </li>
                                            @else
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
                                            @endif
                                        @endif
                                        {{-- if condition end --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="h3 w-25 p-3 text-secondry details d-flex flex-column ">
                                <div class="h1 price fw-bold text-success">
                                    ₹{{ $pro->sale_price }}
                                    <del class="h6 text-secondary">₹{{ $pro->price }}</del>
                                    @php
                                        $off = 100 - ($pro->sale_price / $pro->price) * 100;
                                    @endphp
                                    <div class=" text-success fw-bold h4 off" style="font-family: cursive">
                                        {{ number_format($off, 2) }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>




</div>
