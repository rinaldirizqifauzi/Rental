<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-laporan-1')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="col-12">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobil</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama / Tipe Mobil</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penyewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat Penyewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto Ktp Penyewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto KK Penyewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">No Hp</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Status Transaksi</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Tgl Sewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Tgl Selesai Sewa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Metode Penyewaan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Sewa Driver</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Deal Transaksi</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                        @foreach ($reports as $report)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1 justify-content-center">
                                    <img src="{{ asset('gambar') }}/{{ $report->rental->tipe->gambar }}" alt="Image placeholder" class="" height="80" width="140">
                                </div>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->rental->spesifikasi->nama }} - {{ $report->rental->tipe->nama_tipe }}</span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->rental->spesifikasi->tahun }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->user->detail->first()->nama }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->user->detail->first()->alamat }} </span>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1 justify-content-center">
                                    <img src="{{ asset('ktp') }}/{{ $report->user->detail->first()->foto_ktp }}" alt="Image placeholder" class="" height="80" width="140">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1 justify-content-center">
                                    <img src="{{ asset('kk') }}/{{ $report->user->detail->first()->foto_kk }}" alt="Image placeholder" class="" height="80" width="140">
                                </div>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->user->detail->first()->no_hp }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->status_transaksi }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->tgl_mulai }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->tgl_selesai }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->pick_up }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->driver_confirm }} </span>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold">{{ $report->updated_at }} </span>
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
