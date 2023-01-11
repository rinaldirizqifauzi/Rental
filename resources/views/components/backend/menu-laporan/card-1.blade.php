<div class="card">
    <div class="card-body p-3">
        <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah mobil</p>
                        <h5 class="font-weight-bolder">{{ $jumlah_mobil }}</h5>
                        <p class="mb-0">
                            <a  data-bs-toggle="modal" data-bs-target="#car_count">
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

<!-- Modal Data Mobil -->
<div class="modal fade" id="car_count" tabindex="-1" aria-labelledby="car_count" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="car_count">Data mobil </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                          @foreach ($mobil as $item)
                        <tr>
                          <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                              <div>
                                <img src="{{ asset('gambar') }}/{{ $item->tipe->gambar }}" alt="Image placeholder" class="" height="80" width="140">
                              </div>
                              <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0">Nama Mobil:</p>
                                <h6 class="text-sm mb-0">{{ $item->spesifikasi->nama }} {{ $item->tipe->nama_tipe }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Tahun Mobil:</p>
                              <h6 class="text-sm mb-0">{{ $item->spesifikasi->tahun }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Mesin Mobil:</p>
                              <h6 class="text-sm mb-0">{{ $item->mesin->nama_mesin }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">No Polisi:</p>
                              <h6 class="text-sm mb-0">{{ $item->no_polisi_1 }} - {{ $item->no_polisi_2 }} - {{ $item->no_polisi_3 }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Bahan Bakar:</p>
                              <h6 class="text-sm mb-0">{{ $item->bb }} </h6>
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
