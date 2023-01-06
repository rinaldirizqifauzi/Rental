<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-rental-1')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body text-center p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="row">
                @foreach ($transaksis as $transaksi)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card card-profile">
                        <img src="{{ asset('gambar') }}/{{  $transaksi->rental->tipe->gambar }}" alt="Image placeholder" class="card-img-top">
                          <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                  <img src="{{ asset('foto') }}/{{  $transaksi->user->detail->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                              </div>
                            </div>
                          </div>
                        <p>{{  $transaksi->user->detail->first()->nama }}, {{  $transaksi->status_transaksi }}</p>
                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                            <div class="d-flex justify-content-between">
                            <a href="{{ route('detail.transaksi', ['id' => $transaksi->id]) }}" class="btn btn-sm btn-info float-right mb-0 d-none d-lg-block">Detail</a>
                            <button type="submit" class="btn btn-sm btn-primary float-right mb-0 mx-2 d-none d-lg-block">Konfirmasi</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
