@extends('layouts.backend')


@section('title')
    Admin
@endsection

@section('card-title-user-2')
    Tambah User
@endsection

@section('card-title-user-3')
    Data Warna Mobil
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tambah --}}
    <div class="col-lg-12">
        @include('components.card.users.card-2')
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
