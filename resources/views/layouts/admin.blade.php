@extends('adminlte::page')

{{-- GLOBAL CSS --}}
@push('css')
<link rel="stylesheet" href="{{ asset('css/custom-adminlte.css') }}">
@endpush

{{-- tempat konten halaman --}}
@section('content')
    @yield('page-content')
@endsection


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const logoutLink = document.getElementById('logout-link');

    if (logoutLink) {
        logoutLink.addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        });
    }
});
</script>
