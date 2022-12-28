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
                @foreach ($rentals as $rental)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header pb-0 p-3">
                              <div class="d-flex justify-content-between">
                                <h6 class="mb-2">{{ $rental->spesifikasi->nama }}</h6>
                                <a href="{{ route('spesifikasi.index') }}" class="btn btn-link text-primary text-gradient px-3 mb-0" href="javascript:;">
                                   {{ $rental->status }}
                                </a>
                              </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="card-body text-center p-3 w-100 pt-0">
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                         <img src="{{ asset('gambar') }}/{{ $rental->tipe->gambar }}" alt="Image placeholder" class="card-img-top" >
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="container">
                                <a class="btn  btn-sm btn-primary" href="{{ route('rental.detail', $rental->kode_mobil) }}">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
