@extends('layouts.backend')

@section('title')
    Laporan
@endsection

@section('card-title-laporan-1')
    Data laporan
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
