@extends('layouts.frontend')

@section('title')
    Login
@endsection

@section('navbar')
    @include('components.frontend.navbar')
@endsection


@section('page-header')
<div class="page-header" data-parallax="true" style="background-image: url('{{ asset('frontend') }}/assets/img/image-1.jpg');">
    <div class="filter"></div>
    <div class="container">
        <br><br><br><br><br><br>
        <div class="motto text-center">
            @include('components.frontend.authenticate.login')
        </div>
    </div>
</div>
@endsection


