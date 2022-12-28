<div class="row">
    <div class="col-lg-4 ml-auto mr-auto">
        <div class="card card-register" style="background-color: transparent">
            <h3 class="title mx-auto">Welcome</h3>
            <form action="{{ route('register') }}" class="register-form"  method="POST" >
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
                <div class="mb-3">
                    {{-- Username --}}
                    <label style="color: white"> Username</label>
                    <div class="form-group @error('username') has-danger @enderror">
                        <input type="text" class="form-control form-control-danger"  value="{{ old('username') }}"id="inputDanger1" @error('username') placeholder="Error" @enderror  placeholder="Masukan username" name="username">
                        @error('username')
                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    {{-- Password --}}
                    <label style="color: white"> Password</label>
                    <div class="form-group @error('password') has-danger @enderror">
                        <input type="password" class="form-control form-control-danger"  value="{{ old('password') }}"id="inputDanger1" @error('password') placeholder="Error" @enderror  placeholder="Masukan password" name="password">
                        @error('password')
                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    {{-- Confirm Password --}}
                    <label style="color: white">Confirm Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-danger"  id="inputDanger1" placeholder="Masukan confirm password" name="password_confirmation">
                    </div>
                </div>
                <button  type="submit" class="btn btn-danger btn-block btn-round my-4">Register</button>
            </form>
        </div>
    </div>
</div>

