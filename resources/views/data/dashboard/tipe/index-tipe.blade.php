@extends('layouts.backend')

@section('title')
    Tipe
@endsection

@section('card-title-type_mobil-2')
    Form Tipe Mobil
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
        @include('components.card.dashboard.type-mobil.card-2')
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
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
   <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endpush


@push('javascript-internal')
<script>
     $(function(){
         $('#warna').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('warna.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.warna,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
       });
</script>
@endpush



