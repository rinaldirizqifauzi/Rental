<div class="card">
    <div class="card-header pb-0 p-3">
      <div class="d-flex justify-content-between">
        <h6 class="mb-2">@yield('card-title-user-3')</h6>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="card-body p-3 w-100 pt-0">
        <div class="docs-info">
            <div class="col-md-8">
                <div class="card card-profile">
                  <img src="{{ asset('background') }}/{{ $user->detail()->first()->background }}" alt="Image placeholder" class="card-img-top" height="240">
                  <div class="row justify-content-center">
                    <div class="col-4 col-lg-4 order-lg-2">
                      <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                        <a href="javascript:;">
                          <img src="{{ asset('foto') }}/{{ $user->detail()->first()->foto }}" class="rounded-circle img-fluid border border-2 border-white" width="114">
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                    <div class="d-flex justify-content-between">
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col">
                        <div class="d-flex justify-content-center">
                          <div class="d-grid text-center">
                            <span class="text-lg font-weight-bolder">22</span>
                            <span class="text-sm opacity-8">Total orderan</span>
                          </div>
                          <div class="d-grid text-center mx-4">
                            <span class="text-lg font-weight-bolder">10</span>
                            <span class="text-sm opacity-8">Jenis mobil (order)</span>
                          </div>
                        </div>
                      </div>
                      <hr class="horizontal dark mt-0">
                      <div class="row text-center">
                        <div class="col-lg-6">
                            <i class="ni education_hat mr-2"></i>Nama : {{ $user->detail()->first()->nama }} <br>
                            <i class="ni education_hat mr-2"></i>Email : {{ $user->detail()->first()->email }} <br>
                            <i class="ni education_hat mr-2"></i>Email : {{ $user->detail()->first()->alamat }}
                        </div>
                        <div class="col-lg-3">
                            <p> Kartu Tanda Penduduk</p>
                            <div class="card">
                                <div class="card-body p-3">
                                    <img src="{{ asset('ktp') }}/{{ $user->detail()->first()->foto_ktp }}" alt="" class="card-img-top" height="130">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <p> Kartu Keluarga</p>
                            <div class="card">
                                <div class="card-body ">
                                    <img src="{{ asset('ktp') }}/{{ $user->detail()->first()->foto_ktp }}" alt="" class="card-img-top" height="130">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end me-3">
        <a class="btn  btn-sm btn-secondary" href="{{ route('user.index') }}">
            Kembali
        </a>
    </div>
    <hr class="horizontal dark mt-0">
</div>
