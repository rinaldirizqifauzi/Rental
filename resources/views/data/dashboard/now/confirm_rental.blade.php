@extends('layouts.backend')

@section('title')
    Konfirmasi
@endsection

@section('dashboard_card-1')
    @include('components.backend.menu-dashboard.card-1')
@endsection

@section('dashboard_card-2')
    @include('components.backend.menu-dashboard.card-2')
@endsection

@section('dashboard_card-3')
    @include('components.backend.menu-dashboard.card-3')
@endsection

@section('dashboard_card-4')
    @include('components.backend.menu-dashboard.card-4')
@endsection

@section('card-title-confirm_penyewaan-1')
    Konfirmasi Penyewaan
@endsection

@section('card-content')
<div class="row mt-4">
    <div class="col-lg-12">
        @include('components.card.konfirmasi.card-1')
    </div>
</div>
@endsection

