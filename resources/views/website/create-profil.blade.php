@extends('layouts.frontend')

@section('title')
    Buat Profil
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection

@section('page-header')
<div class="page-header page-header-xs" data-parallax="true" style="background-image: url('{{ asset('frontend') }}/assets/img/fabio-mangione.jpg');">
    <div class="filter"></div>
</div>
<div class="section profile-content">
    <div class="container">
        <div class="owner">
            <div class="avatar">
                <img src="{{ asset('frontend') }}/assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
            </div>
            <h3 class="display-5 fw-bold">Buat Profil</h3>
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
                            <form action="{{ route('store.profil', Auth::user()->id) }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            {{-- Status --}}
                                            <div class="form-group ">
                                                <input type="hidden" class="form-control form-control-danger"  value="active" id="inputDanger1"   name="status_user">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            {{-- Level --}}
                                            <div class="form-group ">
                                                <input type="hidden" class="form-control form-control-danger"  value="pelanggan" id="inputDanger1"   name="level">
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
                                            <div class="form-group">
                                                <input type="hidden" class="form-control form-control-danger"  value="{{ Auth::user()->username }}"id="inputDanger1" name="username">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            {{-- Nama --}}
                                            <label > Nama </label>
                                            <div class="form-group @error('nama') has-danger @enderror">
                                                <input type="text" class="form-control form-control-danger"  value="{{ old('nama') }}"id="inputDanger1" @error('nama') placeholder="Error" @enderror  placeholder="Masukan nama" name="nama">
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
                                                <input type="number" class="form-control form-control-danger"  value="{{ old('no_hp') }}"id="inputDanger1" @error('no_hp') placeholder="Error" @enderror  placeholder="Masukan no_hp" name="no_hp">
                                                @error('no_hp')
                                                    <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            {{-- Alamat --}}
                                            <label > Alamat </label>
                                            <div class="form-group @error('alamat') has-danger @enderror">
                                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" @error('alamat') placeholder="Error" @enderror  placeholder="Masukan alamat">
                                                    {{ old('alamat') }}
                                                </textarea>
                                                @error('alamat')
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
                                        <label > Foto </label>
                                        <div class="form-group @error('foto') has-danger @enderror">
                                            <center><img class="img-foto img-fluid my-2"></center>
                                            <input type="file" class="form-control form-control-danger" id="foto" name="foto" onchange="previewImageFoto()">
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
                                            <center><img class="img-background img-fluid my-2"></center>
                                            <input type="file" class="form-control form-control-danger"  id="background" name="background" onchange="previewImageBackground()" >
                                            @error('background')
                                                <div class="form-control-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-round" type="submit">Buat Profil</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mx-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus fuga nemo at eligendi possimus minima totam esse nobis architecto recusandae iste illo ad quibusdam, repellendus aut facere accusantium. Voluptas, nisi.
            </div>
    </div>
</div>

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

</script>
@endsection

