<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-mesin_mobil-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('mesin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 up-icon">
                    {{-- Mesin --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Mesin mobil</label>
                        <input class="form-control  @error('nama_mesin') is-invalid @enderror" name="nama_mesin" value="{{ old('nama_mesin') }}"  type="text" placeholder="Masukan mesin mobil..." >
                        @error('nama_mesin')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Logo --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Logo mesin mobil</label><br>
                        <img  class="img-logo img-fluid my-2">
                        <input class="form-control  @error('logo') is-invalid @enderror" name="logo"  id="logo" value="{{ old('logo') }}" type="file" onchange="previewLogo()" >
                        <label for=""></label>
                        @error('logo')
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
