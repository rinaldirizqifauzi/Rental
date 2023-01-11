<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-profil-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('admin.store_profil') }}" class="register-form"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    {{-- Status User --}}
                    <div class="form-group">
                    <input type="hidden" class="form-control form-control-danger"  value="active" id="inputDanger1" name="status_user">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            {{-- Nama --}}
                            <label style="color: black"> Nama</label>
                            <div class="form-group @error('nama') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('nama') }}"id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
                                @error('nama')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Tempat Lahir --}}
                            <label style="color: black"> Tempat Lahir</label>
                            <div class="form-group @error('tpt_lhr') has-danger @enderror">
                                <input type="text" class="form-control form-control-danger"  value="{{ old('tpt_lhr') }}"id="inputDanger1" @error('tpt_lhr') placeholder="Error" @enderror  placeholder="Masukan tempat lahir" name="tpt_lhr">
                                @error('tpt_lhr')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Foto --}}
                            <label style="color:black">Foto</label>
                            <center><img class="img-foto img-fluid" height="129" width="100"></center>
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
                                <input type="text" class="form-control form-control-danger"  value="{{ old('alamat') }}"id="inputDanger1" @error('alamat') placeholder="Error" @enderror  placeholder="Masukan alamat" name="alamat">
                                @error('alamat')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- Tanggal Lahir --}}
                            <label style="color: black"> Tanggal Lahir</label>
                            <div class="form-group @error('tgl_lhr') has-danger @enderror">
                                <input type="date" class="form-control form-control-danger"  value="{{ old('tgl_lhr') }}"id="inputDanger1" @error('tgl_lhr') placeholder="Error" @enderror  name="tgl_lhr">
                                @error('tgl_lhr')
                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            {{-- background --}}
                            <label style="color:black">Background</label>
                            <center><img class="img-background img-fluid" height="129" width="100"></center>
                            <input type="file" class="form-control form-control-danger" id="background" name="background" onchange="previewImageBackground()">
                            @error('background')
                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
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
