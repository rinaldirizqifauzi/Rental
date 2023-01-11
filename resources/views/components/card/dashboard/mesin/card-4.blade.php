<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-mesin-4')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('mesin.update', $mesin) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3 up-icon">
                    {{-- Nama Mesin --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama mesin mobil</label>
                        <input class="form-control  @error('nama_mesin') is-invalid @enderror" name="nama_mesin" value="{{ old('nama_mesin',  $mesin->nama_mesin) }}"  type="text" placeholder="Masukan nama mesin mobil..." >
                        @error('nama_mesin')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Logo --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Logo mesin</label>
                        <div class="form-group">
                            <img src="{{ asset('logo') }}/{{ $mesin->logo }}" alt="Image placeholder" class="img-logo card-img-top" >
                            <label for="">{{ $mesin->logo }}</label>
                            <input type="file"  class="@error('logo') is-invalid @enderror" id="logo" name="logo"   onchange="previewLogo()">
                            @error('logo')
                                    <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="text-end me-3">
            <button type="submit" class="btn btn-sm btn-warning">
                Ubah
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('warna.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>
