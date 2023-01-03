<div class="main">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="section text-center">
                    <div class="card" style="width: 36rem;">
                        <img class="card-img-top" src="{{ asset('gambar') }}/{{ $rentals->tipe->gambar }}" alt="Card image cap">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @if (auth()->user()->detail->first()->foto_kk == null AND auth()->user()->detail->first()->foto_kk == null)
                <table>
                    <ul>
                        <li><p class="text-danger">Harap lengkapi persyaratan untuk rental mobil</p></li>
                        <li><p class="text-danger">Untuk melengkapi persyaratan harap untuk isi foto identitas diri</p></li>
                        <li><p class="text-danger">Setelah melengkapi foto identitas diri, silahkan pilih mobil yang Anda akan rental</p></li>
                        <li><p class="text-danger">Terima Kasih</p></li>
                    </ul>
                </table>
                <center>
                    <a href="{{ route('edit.profil', Auth::user()->email) }}" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Foto Identitas Diri</a>
                </center>
                @else
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                      <h4 class="card-title">Card title</h4>
                      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
