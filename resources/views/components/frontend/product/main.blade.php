<div class="main">
    <div class="row mt-10">
        <div class="col-lg-8">
            <div class="section text-center">
                <div class="row">
                @forelse ($rentals as $rental)
                <div class="col-lg-4">
                    <div class="info">
                      <ul class="cards">
                          <a href="" class="card">
                            <img src="{{ asset('gambar') }}/{{ $rental->tipe->gambar }}" class="img-rounded img-responsive" />
                            <div class="card__overlay">
                              <h5 class="card__description" style="color: white"><strong>{{ $rental->spesifikasi->nama }}</strong></h5>
                            </div>
                          </a>
                      </ul>
                    </div>
                  </div>
                @empty
                    <center><h3><strong>Data tidak ada</strong></h3></center>
                @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class=" text-center">
                <div class="row">
                    @forelse ($mesins as $mesin)
                    <div class="col-lg-12">
                        <div class="info">
                            <ul class="cards">
                                <a href="" class="card">
                                    <img src="{{ asset('logo') }}/{{ $mesin->logo }}" class="img-rounded img-responsive" alt="Rounded Image">
                                  <div class="card__overlay">
                                    <h5 class="card__description" style="color: white"><strong>{{ $mesin->nama_mesin }}</strong></h5>
                                  </div>
                                </a>
                            </ul>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>


            </div>
        </div>
    </div>
</div>
