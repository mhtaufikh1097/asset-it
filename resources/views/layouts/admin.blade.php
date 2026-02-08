@extends('adminlte::page')

{{-- GLOBAL CSS --}}
@push('css')
<link rel="stylesheet" href="{{ asset('css/custom-adminlte.css') }}">
@endpush

{{-- tempat konten halaman --}}
@section('content')
    @yield('page-content')
@endsection
