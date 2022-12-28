@extends('layouts.frontend')

@section('title')
    Homepage
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection


@section('page-header')
<div class="page-header" data-parallax="true" style="background-image: url('{{ asset('frontend') }}/assets/img/image-1.jpg');">
    <div class="filter"></div>
    <div class="container">
        <div class="motto text-center">
            <h1>Example page</h1>
            <h3>Start designing your landing page here.</h3>
            <br />
            <a href="" class="btn btn-outline-neutral btn-round">Lihat Selengkapnya</a>
        </div>
    </div>
</div>
@endsection

@section('main')
    @include('components.frontend.main')
@endsection


@section('footer')
    @include('components.frontend.footer')
@endsection
