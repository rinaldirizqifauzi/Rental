<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-user-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('admin.store') }}" class="register-form"  method="POST" >
                @csrf
                <div class="mb-3">
                    {{-- Level --}}
                    <div class="form-group">
                    <input type="hidden" class="form-control form-control-danger"  value="admin" id="inputDanger1" name="level">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {{-- Email --}}
                            <label style="color: black"> Email</label>
                            <div class="form-group @error('email') has-danger @enderror">
                                <input type="email" class="form-control form-control-danger"  value="{{ old('email') }}"id="inputDanger1" @error('email') placeholder="Error" @enderror  placeholder="Masukan email" name="email">
                                @error('email')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Username --}}
                            <label style="color: black"> Username</label>
                            <div class="form-group @error('username') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('username') }}"id="inputDanger1" @error('username') placeholder="Error" @enderror  placeholder="Masukan username" name="username">
                                @error('username')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="mb-3">
                            {{-- Password --}}
                            <label style="color: black"> Password</label>
                            <div class="form-group @error('password') has-danger @enderror">
                                <input type="password" class="form-control form-control-danger"  value="{{ old('password') }}"id="inputDanger1" @error('password') placeholder="Error" @enderror  placeholder="Masukan password" name="password">
                                @error('password')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Confirm Password --}}
                            <label style="color: black">Confirm Password</label>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-danger"  id="inputDanger1" placeholder="Masukan confirm password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="text-end me-3">
            <button type="submit" class="btn btn-sm btn-primary">
                Simpan
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('user.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>
