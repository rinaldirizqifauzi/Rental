@extends('layouts.backend')

@section('title')
    Kelengkapan
@endsection

@section('card-title-kelengkapan-3')
    Data Kelengkapan
@endsection

@section('card-title-kelengkapan-2')
    Form Data Kelengkapan
@endsection

@section('card-content')
<div class="row mt-4">
    {{-- Tampil --}}
    <div class="col-lg-8">
        @include('components.card.dashboard.kelengkapan.card-3')
    </div>
    {{-- Tambah --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.kelengkapan.card-2')
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
         $('#kelengkapan').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('kelengkapan.select') }}",
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
       });
</script>
@endpush



