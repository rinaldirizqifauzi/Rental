@extends('layouts.backend')

@section('title')
    Dashboard
@endsection


@section('rental_card-1')
    @include('components.backend.menu-rental.card-1')
@endsection

@section('rental_card-2')
    @include('components.backend.menu-rental.card-2')
@endsection

@section('rental_card-3')
    @include('components.backend.menu-rental.card-3')
@endsection

@section('rental_card-4')
    @include('components.backend.menu-rental.card-4')
@endsection
