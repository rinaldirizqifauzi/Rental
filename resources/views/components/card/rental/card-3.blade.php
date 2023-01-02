<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-rental-3')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body  p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex px-2">
                        <div class="my-auto">
                             <img src="{{ asset('gambar') }}/{{ $rental->tipe->gambar }}" alt="Image placeholder" class="card-img-top" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <table>
                        <tr>
                            <td><strong><h5 class="text-detail">Nama Mobil</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->spesifikasi->nama }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Tipe Mobil</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->tipe->nama_tipe }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Tahun Mobil</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->spesifikasi->tahun }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Warna Mobil</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->warna->warna }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Mesin Mobil</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->mesin->nama_mesin }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Nomor Polisi</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->no_polisi_1 }} - {{ $rental->no_polisi_2 }} - {{ $rental->no_polisi_3 }}</h5></strong></td>
                        </tr>
                        <tr>
                            <td><strong><h5 class="text-detail">Jenis Bensin</h5></strong></td>
                            <td><strong><h5 class="text-detail">:</h5></strong></td>
                            <td><strong><h5 class="text-detail">{{ $rental->bb }}</h5></strong></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3">
                    <table>
                        <tr>
                            <!-- Kelengkapan -->
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Kelengkapan mobil</label>
                                <hr class="horizontal dark mt-0">
                                {{ $rental->kelengkapan->pluck(['nama'])->implode(',') }}
                                {{-- <!-- List category -->
                                @include('components.card.rental.detail_list_kelengkapan',[
                                        'kelengkapans' => $kelengkapans,
                                        'kelengkapanChecked' => $rental->kelengkapan->pluck('id')->toArray(),
                                    ])
                                    <!-- List category --> --}}
                            </div>
                        </tr>
                    </table>
                    <table>
                        <tr>
                           <strong> <h5 class="text-detail" style="text-align: center">Harga Sewa/Hari</h5></strong></td>
                            <td><strong><h5 class="text-detail " style="text-align: center; font-style: italic">{{ $rental->status }}</h5></strong></td>
                            <td><strong><h5 class="text-detail  mx-7" style="text-align: center; font-style: italic">Rp.{{ $rental->harga }}</h5></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr class="horizontal dark mt-0">
            <div class="text-end me-3">
                <a class="btn  btn-sm btn-warning" href="{{ route('rental.edit', $rental->kode_mobil) }}">
                    Edit
                </a>
                <a class="btn  btn-sm btn-danger" href="{{ route('rental.destroy', $rental->kode_mobil) }}" onclick="confirm('Yakin Hapus?')">
                    Hapus
                </a>
                <a class="btn  btn-sm btn-secondary" href="{{ route('rental.index') }}">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <hr class="horizontal dark mt-0">
</div>
