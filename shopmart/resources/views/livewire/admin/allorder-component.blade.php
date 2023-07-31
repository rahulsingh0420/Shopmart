<div>

    {{--  --}}



    @php
    use App\Models\User;
    use App\Models\Product;
    use App\Models\Category;
    use App\Models\Orderdetail;
    @endphp
    
    
    
    
    <div class="container-fluid">
    <div class="row p-4 ">
        <a style="border-radius: 13px" class="col-md-3 col-sm-6  p-5  text-decoration-none hovershadow" href="{{ url('alluser') }}" style="text-decoration:none">
        <div >
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <h1 class="fw-bold  text-primary">{{ User::all()->count() }} <i
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
        <a  style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none bg-primary  hovershadow" href="{{ url('allorder') }}" style="text-decoration:none">
        <div >
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div>
                        <h1 class="fw-bold text-white">{{ Orderdetail::all()->count() }} <i class="fa fa-hand-holding-box fa-sm" style="--fa-secondary-color: #0e69f1;"></i></h1>
                    </div>
                    <div style="font-size: 12px" class="text-white fw-bold">
                         Order's Completed On ShopMart
                    </div>
                </div>
            </div>
        </a>
        <a style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none hovershadow" href="{{ url('allproduct') }}" style="text-decoration:none">
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
    
    
    {{--  --}}
    


<nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky top-0" style="z-index: 998" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fad fa-angle-double-right fa-lg" style="--fa-secondary-color: #0060ff;"></i></button>
      <a class="navbar-brand" href="{{ url('/') }}">ShopMart</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/adminpanel') }}">Admin Panel</a>
              </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('/alluser') }}">All Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/allproduct') }}">All Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('/allorder') }}">All Orders</a>
          </li>
        </ul>
        <div class="form">
            <a wire:click="logoutUser" class="text-primary text-decoration-none fw-bold" style="cursor: pointer">LogOut</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-primary" id="offcanvasWithBothOptionsLabel">ShopMart Admin Panel</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-dark">
      <nav class="nav-pills nav-tabs nav-fills flex-column">
          <a class="nav-link  text-white p-2" aria-current="page" href="{{ url('adminpanel') }}">Admin Panel</a>
          <a class="nav-link text-white p-2 " href="{{ url('alluser') }}">All Users</a>
          <a class="nav-link text-white p-2 " href="{{ url('allproduct') }}">All Products</a>
          <a class="nav-link text-white p-2 active" href="{{ url('allorder') }}">All Orders</a>
        </nav>
      </div>
  </div>



    <div class="bg-light mt-5 container-fluid">
        <div class="header d-flex justify-content-between border p-2">
            <h2 class="text-primary">All Orders</h2>
            {{-- <div class="search d-flex flex-row align-items-center">
                <span class="fw-bold">Search</span> --}}
                <input type="search" placeholder="Search By Name" class="w-75 form-control ms-1" wire:model="search">
            {{-- </div> --}}
        </div>

        <div wire:loading wire:target="search">
            Searching orders...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading wire:target="edit">
            Searching Order To Edit...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading wire:target="delete" class="w-100">
            <div class="alert alert-danger w-100 text-center">
                Deleting Order...😥<div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        @if (session('userupdated'))
            <div class="w-100 text-center alert alert-warning">{{ session('userupdated') }}😇</div>
        @endif
        @if (session('userdeleted'))
            <div class="w-100 text-center alert alert-danger">{{ session('userdeleted') }}😥</div>
            <div class="row">
        @endif
        <div class="col-sm-12">
            <table class="table table-bordered w-100" style="overflow-x: scroll">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>User Id</th>
                        <th>Product Id</th>
                        <th>Order QTY</th>
                        <th>Price</th>
                        <th>Payment Id</th>
                        <th>Payment Status</th>
                        <th>Payment Request Id</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <div wire:loading wire:target="editusers" class="w-100">
                    <div class="alert alert-warning w-100 text-center">
                        Updating Order Record...🙂<div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <tbody>
                    @foreach ($pros as $pro )
                    @php
                        $users = Orderdetail::where('product_id' , $pro->product_id)->get() 
                    @endphp    
                    {{-- {{ dd($users) }} --}}
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->order_id }}</td>
                        <td>{{ $pro->product_name }}</td>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->product_id }}</td>
                            <td>{{ $user->orderqty }}</td>
                            <td>{{ $user->price }}</td>
                            <td>{{ $user->payment_id }}</td>
                            <td>{{ $user->payment_status }}</td>
                            <td>{{ $user->payment_request_id }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                {{-- edit --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalupdate{{ $user->order_id }}"
                                    wire:click="edit({{ $user->order_id }})">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="exampleModalupdate{{ $user->order_id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="mt-5 p-3 bg-light" enctype="multipart/form-data"
                                                    wire:submit.prevent="edituser({{ $user->order_id }})">
                                                    @csrf
                                                    <h3 class="mb-5">Update Order</h3>
                                                   <div class="mb-3">
                                                    <label for="status">Order Staus</label>
                                                    
                                                    <select name="status" wire:model="status" id="status" class="form-select">
                                                    @if ($user->status == "ordered")
                                                        <option value="ordered">ORDERED</option>
                                                        <option value="dispatched">DISPATCHED</option>
                                                        <option value="in_transit">IN TRANSIT</option>
                                                        <option value="delivered">DELIVERED</option>
                                                        @elseif ($user->status == "dispatched")
                                                        <option value="dispatched">DISPATCHED</option>
                                                        <option value="in_transit">IN TRANSIT</option>
                                                        <option value="delivered">DELIVERED</option>
                                                        @elseif ($user->status == "in_transit")
                                                        <option value="in_transit">IN TRANSIT</option>
                                                        <option value="delivered">DELIVERED</option>
                                                        @else
                                                        <option value="delivered">DELIVERED</option>
                                                        @endif
                                                    </select>
                                                    
                                                   </div>
                                                        <div class="mb-2">
                                                            <button data-bs-dismiss="modal" type="submit" wire:click="editusers"
                                                                class="btn btn-warning rounded-pill w-100">UPDATE ORDER</button>
                                                        </div>
                                                            {{-- {{ dd($user) }} --}}               
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end edit --}}
                            
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


