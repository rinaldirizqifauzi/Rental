@extends('layouts.backend')

@section('title')
    Mesin
@endsection

@section('card-title-mesin_mobil-2')
    Form Mesin Mobil
@endsection

@section('card-title-mesin_mobil-3')
    Data Mesin Mobil
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tampil --}}
    <div class="col-lg-8">
        @include('components.card.dashboard.mesin.card-2')
    </div>
    {{-- Tambah --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.mesin.card-3')
    </div>
</div>

<script>

    function previewLogo() {
        const logo = document.querySelector('#logo');
        const imgLogo = document.querySelector('.img-logo');

        imgLogo.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(logo.files[0]);

        oFReader.onload = function(oFREvent){
            imgLogo.src = oFREvent.target.result;
        }
    }

</script>
@endsection
