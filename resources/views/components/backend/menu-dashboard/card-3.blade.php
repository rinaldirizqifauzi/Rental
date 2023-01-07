<div class="card">
    <div class="card-body p-3">
        <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengembalian</p>
                        <h5 class="font-weight-bolder">{{ $expired_date }}</h5>
                    <p class="mb-0">
                        <a  data-bs-toggle="modal" data-bs-target="#expired">
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

<!-- Modal Pengembalian -->
<div class="modal fade" id="expired" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Mobil belum dikembalikan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table align-items-center ">
                        <tbody>
                          @foreach ($kembali as $item)
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
                              <p class="text-xs font-weight-bold mb-0">Tanggal Expired:</p>
                              <h6 class="text-sm mb-0">{{ $item->tgl_selesai }}</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Tanggal Expired:</p>
                              <h6 class="text-sm mb-0">{{ $lama_expired }} Hari</h6>
                            </div>
                          </td>
                          <td>
                          <td>
                            <div class="text-center">
                              <p class="text-xs font-weight-bold mb-0">Nama:</p>
                              <h6 class="text-sm mb-0">{{ $item->user->detail->first()->nama }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Tempat Tinggal</p>
                              <h6 class="text-sm mb-0">{{ $item->user->detail->first()->alamat }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm">
                            <div class="col text-center">
                              <p class="text-xs font-weight-bold mb-0">Nomor Handphone/WA</p>
                              <h6 class="text-sm mb-0">{{ $item->user->detail->first()->no_hp }}</h6>
                            </div>
                          </td>
                          <td class="align-middle text-sm my-2">
                            <div class="col text-center">
                                <form action="{{ route('kembali.transaksi', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Tersedia">
                                    <input type="hidden" name="status_transaksi" value="clear">
                                    <button type="submit" class="btn btn-sm btn-warning text-xs font-weight-bold mb-0">Telah dikembalikan</button>
                                </form>
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
