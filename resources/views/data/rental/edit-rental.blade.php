@extends('layouts.backend')

@section('rental_card-1')
    @include('components.backend.menu-rental.card-1')
@endsection

@section('rental_card-2')
    @include('components.backend.menu-rental.card-2')
@endsection

@section('rental_card-3')
    @include('components.backend.menu-rental.card-3')
@endsection

@section('rental_card-4')
    @include('components.backend.menu-rental.card-4')
@endsection

@section('card-title-rental-3')
Edit mobil {{ $rental->spesifikasi->nama }}
@endsection

@section('card-title-rental-2')
    Edit mobil {{ $rental->spesifikasi->nama }}
@endsection

@section('card-content')
<div class="row mt-4">
    <div class="col-lg-8">
        @include('components.card.rental.card-3')
    </div>
    <div class="col-lg-4 mb-lg-0 mb-6">
        @include('components.card.rental.card-4')
    </div>
</div>
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
         $('#spesifikasi').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('spesifikasi.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
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
         $('#tipe').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('tipe.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_tipe,
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







