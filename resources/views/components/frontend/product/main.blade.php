<div class="main">
    <div class="row ">
        <div class="col-lg-8">
            <div class="section text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero quam recusandae explicabo non natus, consequatur ab consequuntur ullam veritatis, doloremque assumenda. Sunt, incidunt. Vel veniam optio sed, cumque iste porro!
                <center>
                    <h3 class="my-5">Mobil yang tersedia</h3>
                </center>
                <div class="row">
                @forelse ($rentals as $rental)
                <div class="col-lg-4">
                    <div class="container">
                        <a href="{{ route('product.detail', $rental->kode_mobil) }}">
                            <div class="card" style="width: 17rem;">
                                <img class="card-img-top" src="{{ asset('gambar') }}/{{ $rental->tipe->gambar }}" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">{{ $rental->spesifikasi->nama }} - {{ $rental->tipe->nama_tipe }}</p>
                                </div>
                              </div>
                        </a>
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
                            <a href="">
                                <div class="row">
                                    <div class="col-lg-12 my-2">
                                        <a href="">
                                            <img src="{{ asset('logo') }}/{{ $mesin->logo }}" class="img-rounded img-responsive img-fluid" width="220" alt="Rounded Image">
                                            <h3>{{ $mesin->nama_mesin }}</h3>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>


            </div>
        </div>
    </div>
</div>
