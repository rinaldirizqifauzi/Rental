@extends('layouts.backend')

@section('title')
    Laporan
@endsection

@section('card-title-laporan-1')
    Data laporan
@endsection

@section('menu_laporan')
    <div class="row">
        <div class="col-lg-4">
            @include('components.backend.menu-laporan.card-1')
        </div>
        <div class="col-lg-4">
            @include('components.backend.menu-laporan.card-2')
        </div>
        <div class="col-lg-4">
            @include('components.backend.menu-laporan.card-4')
        </div>
    </div>
@endsection




@section('card-content')
<div class="row mt-4">
    {{-- Tampil Detail --}}
    <div class="col-lg-12">
        @include('components.card.report.card-1')
    </div>
</div>
@endsection

@push('css-external')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Solway:wght@300&display=swap" rel="stylesheet">
@endpush
