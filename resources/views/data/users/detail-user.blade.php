@extends('layouts.backend')

@section('title')
    User
@endsection

@section('card-title-user-3')
  Detail Profil 
@endsection

@push('css-internal')
    <style>
        .text-detail{
            font-family: 'Solway', serif;
        }
    </style>
@endpush

@section('card-content')
<div class="row mt-4">
    {{-- Tampil Detail --}}
    <div class="col-lg-12">
        @include('components.card.users.card-3')
    </div>
</div>
@endsection

@push('css-external')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Solway:wght@300&display=swap" rel="stylesheet">
@endpush
