<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-kelengkapan-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('kelengkapan.store') }}" method="POST">
                @csrf
                {{-- Kode --}}
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kode kelengkapan</label>
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ old('kode') }}" type="text" placeholder="Masukan kode kelengkapan...">
                    @error('kode')
                        <span style="color: red">
                                {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Nama --}}
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama kelengkapan</label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" type="text" placeholder="Masukan nama kelengkapan...">
                    @error('nama')
                        <span style="color: red">
                                {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Induk --}}
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Induk kelengkapan</label>
                    <select class="form-control" id="kelengkapan" name="parent_kelengkapan" data-placeholder="Pilih induk kelengkapan">

                    </select>
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
