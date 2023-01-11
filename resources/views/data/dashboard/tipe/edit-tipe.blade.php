@extends('layouts.backend')

@section('title')
    Tipe
@endsection


@section('card-title-type_mobil-4')
    Edit {{ $tipe->kode_tipe }}
@endsection

@section('card-title-type_mobil-3')
    Data Tipe Mobil
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tampil --}}
    <div class="col-lg-8">
        @include('components.card.dashboard.type-mobil.card-3')
    </div>
    {{-- Tambah --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.type-mobil.card-4')
    </div>
</div>
@endsection


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

    function previewImage1() {
        const gambar1 = document.querySelector('#gambar1');
        const imgPreview1 = document.querySelector('.img-preview1');

        imgPreview1.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar1.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview1.src = oFREvent.target.result;
        }
    }

    function previewImage2() {
        const gambar2 = document.querySelector('#gambar2');
        const imgPreview2 = document.querySelector('.img-preview2');

        imgPreview2.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar2.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview2.src = oFREvent.target.result;
        }
    }

    function previewImage3() {
        const gambar3 = document.querySelector('#gambar3');
        const imgPreview3 = document.querySelector('.img-preview3');

        imgPreview3.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar3.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview3.src = oFREvent.target.result;
        }
    }
</script>





