@extends('layouts.backend')

@section('card-title-mobil-1')
    Spesifikasi Mobil
@endsection

@section('card-title-type_mobil-1')
    Tipe Mobil
@endsection

@section('card-title-warna_mobil-1')
    Warna Mobil
@endsection

@section('card-title-harga_mobil-1')
    Harga Mobil
@endsection

@section('card-title-kelengkapan-1')
    Kelengkapan mobil
@endsection

@section('card-title-mesin-1')
    Mesin mobil
@endsection

@section('card-content')
<div class="row my-8">
    {{-- Mobil --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.mobil.card-1')
    </div>
    {{-- Tipe Mobil --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.type-mobil.card-1')
    </div>
    {{-- Warna Mobil --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.warrna-mobil.card-1')
    </div>
    {{-- Kelengkapan Mobil --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.kelengkapan.card-1')
    </div>
    {{-- Kelengkapan Mobil --}}
    <div class="col-lg-4">
        @include('components.card.dashboard.mesin.card-1')
    </div>
</div>
@endsection
