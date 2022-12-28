<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-rental-2')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <form action="{{ route('rental.update', $rental) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row mb-3 up-icon">
                    {{-- Kode Mobil --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Kode mobil</label>
                        <input type="text" id="kode_mobil" name="kode_mobil" class="form-control @error('kode_mobil') is-invalid @enderror" value="{{ old('kode_mobil', $rental->kode_mobil) }}" placeholder="Masukan Kode mobil">
                        @error('kode_mobil')
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
                                <input type="text" name="no_polisi_1" class="form-control @error('no_polisi_1') is-invalid @enderror" value="{{ old('no_polisi_1', $rental->no_polisi_1) }}">
                                @error('no_polisi_1')
                                    <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <input type="number" name="no_polisi_2" class="form-control @error('no_polisi_2') is-invalid @enderror" value="{{ old('no_polisi_2',  $rental->no_polisi_2) }}">
                                @error('no_polisi_2')
                                <span style="color: red">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="no_polisi_3" class="form-control @error('no_polisi_3') is-invalid @enderror" value="{{ old('no_polisi_3',  $rental->no_polisi_3) }}">
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
                        <input type="text" name="bb" class="form-control @error('bb') is-invalid @enderror" value="{{ old('bb', $rental->bb) }}" placeholder="Masukan tipe bensin">
                        @error('bb')
                            <span style="color: red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Kode Mobil --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Harga rental</label>
                        <input type="number" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $rental->harga) }}" placeholder="Masukan harga rental">
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
                                'kelengkapanChecked' => $rental->kelengkapan->pluck('id')->toArray(),
                            ])
                            <!-- List category -->
                    </div>
                    {{-- Status --}}
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            @foreach ($statuses as $key => $value)
                                <option value="{{ $key }}" {{ old('status', $rental->status) == $key ? "selected" : null }} >
                                    {{ $value }}
                                </option>
                            @endforeach
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
            <button type="submit" class="btn btn-sm btn-warning">
                Update
            </button>
            <a class="btn  btn-sm btn-secondary" href="{{ route('dashboard.index') }}">
                Kembali
            </a>
        </div>
    </form>
</div>

