@extends('layouts.frontend')

@section('title')
    Homepage
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection

@section('page-header')
<div class="page-header page-header-xs" data-parallax="true" style="background-image: url('{{ asset('background') }}/{{  Auth::user()->detail->first()->background }}');">
    <div class="filter"></div>
</div>
<div class="section profile-content">
    <div class="container">
        <div class="owner">
            <div class="avatar">
                <img src="{{ asset('foto') }}/{{  Auth::user()->detail->first()->foto }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
    @include('components.frontend.detail-product.main')


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
