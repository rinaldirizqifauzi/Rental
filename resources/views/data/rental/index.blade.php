@extends('layouts.backend')

@section('title')
    Rental
@endsection

@section('card-title-rental-1')
   <form action="" method="GET">
        <div class="row">
            <label for="">Status</label>
            <div class="col-lg-9">
                <div class="input-group" >
                    <select name="status" id="status" class="form-control">
                        @foreach ($statuses as $value => $label)
                            <option value="{{ $value }}" {{ $statusSelected == $value ? "selected" : null}}>
                            {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <button class="btn btn-primary">Cari</button>
            </div>
        </div>
   </form>
@endsection

@section('card-title-rental-2')
    Posting mobil
@endsection

@section('card-content')
<div class="row mt-4">
    <div class="col-lg-8">
        @include('components.card.rental.card-1')
    </div>
    <div class="col-lg-4 mb-lg-0 mb-6">
        @include('components.card.rental.card-2')
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
         $('#mesin').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('mesin.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_mesin,
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
