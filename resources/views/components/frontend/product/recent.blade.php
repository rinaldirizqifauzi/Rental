<div class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Mobil</th>
                                <th scope="col">Type Mobil</th>
                                <th scope="col">Tahun Mobil</th>
                                <th scope="col">Warna Mobil </th>
                                <th scope="col">Nomor Polisi</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Tanggal Expired</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($recents as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ Auth::user()->detail->first()->nama }}
                                    </td>
                                    <td>
                                        {{ $item->rental->spesifikasi->nama }}
                                    </td>
                                    <td>
                                        {{ $item->rental->tipe->nama_tipe }}
                                    </td>
                                    <td>
                                        {{ $item->rental->spesifikasi->tahun }}
                                    </td>
                                    <td>
                                        {{ $item->rental->warna->warna }}
                                    </td>
                                    <td>
                                        {{ $item->rental->no_polisi_1 }} - {{ $item->rental->no_polisi_2 }} - {{ $item->rental->no_polisi_3 }}
                                    </td>
                                    <td>
                                        {{ $item->tgl_mulai }}
                                    </td>
                                    <td>
                                        {{ $item->tgl_selesai }}
                                    </td>
                                    <td>
                                        Rp. {{ $item->total }}
                                    </td>
                                    <td>
                                        {{ $item->status_transaksi }}
                                    </td>
                                    <td>
                                        @if ($item->status_transaksi== 'pending')
                                        <a href="" class="btn btn-danger btn-sm">Batal</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
