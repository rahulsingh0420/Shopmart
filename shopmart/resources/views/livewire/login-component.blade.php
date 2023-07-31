<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="rounded col-sm-12 col-md-8 col-lg-10 shadow mb-3 p-4 d-flex flex-column" >
                <div class="heading mt-3">
                    <h2 class="text-primary text-center fw-bold">Login To ShopMart</h2>
                </div>
                <div class="form mt-3 d-flex flex-row justify-content-center align-items-center">
                    <div class="w-100">
                    <form wire:submit.prevent="login" class="w-100">
                        @if(session('notlogin'))
                            <div class="alert text-center alert-danger">{{ session('notlogin') }}</div>
                        @endif
                        @if(session('loggedout'))
                            <div class="alert text-center alert-danger">{{ session('loggedout') }}</div>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" placeholder="Email" wire:model="email" id="email"
                                class="form-control">
                                @error('email')
                                  <span class="text-danger">{{ $message }}</span>  
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" placeholder="Password" wire:model="password" id="password"
                                class="form-control">
                                @error('password')
                                  <span class="text-danger">{{ $message }}</span>  
                                @enderror
                        </div>

                        <div class="mb-3 d-flex flex-column">
                            <button class="btn btn-success rounded-pill"><div wire:loading.remove wire:target="login">Login</div><div wire:loading wire:target="login">Logging in...</div></button>
                            <a href="{{ url('register') }}">create new account</a>
                        </div>
                    </form>
                    </div>
                    {{-- form ends  --}}
                    <div class="logo d-none ms-3 d-lg-block">
                        <img src="{{ asset('storage/logo/logo.webp') }}" class="w-100 rounded-circle" alt="">
                    </div>
                    {{-- logo div ends  --}}
                </div>
                {{-- class form ends --}}
            </div>
        </div>
    </div>

</div>
