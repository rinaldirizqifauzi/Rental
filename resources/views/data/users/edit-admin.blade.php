@extends('layouts.backend')

@section('title')
    Edit Admin Profil
@endsection

@section('card-title-user-7')
    Edit data profil
@endsection

{{-- @section('rental_card-1')
    @include('components.backend.menu-dashboard.card-1')
@endsection

@section('rental_card-2')
    @include('components.backend.menu-dashboard.card-2')
@endsection

@section('rental_card-3')
    @include('components.backend.menu-dashboard.card-3')
@endsection

@section('rental_card-4')
    @include('components.backend.menu-dashboard.card-4')
@endsection --}}

@section('card-content')
<div class="row mt-4">
    {{-- Tambah --}}
    <div class="col-lg-12">
        @include('components.card.users.card-7')
    </div>
</div>
@endsection
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

    function previewImageBackground(){
        const background = document.querySelector('#background');
        const imgBackground = document.querySelector('.img-background');

        imgBackground.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(background.files[0]);

        oFReader.onload = function(oFREvent){
            imgBackground.src = oFREvent.target.result;
        }
    }
</script>
