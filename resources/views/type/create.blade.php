@extends('layouts.admin')

@section('title', 'Tambah Asset Type')

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
        <form action="{{ route('type.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Category</label>
                <select name="id_category" class="form-control" required>
                    <option value="">-- pilih --</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id_category }}">
                            {{ $cat->name_category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Code Type</label>
                <input type="text" name="code_type" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama Type</label>
                <input type="text" name="name_type" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('type.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

@endsection
