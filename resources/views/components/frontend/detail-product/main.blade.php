<div class="main">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="section text-center">
                    <div class="card" style="width: 33rem;">
                        <img class="card-img-top img-fluid" src="{{ asset('gambar') }}/{{ $rentals->tipe->gambar }}" alt="Card image cap">
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <img class="card-img-top img-fluid" src="{{ asset('gambar1') }}/{{ $rentals->tipe->gambar1 }}" alt="Card image cap">
                        </div>
                        <div class="col-lg-4">
                            <img class="card-img-top img-fluid" src="{{ asset('gambar2') }}/{{ $rentals->tipe->gambar2 }}" alt="Card image cap">
                        </div>
                        <div class="col-lg-4">
                            <img class="card-img-top img-fluid" src="{{ asset('gambar3') }}/{{ $rentals->tipe->gambar3 }}" alt="Card image cap">
                        </div>
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
                        <h4 class="card-title">Form Penyewaan</h4> <hr><br>
                            <form action="{{ route('store.transaksi') }}" method="POST">
                                @csrf
                                <input type="hidden" name="rental_id" value="{{ $rentals->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="status_transaksi" value="pending">

                                {{-- Tgl Mulai --}}
                                <div class="mb-3">
                                    <label > Tanggal Mulai </label>
                                    <div class="form-group @error('tgl_mulai') has-danger @enderror">
                                        <input type="date" class="form-control form-control-danger"  value="" id="inputDanger1" @error('tgl_mulai') placeholder="Error" @enderror  name="tgl_mulai">
                                        @error('tgl_mulai')
                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label > Tanggal Selesai </label>
                                    <div class="form-group @error('tgl_selesai') has-danger @enderror">
                                        <input type="date" class="form-control form-control-danger"  value="" id="inputDanger1" @error('tgl_selesai') placeholder="Error" @enderror name="tgl_selesai">
                                        @error('tgl_selesai')
                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label > Metode pick up </label>
                                    <div class="form-group @error('pick_up') has-danger @enderror">
                                        <select name="pick_up" id="pick_up" class="form-control">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="sendiri">Ambil sendiri</option>
                                            <option value="antar">Antar ke lokasi</option>
                                        </select>
                                        @error('pick_up')
                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label > Pakai Sopir </label>
                                    <div class="form-group @error('driver_confirm') has-danger @enderror">
                                        <select name="driver_confirm" id="driver_confirm" class="form-control">
                                            <option value="" selected disabled>Pilih</option>
                                            <option value="iya">Ya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                        @error('pick_up')
                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur blanditiis mollitia adipisci non eveniet fuga et pariatur, a eos temporibus veniam, atque ipsa nobis, excepturi magni? Alias dolor exercitationem deleniti.
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</div>
