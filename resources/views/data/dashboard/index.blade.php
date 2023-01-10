@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('dashboard-content')
    @include('components.backend.menu-dashboard.content')
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
