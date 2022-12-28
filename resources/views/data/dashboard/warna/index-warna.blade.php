@extends('layouts.backend')

@section('card-title-warna_mobil-2')
    Form Warma Mobil
@endsection

@section('card-title-warna_mobil-3')
    Data Warna Mobil
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tampil --}}
    <div class="col-lg-8">
        @include('components.card.dashboard.warrna-mobil.card-3')
    </div>
    {{-- Tambah --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.warrna-mobil.card-2')
    </div>
</div>

<script>

    function previewImage() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection
