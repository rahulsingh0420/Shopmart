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
            <a style="border-radius: 13px" class="col-md-3 col-sm-6  p-5  text-decoration-none hovershadow"
                href="{{ url('alluser') }}" style="text-decoration:none">
                <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ User::all()->count() }} <i class="fad ms-2 fa-users fa-lg"
                                    style="--fa-secondary-color: #0968f7;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                            Registered Users On ShopMart
                        </div>
                    </div>
                </div>
            </a>

            <a style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none bg-primary hovershadow"
                href="{{ url('allproduct') }}" style="text-decoration:none">
                <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-white">{{ Product::all()->count() }} <i
                                    class="fad fa-box-check fa-sm" style="--fa-secondary-color: #0d63f2;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-white  fw-bold">
                            Registered Products On ShopMart
                        </div>
                    </div>
                </div>
            </a>
            <a style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none  hovershadow"
                href="{{ url('allorder') }}" style="text-decoration:none">
                <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-primary">{{ Orderdetail::all()->count() }} <i
                                    class="fad fa-hand-holding-box fa-sm" style="--fa-secondary-color: #0e69f1;"></i>
                            </h1>
                        </div>
                        <div style="font-size: 12px" class="text-secondary fw-bold">
                            Order's Completed On ShopMart
                        </div>
                    </div>
                </div>
            </a>
            <a style="border-radius: 13px" class="col-md-3 col-sm-6 p-5 text-decoration-none  bg-primary hovershadow"
                href="{{ url('allproduct') }}" style="text-decoration:none">
                <div>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <h1 class="fw-bold text-white">{{ Category::all()->count() }} <i class="fad fa-boxes fa-sm"
                                    style="--fa-secondary-color: #0a92f5;"></i></h1>
                        </div>
                        <div style="font-size: 12px" class="text-white fw-bold">
                            Diffrent Categories On ShopMart
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{--  --}}





    <nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky top-0" style="z-index: 998"
        data-bs-theme="dark">
        <div class="container-fluid">
            <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions"><i class="fad fa-angle-double-right fa-lg"
                    style="--fa-secondary-color: #0060ff;"></i></button>
            <a class="navbar-brand" href="{{ url('/') }}">ShopMart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link active" href="{{ url('/allproduct') }}">All Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/allorder') }}">All Orders</a>
                    </li>
                </ul>
                <div class="form">
                    <a wire:click="logoutUser" class="text-primary text-decoration-none fw-bold"
                        style="cursor: pointer">LogOut</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-primary" id="offcanvasWithBothOptionsLabel">ShopMart Admin Panel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-dark">
            <nav class="nav-pills nav-tabs nav-fills flex-column">
                <a class="nav-link text-white p-2" aria-current="page" href="{{ url('adminpanel') }}">Admin Panel</a>
                <a class="nav-link text-white p-2" href="{{ url('alluser') }}">All Users</a>
                <a class="nav-link text-white p-2 active" href="{{ url('allproduct') }}">All Products</a>
                <a class="nav-link text-white p-2" href="{{ url('allorder') }}">All Orders</a>
            </nav>
        </div>
    </div>


    <div class="container">
        <h1 class="fw-bold text-center text-primary mt-2 ">Products And Categories</h1>
    </div>
    <div class="bg-light mt-5 container-fluid">
        <div class="header d-flex justify-content-between border p-2">
            <h2 class="text-primary">All Categories</h2>
            <div class="form">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCat" wire:click="addcat">
                    Add Category
                </button>
                <div wire:loading wire:target="addcat">
                    Opning Form...😇<div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="exampleModalCat" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="mt-5 p-3 bg-light" wire:submit.prevent="addcategory">
                                    <h3>Add New Category</h3>
                                    <div wire:loading wire:target="addcategory" class="text-success mb-2">
                                        Adding Category...😇<div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    @if (session('catadded'))
                                        <div class="alert alert-success">{{ session('catadded') }}🎉🎉😍</div>
                                    @endif
                                    @csrf
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <input wire:model="category_name" type="text" class="form-control"
                                                placeholder="Category Name">
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit"
                                                class="btn btn-success rounded-pill w-100">Add</button>
                                        </div>

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
            </div>
        </div>

        @if (session()->has('deleted'))
            <div class="alert alert-danger text-center">{{ session('deleted') }}😥</div>
        @endif

        @if (session()->has('catupdated'))
            <div class="alert alert-warning text-center">{{ session('catupdated') }}🎉🎉😍</div>
        @endif

        <div wire:loading wire:target="editcategory" class="w-100">
            <div class="alert alert-warning w-100 text-center">
                Updating Category Record...🙂<div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div wire:loading wire:target="deletecat" class="w-100">
            <div class="alert alert-danger w-100 text-center">
                Deleting Category Record...😥<div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div wire:loading wire:target="editcat">
            Searching Category Record To Edit...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach (Category::all() as $cat)
                            <tr>
                                <td>{{ $cat->category_id }}</td>
                                <td>{{ $cat->category_name }}</td>
                                <td>
                                    {{-- edit --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalupdatecat{{ $cat->category_id }}"
                                        wire:click="editcat({{ $cat->category_id }})">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade"
                                        id="exampleModalupdatecat{{ $cat->category_id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="mt-5 p-3 bg-light"
                                                        wire:submit.prevent="editcategory({{ $cat->category_id }})">
                                                        @csrf
                                                        <h3 class="mb-5">Update Category</h3>
                                                        <div class="mb-3">
                                                            <div class="mb-2">
                                                                <input value="{{ $cat->category_name }}"
                                                                    wire:model="category_name" type="text"
                                                                    class="form-control" placeholder="Category Name">
                                                                @error('category_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-2">
                                                                <button data-bs-dismiss="modal" type="submit"
                                                                    class="btn btn-warning rounded-pill w-100">UPDATE</button>
                                                            </div>

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
                                        data-bs-target="#exampleModaldeletecat{{ $cat->category_id }}">
                                        DELETE
                                    </button>

                                    <!-- Modal -->
                                    <div wire:ignore.self class="modal fade"
                                        id="exampleModaldeletecat{{ $cat->category_id }}" tabindex="-1"
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
                                                    <button type="button"
                                                        wire:click="deletecat({{ $cat->category_id }})"
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






















    {{-- category end --}}
    <div class="bg-light mt-5 container-fluid">
        <div class="header d-flex justify-content-between border p-2">
            <h2 class="text-primary">All Products</h2>
            {{-- <div class="search d-flex flex-row align-items-center"> --}}
            {{-- <span class="fw-bold">Search</span> --}}
            <input type="search" placeholder="Search By Product Name" class="form-control w-75 ms-1"
                wire:model="search">
            {{-- </div> --}}
            <div class="form">
                <!-- Button trigger modal -->
                <div class="btn d-flex justify-content-center align-content-center">
                <button type="button" class="btn btn-primary py-0" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" wire:click="add">
                    <div wire:loading.remove wire:target="add">Add Product</div>
                    <div wire:loading wire:target="add">
                        Opning Form...😇
                    </div>
                </button>
                <div wire:loading wire:target="add">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>


                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="mt-5 p-3 bg-light" enctype="multipart/form-data"
                                    wire:submit.prevent="addproduct">
                                    <h3>Add New Product</h3>
                                    <div wire:loading wire:target="addproduct" class="text-success mb-2">
                                        Adding Product...😇<div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    @if (session('imguploaded'))
                                        <div class="alert alert-success">{{ session('imguploaded') }}🎉🎉😍</div>
                                    @endif
                                    @if (session('proadded'))
                                        <div class="alert alert-success">{{ session('proadded') }}🎉🎉😍</div>
                                    @endif
                                    @csrf
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <input wire:model="product_name" type="text" class="form-control"
                                                placeholder="Product Name">
                                            @error('product_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <input wire:model="price" type="number" class="form-control"
                                                placeholder="Price" min="0" name="price">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <input wire:model="sale_price" type="number" class="form-control"
                                                placeholder="Sale Price" min="0" name="sale_price">
                                            @error('sale_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <input wire:model="qty" type="number" class="form-control"
                                                placeholder="QTY" min="0" name="qty">
                                            @error('qty')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="product_category" class="form-label">Product Category</label>
                                            <select class="form-select" name="product_category" id="product_category"
                                                wire:model="product_category">
                                                <option value="" hidden selected>Select-Category</option>
                                                <optgroup label="Select-Category">
                                                    @foreach (Category::all() as $cat)
                                                        <option value="{{ $cat->category_id }}">
                                                            {{ $cat->category_name }}({{ $cat->category_id }})
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                            @error('product_category')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label for="product_img" class="form-label">Product Image</label>
                                            <input wire:model="product_img" type="file" name="product_img"
                                                class="form-control" id="product_img">
                                            <div wire:loading wire:target="product_img" class="text-warning fw-bold">
                                                Loading Image Preview...🙂<div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            @if ($product_img)
                                                <img class="w-100" style="height: 150px; object-fit:contain"
                                                    src="{{ $product_img->temporaryUrl() }}" alt="">
                                            @endif
                                            @error('product_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <input wire:model="discription" type="text" class="form-control"
                                                placeholder="Discription" maxlength="130" name="discription">
                                            @error('discription')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit"
                                                class="btn btn-success rounded-pill w-100">Add</button>
                                        </div>

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
            </div>
        </div>
        <div wire:loading wire:target="search">
            Searching Products...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div wire:loading wire:target="edit">
            Searching Product To Edit...🙂<div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <div wire:loading wire:target="delete" class="w-100">
            <div class="alert alert-danger w-100 text-center">
                Deleting Product...😥<div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        @if (session('proupdated'))
            <div class="w-100 text-center alert alert-warning">{{ session('proupdated') }}😇</div>
        @endif
        @if (session('prodeleted'))
            <div class="w-100 text-center alert alert-danger">{{ session('prodeleted') }}😥</div>
            <div class="row">
        @endif
        <div class="col-sm-12">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>Category Id</th>
                        <th>Qty</th>
                        <th>Discription</th>
                        <th>Product Img</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <div wire:loading wire:target="editproduct" class="w-100">
                    <div class="alert alert-warning w-100 text-center">
                        Updating Product Record...🙂<div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <tbody>

                    @foreach ($products as $pro)
                        <div wire:loading wire:target="adddetail({{ $pro->product_id }})">
                            Searching Product To Add Detail...🙂<div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <tr>
                            <td>{{ $pro->product_id }}</td>
                            <td>{{ $pro->product_name }}</td>
                            <td>{{ $pro->price }}</td>
                            <td>{{ $pro->sale_price }}</td>
                            <td>{{ $pro->category }}</td>
                            <td>{{ $pro->qty }}</td>
                            <td>{{ $pro->discription }}</td>
                            <td><img src="{{ asset('storage/product_images/' . $pro->product_img) }}" width="50px"
                                    height="50px" style="object-fit: contain" alt="">
                            </td>
                            <td>


                                {{-- edit --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalupdate{{ $pro->product_id }}"
                                    wire:click="edit({{ $pro->product_id }})">
                                    Edit
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade"
                                    id="exampleModalupdate{{ $pro->product_id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="mt-5 p-3 bg-light" enctype="multipart/form-data"
                                                    wire:submit.prevent="editproduct({{ $pro->product_id }})">
                                                    @csrf
                                                    <h3 class="mb-5">Update Product</h3>
                                                    <div class="mb-3">
                                                        <div class="mb-2">
                                                            <input value="{{ $pro->product_name }}"
                                                                wire:model="product_name" type="text"
                                                                class="form-control" placeholder="Product Name">
                                                            @error('product_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $pro->price }}" wire:model="price"
                                                                type="number" min="0" class="form-control"
                                                                placeholder="Price" name="price">
                                                            @error('price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="product_category" class="form-label">Product
                                                                Category</label>
                                                            <select class="form-select" name="product_category"
                                                                id="product_category" wire:model="product_category">
                                                                <option value="" hidden selected>Select-Category
                                                                </option>
                                                                <optgroup label="Select-Category">
                                                                    @foreach (Category::all() as $cat)
                                                                        <option
                                                                            @if ($pro->category == $cat->category_id) selected @endif
                                                                            value="{{ $cat->category_id }}">
                                                                            {{ $cat->category_name }}({{ $cat->category_id }})
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error('product_category')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $pro->sale_price }}"
                                                                wire:model="sale_price" type="number" min="0"
                                                                class="form-control" placeholder="Sale Price"
                                                                name="sale_price">
                                                            @error('sale_price')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <input value="{{ $pro->qty }}" wire:model="qty"
                                                                type="number" min="0" class="form-control"
                                                                placeholder="QTY" name="qty">
                                                            @error('qty')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="product_img_updated"
                                                                class="form-label">Product Image</label>
                                                            <input wire:model="product_img_updated" type="file"
                                                                name="product_img_updated" class="form-control"
                                                                id="product_img_updated">

                                                            @error('product_img_updated')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        @if ($product_img_updated)
                                                            <div>
                                                                <img class="w-100"
                                                                    style="height: 150px; object-fit:contain"
                                                                    src="{{ $product_img_updated->temporaryUrl() }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                        <div class="mb-2">
                                                            <input maxlength="130" wire:model="discription"
                                                                value="{{ $pro->discription }}" type="text"
                                                                class="form-control" placeholder="Discription"
                                                                name="discription">
                                                            @error('discription')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-2">
                                                            <button data-bs-dismiss="modal" type="submit"
                                                                class="btn btn-warning rounded-pill w-100">UPDATE</button>
                                                        </div>

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
                                    data-bs-target="#exampleModaldelete{{ $pro->product_id }}">
                                    DELETE
                                </button>

                                <!-- Modal -->
                                <div wire:ignore.self class="modal fade"
                                    id="exampleModaldelete{{ $pro->product_id }}" tabindex="-1"
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
                                                <button type="button" wire:click="delete({{ $pro->product_id }})"
                                                    class="btn btn-danger" data-bs-dismiss="modal">DONE</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- delete ednds here --}}
                                @php
                                    $cat = Category::where('category_id', $pro->category)->first();
                                @endphp
                                {{-- add details starts from here --}}
                                <button type="button"
                                    wire:click="adddetail{{ $cat->category_id }}({{ $pro->product_id }})"
                                    class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModaldetail{{ $pro->product_id }}">Add details</button>

                                {{-- modal --}}
                                <div wire:ignore.self class="modal fade"
                                    id="exampleModaldetail{{ $pro->product_id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">ShopMart</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            @if ($cat->category_name == 'Mobile')
                                                <div class="modal-body">
                                                    @if (session('detailadded'))
                                                        <div class="alert alert-success text-center">
                                                            {{ session('detailadded') }}</div>
                                                    @endif
                                                    <div class="form">
                                                        {{-- form for mobile detail start --}}
                                                        <form
                                                            wire:submit.prevent="detailmobile({{ $pro->product_id }})">

                                                            <div class="mb-3 d-flex flex-row">
                                                                <input wire:model="display" type="text"
                                                                    class="form-control" placeholder="Display">
                                                                <input type="text" class="form-control"
                                                                    wire:model="in_the_box" placeholder="In The Box">
                                                            </div>
                                                            <div class="mb-3 d-flex flex-row">
                                                                <select wire:model="ram" name="ram"
                                                                    class="form-select" id="ram">
                                                                    <option value="" hidden selected> RAM
                                                                    </option>
                                                                    <option value="1GB">1GB</option>
                                                                    <option value="2GB">2GB</option>
                                                                    <option value="4GB">4GB</option>
                                                                    <option value="6GB">6GB</option>
                                                                    <option value="8GB">8GB</option>
                                                                    <option value="12GB">12GB</option>
                                                                    <option value="16GB">16GB</option>
                                                                </select>

                                                                <select name="storage" class="form-select"
                                                                    wire:model="storage" id="storage">
                                                                    <option value="" hidden selected> STORAGE
                                                                    </option>
                                                                    <option value="16GB">16GB</option>
                                                                    <option value="32GB">32GB</option>
                                                                    <option value="64GB">64GB</option>
                                                                    <option value="128GB">128GB</option>
                                                                    <option value="256GB">256GB</option>
                                                                    <option value="512GB">512GB</option>
                                                                    <option value="1TB">1TB</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 d-flex flex-row">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Chipset" wire:model="chipset">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Primary Camera"
                                                                    wire:model="primary_camera">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control"
                                                                    name="selfie_camera" wire:model="selfie_camera"
                                                                    placeholder="Selfie Camera">
                                                            </div>
                                                            <div class="mb-3 d-flex flex-row">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Battery" wire:model="battery">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Operating System"
                                                                    wire:model="operating_system">
                                                            </div>
                                                            <div class="mb-3">
                                                                <select name="warranty" wire:model="warranty"
                                                                    class="form-select" id="warranty">
                                                                    <option value="" selected hidden>
                                                                        WARRANTY
                                                                    </option>
                                                                    <option value="1">1 YEAR</option>
                                                                    <option value="2">2 YEAR</option>
                                                                    <option value="3">3 YEAR</option>
                                                                    <option value="4">4 YEAR</option>
                                                                    <option value="5">5 YEAR</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn w-100 rounded-pill btn-warning">ADD OR
                                                                UPDATE</button>
                                                        </form>
                                                    </div>
                                                @elseif ($cat->category_name == 'Laptop')
                                                    <div class="modal-body">
                                                        @if (session('detailadded'))
                                                            <div class="alert alert-success text-center">
                                                                {{ session('detailadded') }}</div>
                                                        @endif
                                                        <div class="form">
                                                            {{-- form for mobile detail start --}}
                                                            <form
                                                                wire:submit.prevent="detaillaptop({{ $pro->product_id }})">

                                                                <div class="mb-3">
                                                                    <input wire:model="display" type="text"
                                                                        class="form-control" placeholder="Display">
                                                                </div>
                                                                <div class="mb-3 d-flex flex-row">
                                                                    <select wire:model="ram" name="ram"
                                                                        class="form-select" id="ram">
                                                                        <option value="" hidden selected> RAM
                                                                        </option>
                                                                        <option value="1GB">1GB</option>
                                                                        <option value="2GB">2GB</option>
                                                                        <option value="4GB">4GB</option>
                                                                        <option value="6GB">6GB</option>
                                                                        <option value="8GB">8GB</option>
                                                                        <option value="12GB">12GB</option>
                                                                        <option value="16GB">16GB</option>
                                                                        <option value="32GB">32GB</option>
                                                                        <option value="64GB">64GB</option>
                                                                    </select>

                                                                    <select name="storage" class="form-select"
                                                                        wire:model="storage" id="storage">
                                                                        <option value="" hidden selected> STORAGE
                                                                        </option>
                                                                        <option value="16GB">16GB</option>
                                                                        <option value="32GB">32GB</option>
                                                                        <option value="64GB">64GB</option>
                                                                        <option value="128GB">128GB</option>
                                                                        <option value="256GB">256GB</option>
                                                                        <option value="512GB">512GB</option>
                                                                        <option value="1TB">1TB</option>
                                                                        <option value="2TB">2TB</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Chipset" wire:model="chipset">
                                                                </div>
                                                                <div class="mb-3 d-flex flex-row">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Battery" wire:model="battery">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Operating System"
                                                                        wire:model="operating_system">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <select name="warranty" wire:model="warranty"
                                                                        class="form-select" id="warranty">
                                                                        <option value="" selected hidden>
                                                                            WARRANTY
                                                                        </option>
                                                                        <option value="1">1 YEAR</option>
                                                                        <option value="2">2 YEAR</option>
                                                                        <option value="3">3 YEAR</option>
                                                                        <option value="4">4 YEAR</option>
                                                                        <option value="5">5 YEAR</option>
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn w-100 rounded-pill btn-warning">ADD OR
                                                                    UPDATE</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    {{-- details for laptop ends here --}}
                                                @elseif ($cat->category_name == 'Mobile Accessories')
                                                    <div class="modal-body">
                                                        @if (session('detailadded'))
                                                            <div class="alert alert-success text-center">
                                                                {{ session('detailadded') }}</div>
                                                        @endif
                                                        <div class="form">
                                                            <form
                                                                wire:submit.prevent="detailaccessories({{ $pro->product_id }})">

                                                                <div class="mb-3">
                                                                    <input wire:model="brand" type="text"
                                                                        class="form-control" placeholder="Brand">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Type" wire:model="type">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Compatible With"
                                                                        wire:model="compatible_with">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <select name="warranty" wire:model="warranty"
                                                                        class="form-select" id="warranty">
                                                                        <option value="" selected hidden>
                                                                            WARRANTY
                                                                        </option>
                                                                        <option value="1">1 YEAR</option>
                                                                        <option value="2">2 YEAR</option>
                                                                        <option value="3">3 YEAR</option>
                                                                        <option value="4">4 YEAR</option>
                                                                        <option value="5">5 YEAR</option>
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn w-100 rounded-pill btn-warning">ADD OR
                                                                    UPDATE</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                            @endif

                                            {{-- MobileAccessoriesdetail ends --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- add details ends here --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

{{ $products->links() }}
