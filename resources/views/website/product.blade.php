@extends('layouts.frontend')


@section('title')
    Homepage
@endsection

@section('riwayat')
<a  href="{{ route('product.recent',  Auth::user()->id) }}" class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom">
    Riwayat
</a>
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection

@section('page-header')
<div class="page-header page-header-xs" data-parallax="true" style="background-image: url('{{ asset('background') }}/{{  Auth::user()->detail->first()->background }}');">
    <div class="filter"></div>
</div>
<div class="section profile-content">
    <div class="container">
        <div class="owner">
            <div class="avatar">
                <img src="{{ asset('foto') }}/{{  Auth::user()->detail->first()->foto }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
            </div>
            <h3>Mobil yang tersedia</h3>
        </div>
    </div>
</div>
@endsection

@section('main')
    @include('components.frontend.product.main')
@endsection
