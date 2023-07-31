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
    <a style="border-radius: 13px" class="col-md-3 col-sm-6  p-5 bg-primary text-decoration-none hovershadow" href="{{ url('alluser') }}" style="text-decoration:none">
    <div >
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div>
                    <h1 class="fw-bold  text-white">{{ User::all()->count() }} <i class="fas fa-users fa-lg"></i></h1>
                </div>
                <div style="font-size: 12px" class="text-white fw-bold">
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


{{--  --}}



    <nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky top-0" style="z-index: 998" data-bs-theme="dark">
        {{-- navbar end --}}






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
                <a class="nav-link active" aria-current="page" href="{{ url('/alluser') }}">All Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/allproduct') }}">All Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/allorder') }}">All Orders</a>
              </li>
            </ul>
            <div class="form">
                <a wire:click="logoutUser" class="text-primary  text-decoration-none fw-bold" style="cursor: pointer">LogOut</a>
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
              <a class="nav-link text-white p-2" aria-current="page" href="{{ url('adminpanel') }}">Admin Panel</a>
              <a class="nav-link text-white p-2 active" href="{{ url('alluser') }}">All Users</a>
              <a class="nav-link text-white p-2" href="{{ url('allproduct') }}">All Products</a>
              <a class="nav-link text-white p-2" href="{{ url('allorder') }}">All Orders</a>
            </nav>
          </div>
      </div>



    <div class="bg-light mt-5 container-fluid">
        <div class="header d-flex justify-content-between border p-2">
            <h2 class="text-primary">All Users</h2>
            {{-- <div class="search d-flex flex-row align-items-center"> --}}
                {{-- <span class="fw-bold">Search</span> --}}
                <input type="search" placeholder="Search By Name" class="form-control w-75 ms-1" wire:model="search">
            {{-- </div> --}}
        </div>

        <div wire:loading wire:target="search">
            Searching Users...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading wire:target="edit">
            Searching User To Edit...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading wire:target="delete" class="w-100">
            <div class="alert alert-danger w-100 text-center">
                Deleting User...😥<div class="spinner-border" role="status">
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
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Mobile No</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Account Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <div wire:loading wire:target="editusers" class="w-100">
                    <div class="alert alert-warning w-100 text-center">
                        Updating User Record...🙂<div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->mobile_no }}</td>
                            <td>{{ $user->state }}</td>
                            <td>{{ $user->district }}</td>
                            <td>{{ $user->actype }}</td>
                            <td>


                                {{-- edit --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalupdate{{ $user->id }}"
                                    wire:click="edit({{ $user->id }})">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade" id="exampleModalupdate{{ $user->id }}"
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
                                                    wire:submit.prevent="edituser({{ $user->id }})">
                                                    @csrf
                                                    <h3 class="mb-5">Update User</h3>
                                                    <div class="mb-3">
                                                        <div class="mb-2">
                                                            <input value="{{ $user->name }}" wire:model="name"
                                                                type="text" class="form-control" placeholder="Name">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $user->email }}" wire:model="email"
                                                                type="email" min="0" class="form-control"
                                                                placeholder="Email" name="email">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $user->dob }}" wire:model="dob"
                                                                type="date" min="0" class="form-control"
                                                                placeholder="DOB" name="dob">
                                                            @error('dob')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $user->mobile_no }}" wire:model="mobile_no"
                                                                type="number"  class="form-control"
                                                                placeholder="Mobile No" name="mobile_no">
                                                            @error('mobile_no')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <button data-bs-dismiss="modal" type="submit" wire:click="editusers"
                                                                class="btn btn-warning rounded-pill w-100">UPDATE USER</button>
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
                                {{-- end edit --}}

                                {{-- delete starts from here --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModaldelete{{ $user->id }}">
                                    DELETE
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade"
                                    id="exampleModaldelete{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-danger fw-bold h3">
                                                    DO YOU WANT TO DELETE THIS RECORD🤯🤯
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" wire:click="delete({{ $user->id }})"
                                                    class="btn btn-danger" data-bs-dismiss="modal">DONE</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


