<div>

    {{-- navbar code starts from here --}}
    <nav class="navbar  shadow-lg navbar-expand-lg bg-body-tertiary mb-5 position-sticky top-0" style="z-index: 998">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions"><i class="fad fa-angle-double-right fa-lg"
                    style="--fa-secondary-color: #0060ff;"></i></button>
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">ShopMart</a>
            @if (isset(Auth::user()->id))
                <a style="cursor: pointer" class=" text-decoration-none text-primary fw-bold"
                    wire:click="logoutUser">Logout</a>
            @else
                <a class="text-decoration-none text-primary fw-bold" href="{{ url('login') }}">Login</a>
            @endif
        </div>
    </nav>
    {{-- navbar code ends here --}}

    <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-primary" id="offcanvasWithBothOptionsLabel">ShopMart Admin Panel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-dark">
            <nav class="nav-pills nav-tabs nav-fills flex-column">
                <a class="nav-link active p-2" aria-current="page" href="{{ url('adminpanel') }}">Admin Panel</a>
                <a class="nav-link text-white p-2" href="{{ url('alluser') }}">All Users</a>
                <a class="nav-link text-white p-2" href="{{ url('allproduct') }}">All Products</a>
                <a class="nav-link text-white p-2" href="{{ url('allorder') }}">All Orders</a>
            </nav>
        </div>
    </div>
    {{-- nav bar code ends here --}}


    @php
        use App\Models\User;
        use App\Models\Product;
        use App\Models\Category;
        use App\Models\Orderdetail;
    @endphp




    <div class="container-fluid">
        <div class="row">
            <a style="border-radius: 13px" class="col-md-3 col-sm-6  p-5 text-decoration-none hovershadow" href="{{ url('alluser') }}" style="text-decoration:none">
            <div >
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ User::all()->count() }} <i
                                    class="fad ms-2 fa-users fa-lg" style="--fa-secondary-color: #0968f7;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                            Registered Users On ShopMart
                        </div>
                    </div>
                </div>
                </a>

            <a  style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none hovershadow" href="{{ url('allproduct') }}" style="text-decoration:none">
            <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ Product::all()->count() }} <i class="fad fa-box-check fa-sm" style="--fa-secondary-color: #0d63f2;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                            Registered Products On ShopMart
                        </div>
                    </div>
                </div>
            </a>
            <a  style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none  hovershadow" href="{{ url('allorder') }}" style="text-decoration:none">
            <div >
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ Orderdetail::all()->count() }} <i class="fad fa-hand-holding-box fa-sm" style="--fa-secondary-color: #0e69f1;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                             Order's Completed On ShopMart
                        </div>
                    </div>
                </div>
            </a>
            <a style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none  hovershadow" href="{{ url('allproduct') }}" style="text-decoration:none">
            <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ Category::all()->count() }} <i class="fad fa-boxes fa-sm" style="--fa-secondary-color: #0a92f5;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                             Diffrent Categories On ShopMart
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



{{-- recent orders and register's--}}

<div class="container-fluid">
    <div class="row justif  y-content-between p-2">
    <div class="col-sm-12 p-3 col-md-8" style="border-radius:13px">
            <div class=" hovershadow card p-2" style="border-radius: 13px">
            <div class="d-flex justify-content-between">
                <div class="text-primary h4">Recently Purchased Orders</div>
                <div class="butn">
                    <a class="btn btn-sm btn-primary " style="font-size: 10px" href="{{ url('allorder') }}">View All</a>
                </div>
            </div>
            @php
                $orders = Orderdetail::orderBy('order_id' , "desc")->paginate(10)
            @endphp

                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Buyer</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Contact No</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($orders as $order)
                            @if ($order != NULL)
                            @php
                    $pro = Product::where('product_id' , $order->product_id)->first();
                    $user = User::where('id' , $order->user_id)->first();
                    @endphp
                            <tr>
                                <td>{{ $pro->product_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $user->mobile_no }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

{{-- recent order's end--}}

<div class="col-sm-12 col-md-4  p-3">
    <div class="hovershadow p-2 card"  style="border-radius:13px; z-index: 999">    
        <div class="d-flex  justify-content-between">
        <div class="text-primary h4">Recently Registered Users</div>
        <div class="butn">
            <a class="btn btn-sm btn-primary " style="font-size: 10px" href="{{ url('alluser') }}">View All</a>
        </div>
    </div>
    @php
        $users = User::orderBy('id' , "desc")->paginate(10)
    @endphp

            <table class="table-hover w-100 table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>Contact No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user != NULL)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->state }}</td>
                        <td>{{ $user->mobile_no }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
</div>
</div>

{{-- recent register's end--}}
    </div>
</div>

{{-- reccent orders and register's --}}


</div>
