@extends('layouts.frontend')

<style>
    .card {
      position: relative;
      display: block;
      height: 75%;
      border-radius: calc(var(--curve) * 1px);
      overflow: hidden;
      text-decoration: none;
    }

    .card__overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 1;
      border-radius: calc(var(--curve) * 1px);
      background-color: var(--surface-color);
      transform: translateY(100%);
      transition: .2s ease-in-out;
    }

    .card:hover .card__overlay {
      transform: translateY(0);
    }
    .card__arc path {
      fill: var(--surface-color);
      d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
    }

    .card:hover .card__header {
      transform: translateY(0);
    }
    </style>

@section('title')
    Beranda
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
            <div class="name">
                <h4 class="title"> Mobil yang tersedia
                <br />
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main')
    @include('components.frontend.product.main')
@endsection