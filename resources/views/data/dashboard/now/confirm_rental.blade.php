@extends('layouts.backend')

@section('title')
    Konfirmasi penyewaan
@endsection

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

@section('card-title-rental-1')
    Konfirmasi Penyewaan
@endsection

@section('card-title-rental-2')
    Posting mobil
@endsection

@section('card-content')
<div class="row mt-4">
    <div class="col-lg-12">
        @include('components.card.konfirmasi.card-1')
    </div>
</div>
@endsection

