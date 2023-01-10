@extends('layouts.backend')

@section('title')
    Konfirmasi
@endsection

@section('dashboard_card-1')
    @include('components.backend.menu-dashboard.card-1')
@endsection

@section('dashboard_card-2')
    @include('components.backend.menu-dashboard.card-2')
@endsection

@section('dashboard_card-3')
    @include('components.backend.menu-dashboard.card-3')
@endsection

@section('dashboard_card-4')
    @include('components.backend.menu-dashboard.card-4')
@endsection

@section('card-title-confirm_penyewaan-1')
<form action="" method="GET">
    <div class="row">
        <label for="">Status Transaksi</label>
        <div class="col-lg-9">
            <div class="input-group" >
                <select name="status_transaksi" id="status_transaksi" class="form-control">
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" {{ $statusSelected == $value ? "selected" : null}}>
                        {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <button class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>
@endsection

@section('card-content')
<div class="row mt-4">
    <div class="col-lg-12">
        @include('components.card.konfirmasi.card-1')
    </div>
</div>
@endsection

