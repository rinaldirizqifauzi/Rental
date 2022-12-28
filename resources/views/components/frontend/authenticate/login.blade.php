<div class="row">
    <div class="col-lg-4 ml-auto mr-auto">
        <div class="card card-register" style="background-color: transparent">
            <h3 class="title mx-auto">Welcome</h3>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('LoginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginError') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    {{-- Email --}}
                    <label style="color: white"> Email</label>
                    <div class="form-group @error('email') has-danger @enderror">
                        <input type="email" class="form-control form-control-danger"  value="{{ old('email') }}"id="inputDanger1" @error('email') placeholder="Error" @enderror  placeholder="Masukan email" name="email">
                        @error('email')
                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                {{-- Password --}}
                <label style="color: white"> Password</label>
                <div class="form-group @error('password') has-danger @enderror">
                    <input type="password" class="form-control form-control-danger"  value="{{ old('password') }}"id="inputDanger1" @error('password') placeholder="Error" @enderror  placeholder="Masukan password" name="password">
                    @error('password')
                        <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
