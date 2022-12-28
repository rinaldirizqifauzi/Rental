@extends('layouts.frontend')

@section('title')
    Beranda
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection

@section('page-header')
<div class="page-header" data-parallax="true" style="background-image: url('{{ asset('frontend') }}/assets/img/image-1.jpg');">
    <div class="filter"></div>
    <div class="container">
        <div class="motto text-center">
            <h3>Buat data merek disini</h3>
            <br />
            <a href="{{ route('homepage') }}" class="btn btn-outline-neutral btn-round">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
@endsection



