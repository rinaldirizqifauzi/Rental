<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-kelengkapan-4')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('kelengkapan.update', $kelengkapan) }}" method="POST">
                @csrf
                @method('put')
                {{-- Kode --}}
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kode kelengkapan</label>
                <input class="form-control " name="kode" value="{{ old('kode', $kelengkapan->kode) }}" type="text" readonly>
                </div>
                {{-- Nama --}}
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama kelengkapan</label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $kelengkapan->nama) }}" type="text" placeholder="Masukan nama kelengkapan...">
                    @error('nama')
                        <span style="color: red">
                                {{ $message }}
                        </span>
                    @enderror
                </div>
                {{-- Induk --}}
                @if($kelengkapan->parent_id == null)

                @else
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Induk kelengkapan</label>

                    <select class="form-control" id="kelengkapan" name="parent_kelengkapan" >
                        <label for="example-text-input" class="form-control-label">Induk kelengkapan</label>
                            <option value="{{ $kelengkapan->parent_id }}" style="text-align: center"  {{ old('parent_kelengkapan', $kelengkapan->parent) ==  $kelengkapan  ? 'selected' : '' }}>
                                {{ $kelengkapan->parent->nama }}
                            </option>
                    </select>
                    @endif
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="text-end me-3">
            <button type="submit" class="btn btn-sm btn-warning">
                Ubah
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('kelengkapan.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>
