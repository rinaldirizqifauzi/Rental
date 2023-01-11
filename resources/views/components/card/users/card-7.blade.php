<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-user-7')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('admin.update_profil', $user) }}" class="register-form"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                                <input type="text" class="form-control form-control-danger"  value="{{ old('email', $user->email) }}"id="inputDanger1" @error('email') placeholder="Error" @enderror  placeholder="Masukan email" name="email" readonly>
                                @error('email')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Nama --}}
                            <label style="color: black"> Nama</label>
                            <div class="form-group @error('nama') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('nama', $user->detailadmin->first()->nama) }}"id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
                                @error('nama')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Tempat Lahir --}}
                            <label style="color: black"> Tempat Lahir</label>
                            <div class="form-group @error('tpt_lhr') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('tpt_lhr', $user->detailadmin->first()->tpt_lhr) }}"id="inputDanger1" @error('tpt_lhr') placeholder="Error" @enderror  placeholder="Masukan tempat lahir" name="tpt_lhr">
                                @error('tpt_lhr')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Foto --}}
                            <label style="color:black">Foto</label><br>
                            <label style="color:black">{{ $user->detailadmin->first()->foto }}</label>
                            <center><img src=" {{ asset('foto_admin') }}/{{ $user->detailadmin->first()->foto }}" class="img-foto img-fluid my-2" height="129" width="100"></center>
                            <input type="file" class="form-control form-control-danger" id="foto" name="foto" onchange="previewImageFoto()">
                            @error('foto')
                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {{-- Alamat --}}
                            <label style="color: black"> Alamat</label>
                            <div class="form-group @error('alamat') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('alamat',  $user->detailadmin->first()->alamat) }}"id="inputDanger1" @error('alamat') placeholder="Error" @enderror  placeholder="Masukan alamat" name="alamat">
                                @error('alamat')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Username --}}
                            <label style="color: black"> Username</label>
                            <div class="form-group @error('username') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('username', $user->username) }}"id="inputDanger1" @error('username') placeholder="Error" @enderror  placeholder="Masukan username" name="username">
                                @error('username')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Tanggal Lahir --}}
                            <label style="color: black"> Tanggal Lahir</label>
                            <div class="form-group @error('tgl_lhr') has-danger @enderror">
                                <input type="date" class="form-control form-control-danger"  value="{{ old('tgl_lhr', $user->detailadmin->first()->tgl_lhr) }}"id="inputDanger1" @error('tgl_lhr') placeholder="Error" @enderror  name="tgl_lhr">
                                @error('tgl_lhr')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- background --}}
                            <label style="color:black">Background</label><br>
                            <label style="color:black">{{ $user->detailadmin->first()->background }}</label>
                            <center><img src=" {{ asset('background_admin') }}/{{ $user->detailadmin->first()->background }}" class="img-background img-fluid my-2" height="129" width="100"></center>
                            <input type="file" class="form-control form-control-danger" id="background" name="background" onchange="previewImageBackground()">
                            @error('background')
                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="text-end me-3">
            <button type="submit" class="btn btn-sm btn-warning">
                Update
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('admin.show_profil', Auth::user()->username) }}">
                Kembali
            </a>
        </div>
    </form>
</div>
