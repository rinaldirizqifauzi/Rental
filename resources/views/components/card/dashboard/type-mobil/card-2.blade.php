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

