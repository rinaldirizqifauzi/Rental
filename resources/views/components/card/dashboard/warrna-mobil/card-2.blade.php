<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-warna_mobil-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('warna.store') }}" method="POST">
                @csrf
                <div class="row mb-3 up-icon">
                    {{-- Warna --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Warna mobil</label>
                        <input class="form-control  @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}"  type="text" placeholder="Masukan warna mobil..." >
                        @error('warna')
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
