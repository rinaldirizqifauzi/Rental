<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-mobil-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('spesifikasi.store') }}" method="POST">
                @csrf
                <div class="row mb-3 up-icon">
                    {{-- Nama --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nama mobil</label>
                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" type="text" placeholder="Masukan nama mobil...">
                        @error('nama')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Bangku --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Bangku mobil</label>
                        <input class="form-control  @error('sheet') is-invalid @enderror" name="sheet"  value="{{ old('sheet') }}" type="number" placeholder="Masukan bangku mobil...">
                        @error('sheet')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Tahun --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tahun mobil</label>
                        <input class="form-control  @error('tahun') is-invalid @enderror" name="tahun"  value="{{ old('tahun') }}" type="text" placeholder="Masukan tahun mobil...">
                        @error('tahun')
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
