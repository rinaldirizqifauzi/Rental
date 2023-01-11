<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-type_mobil-4')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('tipe.update', $tipe) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3 up-icon">
                    {{-- Tipe --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tipe mobil</label>
                        <input class="form-control @error('nama_tipe') is-invalid @enderror" name="nama_tipe" value="{{ old('nama_tipe', $tipe->nama_tipe) }}" type="text" placeholder="Masukan tipe mobil..." readonly>
                        @error('nama_tipe')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Gambar --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar</label>
                        <div class="form-group">
                            <img src="{{ asset('gambar') }}/{{ $tipe->gambar }}" alt="Image placeholder" class="img-preview card-img-top" >
                            <label for="">{{ $tipe->gambar }}</label>
                            <input type="file"  class="@error('gambar') is-invalid @enderror" id="gambar" name="gambar"   onchange="previewImage()">
                            @error('gambar')
                                    <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- Gambar1 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar 1</label>
                        <div class="form-group">
                            @if ($tipe->gambar1 == null)
                                <img  class="img-preview1 card-img-top my-2">
                            @else
                                <img src="{{ asset('gambar1') }}/{{ $tipe->gambar1 }}" alt="Image placeholder" class="img-preview1 card-img-top" >
                            @endif
                            <label for="">{{ $tipe->gambar1 }}</label>
                            <input type="file"  class="@error('gambar1') is-invalid @enderror" id="gambar1" name="gambar1"   onchange="previewImage1()">
                            @error('gambar1')
                                    <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- Gambar2 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar 2</label>
                        <div class="form-group">
                            @if ($tipe->gambar2 == null)
                                <img  class="img-preview2 card-img-top my-2">
                            @else
                                <img src="{{ asset('gambar2') }}/{{ $tipe->gambar2 }}" alt="Image placeholder" class="img-preview2 card-img-top" >
                            @endif
                            <label for="">{{ $tipe->gambar2 }}</label>
                            <input type="file"  class="@error('gambar2') is-invalid @enderror" id="gambar2" name="gambar2"   onchange="previewImage2()">
                            @error('gambar2')
                                    <label style="color: red">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                    {{-- Gambar3 --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Gambar 3</label>
                        <div class="form-group">
                            @if ($tipe->gambar3 == null)
                                <img  class="img-preview3 card-img-top my-2">
                            @else
                                <img src="{{ asset('gambar3') }}/{{ $tipe->gambar3 }}" alt="Image placeholder" class="img-preview3 card-img-top" >
                            @endif
                            <label for="">{{ $tipe->gambar3 }}</label>
                            <input type="file"  class="@error('gambar3') is-invalid @enderror" id="gambar3" name="gambar3"   onchange="previewImage3()">
                            @error('gambar3')
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
            <a class="btn  btn-sm btn-secondary" href="{{ route('tipe.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>
