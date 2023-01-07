<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-detail_transaksi-3')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="card card-profile">
                        <img src="{{ asset('gambar') }}/{{  $transaksis->rental->tipe->gambar }}" alt="Image placeholder" class="card-img-top">
                          <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                  <img src="{{ asset('foto') }}/{{  $transaksis->user->detail->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="card card-profile">
                          <div class="row">
                            <div class="col-4 col-lg-4 order-lg-2">
                              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="container">
                            <div class="row my-2">
                                <div class="col-lg-8">
                                    <table>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->user->detail->first()->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->user->detail->first()->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>No Handphone/Whatsapp</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->user->detail->first()->no_hp }}</td>
                                        </tr>
                                        <hr>
                                        <tr>
                                            <td>Tgl Sewa</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->tgl_mulai }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Pengembalian</td>
                                            <td>:</td>
                                            <td> {{  $transaksis->tgl_selesai }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lama Sewa</td>
                                            <td>:</td>
                                            <td> {{  $lama_hari }} Hari</td>
                                        </tr>
                                        <tr>
                                            <td>Total Sewa</td>
                                            <td>:</td>
                                            <td>Rp.{{ $total }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Foto Ktp</label>
                                    <img src="{{ asset('ktp') }}/{{  $transaksis->user->detail->first()->foto_ktp }}" alt="Image placeholder" class="card-img-top">
                                    <label for="">Foto KK</label>
                                    <img src="{{ asset('kk') }}/{{  $transaksis->user->detail->first()->foto_kk }}" alt="Image placeholder" class="card-img-top"> <br><br>
                                </div>
                              </div>
                          </div>
                    </div>
                        <form action="{{ route('confirm.transaksi', $transaksis->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="total" value="{{ $total }}">
                            <input type="hidden" name="status" value="Tidak Tersedia">
                            <input type="hidden" name="status_transaksi" value="success">
                            <div class="d-flex justify-content-end my-3">
                                @if ($transaksis->status_transaksi == 'pending')
                                    <button type="submit" class="btn btn-sm btn-primary mx-2 float-right mb-0 d-none d-lg-block">Konfirmasi</button>
                                @endif
                                <a href="{{ route('konfirmasi.index') }}" class="btn btn-sm btn-secondary float-right mb-0 d-none d-lg-block">Kembali</a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
