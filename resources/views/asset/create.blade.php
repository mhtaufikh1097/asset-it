@extends('layouts.admin')

@section('title', 'Tambah Asset')

@section('content_header')
    <h1>Tambah Asset</h1>
@stop

@section('page-content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('asset.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- KIRI --}}
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Asset Number</label>
                        <input type="text" name="asset_number" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Asset</label>
                        <input type="text" name="asset_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="number" name="category_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="number" name="type_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Department ID</label>
                        <input type="number" name="department_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Part Number</label>
                        <input type="text" name="part_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Serial Number</label>
                        <input type="text" name="serial_number" class="form-control">
                    </div>

                </div>

                {{-- KANAN --}}
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Manufacturer</label>
                        <input type="text" name="manufacturer" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Year of Manufacture</label>
                        <input type="number" name="yom" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kondisi Asset</label>
                        <select name="asset_condition" class="form-control" required>
                            <option value="">-- pilih --</option>
                            <option value="SERVICEABLE">SERVICEABLE</option>
                            <option value="UNSERVICEABLE">UNSERVICEABLE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="owner" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Department (Text)</label>
                        <input type="text" name="department" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Assign To</label>
                        <input type="text" name="assign_to" class="form-control">
                    </div>

                </div>

            </div>

            <div class="mt-3">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('asset.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>
@stop
