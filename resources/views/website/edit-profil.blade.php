@extends('layouts.frontend')

@section('title')
    Edit Profil
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection

@section('page-header')
    @if (auth()->user()->level == 'pelanggan')
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('{{ asset('background') }}/{{ Auth::user()->detail->first()->background }}');">
            <div class="filter"></div>
        </div>
        <div class="section profile-content">
            <div class="container">
            <div class="owner">
                <div class="avatar">
                <img src="{{ asset('foto') }}/{{ Auth::user()->detail->first()->foto }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                <h4 class="display-5 fw-bold">Update Profil</h4>
                </div>
            </div>
                <br />
            <br/>
            </div>
            <div class="px-4 py-5 my-5 text-center">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">Identitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#following" role="tab">Picture</a>
                                </li>
                                </ul>
                            </div>
                                <!-- Tab panes -->
                                <div class="tab-content following">
                                    <div class="tab-pane text-center active" id="follows" role="tabpanel">
                                        <form action="{{ route('update.profil', Auth::user()->id) }}" class="register-form"  method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        {{-- Status --}}
                                                        <div class="form-group ">
                                                            <input type="hidden" class="form-control form-control-danger"  value="active" id="inputDanger1"   name="status_user">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        {{-- Email --}}
                                                        <div class="form-group ">
                                                            <input type="hidden" class="form-control form-control-danger"  value="{{ Auth::user()->email }}"id="inputDanger1"   name="email">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        {{-- Username --}}
                                                        <label > Username </label>
                                                        <div class="form-group @error('username') has-danger @enderror">
                                                            <input type="text" class="form-control form-control-danger"  value="{{ Auth::user()->username }}" id="inputDanger1" @error('username') placeholder="Error" @enderror  placeholder="Masukan username" name="username">
                                                            @error('username')
                                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        {{-- Nama --}}
                                                        <label > Nama </label>
                                                        <div class="form-group @error('nama') has-danger @enderror">
                                                            <input type="text" class="form-control form-control-danger"   value="{{ old('nama', $user->detail->first()->nama) }}""id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
                                                            @error('nama')
                                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="my-3">
                                                        {{-- No Hp --}}
                                                        <label > No Handphone</label>
                                                        <div class="form-group @error('no_hp') has-danger @enderror">
                                                            <input type="number" class="form-control form-control-danger"  value="{{ old('no_hp', $user->detail->first()->no_hp) }}" id="inputDanger1" @error('no_hp') placeholder="Error" @enderror  placeholder="Masukan no_hp" name="no_hp">
                                                            @error('no_hp')
                                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane text-center" id="following" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    {{-- Foto --}}
                                                    <label > Foto Profil </label>
                                                    <div class="form-group @error('foto') has-danger @enderror">
                                                        <center><img src="{{ asset('foto') }}/{{ Auth::user()->detail->first()->foto }}" alt="Image placeholder" class="img-foto card-img-top" ></center>
                                                        <input type="file" class="form-control form-control-danger" id="foto" name="foto"  onchange="previewImageFoto()">
                                                        @error('foto')
                                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    {{-- Background --}}
                                                    <label > Foto Background </label>
                                                    <div class="form-group @error('background') has-danger @enderror">
                                                        <center><img src="{{ asset('background') }}/{{ Auth::user()->detail->first()->background }}" alt="Image placeholder" class="img-background card-img-top"></center>
                                                        <input type="file" class="form-control form-control-danger"  id="background" name="background" onchange="previewImageBackground()" >
                                                        @error('background')
                                                            <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning btn-round" type="submit">Update Profil</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mx-auto">
                        <table>
                            <ul>
                                <li><p class="text-danger">Harap lengkapi persyaratan untuk rental mobil</p></li>
                                <li><p class="text-danger">Untuk melengkapi persyaratan harap untuk isi form dibawah!</p></li>
                            </ul>
                        </table>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        {{-- Foto KTP --}}
                                        <label > Foto KTP </label>
                                        <div class="form-group @error('foto_ktp') has-danger @enderror">
                                            <div class="row my-2">
                                                <div class="col-lg-6">
                                                    <label for="foto_lama">Foto Lama</label>
                                                    <center><img src="{{ asset('ktp') }}/{{ Auth::user()->detail->first()->foto_ktp }}" alt="Image placeholder" class="img-foto card-img-top" ></center>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="foto_lbaru">Foto Baru</label>
                                                    <center><img class="img-fotoKTP card-img-top my-2"></center>
                                                </div>
                                            </div>
                                            <input type="file" class="form-control form-control-danger"  id="foto_ktp" name="foto_ktp" onchange="previewImageKTP()">
                                            @error('foto_ktp')
                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        {{-- Foto KK --}}
                                        <label > Foto KK </label>
                                        <div class="form-group @error('foto_kk') has-danger @enderror">
                                            <div class="row my-2">
                                                <div class="col-lg-6">
                                                    <label for="foto_baru">Foto Lama</label>
                                                    <center><img src="{{ asset('kk') }}/{{ Auth::user()->detail->first()->foto_kk }}" alt="Image placeholder" class="img-foto card-img-top" ></center>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="foto_baru">Foto Baru</label>
                                                    <center><img class="img-fotoKK card-img-top my-2"></center>
                                                </div>
                                            </div>
                                            <input type="file" class="form-control form-control-danger"  id="foto_kk" name="foto_kk" onchange="previewImageKK()" >
                                            @error('foto_kk')
                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <center>
                                        <button class="btn btn-primary btn-round" type="submit">Submit</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    @endif

  <script>
    function previewImageFoto() {
        const foto = document.querySelector('#foto');
        const imgFoto = document.querySelector('.img-foto');

        imgFoto.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function(oFREvent){
            imgFoto.src = oFREvent.target.result;
        }
    }

    function previewImageBackground() {
        const background = document.querySelector('#background');
        const imgBackground = document.querySelector('.img-background ');

        imgBackground.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(background.files[0]);

        oFReader.onload = function(oFREvent){
            imgBackground.src = oFREvent.target.result;
        }
    }

    function previewImageKTP() {
        const fotoKTP = document.querySelector('#foto_ktp');
        const imgFotoKTP = document.querySelector('.img-fotoKTP ');

        imgFotoKTP.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(fotoKTP.files[0]);

        oFReader.onload = function(oFREvent){
            imgFotoKTP.src = oFREvent.target.result;
        }
    }

    function previewImageKK() {
        const fotoKK = document.querySelector('#foto_kk');
        const imgFotoKK = document.querySelector('.img-fotoKK ');

        imgFotoKK.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(fotoKK.files[0]);

        oFReader.onload = function(oFREvent){
            imgFotoKK.src = oFREvent.target.result;
        }
    }

</script>
@endsection

