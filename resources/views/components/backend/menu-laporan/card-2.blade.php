<div class="card">
    <div class="card-body p-3">
        <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Mobil Jalan</p>
                        <h5 class="font-weight-bolder">{{ $mobil_jalan }}</h5>
                        <p class="mb-0">
                            <a  data-bs-toggle="modal" data-bs-target="#car_run">
                               Lihat selengkapnya
                            </a>
                        </p>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Mobil Jalan -->
<div class="modal fade" id="car_run" tabindex="-1" aria-labelledby="car_run" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="car_run">Data mobil yang sedang jalan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                          @foreach ($run_car as $item)
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                    <div>
                                        <img src="{{ asset('gambar') }}/{{ $item->rental->tipe->gambar }}" alt="Image placeholder" class="" height="80" width="140">
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-xs font-weight-bold mb-0">Nama Mobil:</p>
                                        <h6 class="text-sm mb-0">{{ $item->rental->spesifikasi->nama }} {{ $item->rental->tipe->nama_tipe }}</h6>
                                    </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Penyewa:</p>
                                    <h6 class="text-sm mb-0">{{  $item->user->detail->first()->nama }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Pengambilan:</p>
                                    <h6 class="text-sm mb-0">{{ $item->pick_up }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Sewa Sopir:</p>
                                    <h6 class="text-sm mb-0">{{ $item->driver_confirm }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Sampai Tanggal:</p>
                                    <h6 class="text-sm mb-0">{{ $item->tgl_selesai }}</h6>
                                    </div>
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
