<div class="main">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="section text-center">
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
        </div>
    </div>
</div>
