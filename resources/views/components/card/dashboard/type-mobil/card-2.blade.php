<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-type_mobil-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('tipe.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 up-icon">
                    {{-- Tipe --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tipe mobil</label>
                        <input class="form-control @error('kode_tipe') is-invalid @enderror" name="nama_tipe" value="{{ old('nama_tipe') }}" type="text" placeholder="Masukan tipe mobil...">
                        @error('nama_tipe')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Kode Tipe --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode tipe mobil</label>
                        <input class="form-control @error('kode_tipe') is-invalid @enderror" name="kode_tipe" value="{{ old('kode_tipe') }}" type="text" placeholder="Masukan kode tipe...">
                        @error('kode_tipe')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Gambar --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar mobil</label><br>
                        <img  class="img-preview my-2" height="120" width="270">
                        <input class="form-control  @error('gambar') is-invalid @enderror" name="gambar"  id="gambar" value="{{ old('gambar') }}" type="file" onchange="previewImage()" >
                        <label for=""></label>
                        @error('gambar')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Gambar 1 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar mobil 1</label><br>
                        <img  class="img-preview1 my-2" height="120" width="270">
                        <input class="form-control  @error('gambar1') is-invalid @enderror" name="gambar1"  id="gambar1" value="{{ old('gambar1') }}" type="file" onchange="previewImage1()" >
                        <label for=""></label>
                        @error('gambar1')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Gambar 2 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar mobil 2</label><br>
                        <img  class="img-preview2 my-2" height="120" width="270">
                        <input class="form-control  @error('gambar2') is-invalid @enderror" name="gambar2"  id="gambar2" value="{{ old('gambar2') }}" type="file" onchange="previewImage2()" >
                        <label for=""></label>
                        @error('gambar2')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Gambar 3 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar mobil 3</label><br>
                        <img  class="img-preview3 my-2" height="120" width="270">
                        <input class="form-control  @error('gambar3') is-invalid @enderror" name="gambar3"  id="gambar3" value="{{ old('gambar3') }}" type="file" onchange="previewImage3()" >
                        <label for=""></label>
                        @error('gambar3')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
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
            <a class="btn  btn-sm btn-secondary" href="{{ route('dashboard.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>

