@extends('layouts.backend')

@section('title')
    Spesifikasi
@endsection

@section('card-title-mobil-4')
    Edit {{ $spesifikasi->nama }}({{ $spesifikasi->kode }})
@endsection

@section('card-title-mobil-3')
    Data Spesifikasi Mobil
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tampil --}}
    <div class="col-lg-8">
        @include('components.card.dashboard.mobil.card-3')
    </div>
    {{-- Tambah --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.mobil.card-4')
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







