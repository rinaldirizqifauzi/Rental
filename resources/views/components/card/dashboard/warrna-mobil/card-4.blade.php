<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-warna_mobil-4')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('warna.update', $warna) }}" method="POST">
                @csrf
                @method('put')
                <div class="row mb-3 up-icon">
                    {{-- Warna --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Warna mobil</label>
                        <input class="form-control  @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna',  $warna->warna) }}"  type="text" placeholder="Masukan warna mobil..." >
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
            <button type="submit" class="btn btn-sm btn-warning">
                Ubah
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('warna.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>
