<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-rental-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('rental.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 up-icon">
                    {{-- Kode Mobil --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode mobil</label>
                        <input type="text" id="kode_mobil" name="kode_mobil" class="form-control @error('kode_mobil') is-invalid @enderror" value="{{ old('kode_mobil') }}" placeholder="Masukan Kode mobil">
                        @error('kode_mobil')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Kode Spesifikasi --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode Spesifikasi</label>
                        <select class="form-control" id="spesifikasi" name="id_spesifikasi" data-placeholder="Pilih spesifikasi mobil">
                            @foreach ($spesifikasis as $spesifikasi)
                                {{-- Jika tidak ada pilihan --}}
                                @if (old('id_spesifikasi', $spesifikasi->kode) == $spesifikasi->id)
                                    <option  value="{{ $spesifikasi->id }}">
                                        {{  $spesifikasi->nama }}
                                    </option>
                                {{-- Jika ada pilihan --}}
                                @elseif(old('id_spesifikasi', $spesifikasi->kode) == $spesifikasi->id)
                                    <option  value="{{ $spesifikasi->id }}" selected="selected">
                                        {{  $spesifikasi->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_spesifikasi')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Tipe --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tipe mobil</label>
                        <select class="form-control" id="tipe" name="id_tipe" data-placeholder="Pilih tipe mobil">
                            @foreach ($tipes as $tipe)
                                {{-- Jika tidak ada pilihan --}}
                                @if (old('id_tipe', $tipe->nama_tipe) == $tipe->id)
                                    <option  value="{{ $tipe->id }}">
                                        {{  $tipe->nama_tipe }}
                                    </option>
                                {{-- Jika ada pilihan --}}
                                @elseif(old('id_tipe', $tipe->nama_tipe)==$tipe->id)
                                    <option  value="{{ $tipe->id }}" selected="selected">
                                        {{  $tipe->nama_tipe }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_tipe')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Mesin --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Mesin mobil</label>
                        <select class="form-control" id="mesin" name="id_mesin" data-placeholder="Pilih mesin mobil">
                            @foreach ($mesins as $mesin)
                                {{-- Jika tidak ada pilihan --}}
                                @if (old('id_mesin', $mesin->nama_mesin) == $mesin->id)
                                    <option  value="{{ $mesin->id }}">
                                        {{  $mesin->nama_mesin }}
                                    </option>
                                {{-- Jika ada pilihan --}}
                                @elseif(old('id_mesin', $mesin->nama_mesin) == $mesin->id)
                                    <option  value="{{ $mesin->id }}" selected="selected">
                                        {{  $mesin->nama_mesin }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_mesin')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Warna --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Warna</label>
                        <select class="form-control" id="warna" name="id_warna" data-placeholder="Pilih warna mobil">
                            @foreach ($warnas as $warna)
                                {{-- Jika tidak ada pilihan --}}
                                @if (old('id_warna', $warna->warna) == $warna->id)
                                    <option  value="{{ $warna->id }}">
                                        {{  $warna->warna }}
                                    </option>
                                {{-- Jika ada pilihan --}}
                                @elseif(old('id_warna', $warna->warna) == $warna->id)
                                    <option  value="{{ $warna->id }}" selected="selected">
                                        {{  $warna->warna }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_warna')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Nomor Polisi --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">No Polisi</label>
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="text" name="no_polisi_1" class="form-control @error('no_polisi_1') is-invalid @enderror" value="{{ old('no_polisi_1') }}">
                                @error('no_polisi_1')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <input type="number" name="no_polisi_2" class="form-control @error('no_polisi_2') is-invalid @enderror" value="{{ old('no_polisi_2') }}">
                                @error('no_polisi_2')
                                <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="no_polisi_3" class="form-control @error('no_polisi_3') is-invalid @enderror" value="{{ old('no_polisi_3') }}">
                                @error('no_polisi_3')
                                <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Tipe Bahan Bakar</label>
                        <input type="text" name="bb" class="form-control @error('bb') is-invalid @enderror" value="{{ old('bb') }}" placeholder="Masukan tipe bensin">
                        @error('bb')
                            <span style="color: red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Kode Mobil --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga rental</label>
                        <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Masukan harga rental">
                        @error('harga')
                            <span style="color: red">
                                    {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- Kelengkapan -->
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kelengkapan mobil</label>
                        <hr class="horizontal dark mt-0">
                            <!-- List category -->
                            @include('components.card.rental.list_kelengkapan',[
                                'kelengkapans' => $kelengkapans,
                                'kelengkapanChecked' => old('id_kelengkapan')
                            ])
                            <!-- List category -->
                    </div>
                    {{-- Status --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" style="text-align: center">{{ $value }}</option>
                            @endforeach
                            {{-- <option value="Tidak Tersedia" style="text-align: center"  {{ old('status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option> --}}
                        </select>
                        @error('status')
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

