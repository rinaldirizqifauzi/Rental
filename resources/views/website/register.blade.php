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
    <div class="col-lg-12">
        <div class="card" style="background-color: transparent">
            <div class="container"><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <h3 style="color: white; margin-top: -17%"><center>Form Registrasi</center></h3> <br>
       
                @include('components.frontend.authenticate.register')
            </div>
        </div>
    </div>
</div>
@endsection
