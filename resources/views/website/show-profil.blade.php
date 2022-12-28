@extends('layouts.frontend')

@section('title')
    Buat Profil
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
            @if(Auth::user()->status_user == null)
            <div class="name">
                <h4 class="title">Silahkan Buat Profil Terlebih dahulu
                <br />
                </h4>
                <h6 class="description">{{ Auth::user()->email }}</h6>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                {{-- <p>An artist of considerable range, Jane Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p> --}}
                <br />
                    <a href="{{ route('create.profil', Auth::user()->email) }}" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Buat Profil</a>
                </div>
            </div>
            @else
            <div class="name">
                <h4 class="title">{{ Auth::user()->username }}
                <br />
                </h4>
                <h6 class="description">{{ Auth::user()->email }}</h6>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                <br />
                <a href="{{ route('edit.profil', Auth::user()->email) }}" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> Edit Profil</a>
                @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td><h5>Nama</h5></td>
                        <td>:</td>
                        <td><h5>{{ Auth::user()->detail->first()->nama }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>No Handphone/WA</h5></td>
                        <td>:</td>
                        <td><h5>{{ Auth::user()->detail->first()->no_hp }}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>Alamat</h5></td>
                        <td>:</td>
                        <td><h5>{{ Auth::user()->detail->first()->alamat }}</h5></td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3">
                <label for="foto_ktp">Foto KTP</label>
                <center><img src="{{ asset('ktp') }}/{{ Auth::user()->detail->first()->foto_ktp }}" alt="Image placeholder" class="img-foto card-img-top" ></center>
            </div>
            <div class="col-lg-3">
                <label for="foto_kk">Foto KK</label>
                <center><img src="{{ asset('kk') }}/{{ Auth::user()->detail->first()->foto_kk }}" alt="Image placeholder" class="img-foto card-img-top" ></center>
            </div>
        </div>
        <br/>
    </div>
</div>
@endsection

