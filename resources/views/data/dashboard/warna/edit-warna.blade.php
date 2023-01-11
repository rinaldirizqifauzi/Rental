@extends('layouts.backend')

@section('card-title-warna_mobil-4')
    {{ $warna->warna }}
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
        @include('components.card.dashboard.warrna-mobil.card-4')
    </div>
</div>
@endsection
