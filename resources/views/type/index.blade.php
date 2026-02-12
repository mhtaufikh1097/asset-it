@extends('layouts.admin')

@section('title', 'Master Asset Type')

@section('content_header')
    <h1>Data Type Asset</h1>
@stop

@section('page-content')

@if (session('success'))
<div class="alert alert-success" id="alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
    {{-- HEADER --}}
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Master Asset Type</h3>
        <a href="{{ route('type.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th >No</th>
                    <th>Code</th>
                    <th>Nama Type</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th style="width:50px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr>
                    <td>{{ $loop->iteration + ($types->firstItem() - 1) }}</td>
                    <td>
                        <span class="badge badge-info">{{ $type->code_type }}</span>
                    </td>
                    <td>{{ $type->name_type }}</td>
                    <td>{{ $type->id_category }}</td>
                    <td>
                        @if ($type->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
    <td>
    <div class="d-flex align-items-center gap-1">
        <button
            class="btn btn-sm btn-info btn-type-detail"
            data-toggle="modal"
            data-target="#typeDetailModal"

            data-code="{{ $type->code_type }}"
            data-name="{{ $type->name_type }}"
            data-category="{{ $type->id_category }}"
            data-keterangan="{{ $type->keterangan }}"
            data-status="{{ $type->is_active }}"
            data-created="{{ $type->created_at }}"
            data-updated="{{ $type->updated_at }}"
        >
            <i class="fas fa-eye"></i>
        </button>

        <form action="{{ route('type.destroy', $type->id_type) }}"
              method="POST"
              onsubmit="return confirm('Hapus jenis asset ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</td>


                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-3">
                        Tidak ada data
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION (DIKUNCI TEPAT DI BAWAH TABLE) --}}
    <div class="card-footer p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <small class="text-muted">
                Showing {{ $types->firstItem() }} to {{ $types->lastItem() }}
                of {{ $types->total() }} results
            </small>
            <div>
               {{ $types->links('vendor.pagination.adminlte-compact') }}

            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAIL TYPE -->
<div class="modal fade" id="typeDetailModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Detail Asset Type</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table class="table table-bordered table-sm">
          <tr>
            <th style="width:200px">Code Type</th>
            <td id="detail_code"></td>
          </tr>
          <tr>
            <th>Nama Type</th>
            <td id="detail_name"></td>
          </tr>
          <tr>
            <th>Category</th>
            <td id="detail_category"></td>
          </tr>
          <tr>
            <th>Keterangan</th>
            <td id="detail_keterangan"></td>
          </tr>
          <tr>
            <th>Status</th>
            <td id="detail_status"></td>
          </tr>
          <tr>
            <th>Created At</th>
            <td id="detail_created"></td>
          </tr>
          <tr>
            <th>Updated At</th>
            <td id="detail_updated"></td>
          </tr>
        </table>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">
            Tutup
        </button>
      </div>

    </div>
  </div>
</div>




<script>
setTimeout(() => {
    const alert = document.getElementById('alert-success');
    if (alert) alert.remove();
}, 2000);
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.btn-type-detail');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {

            document.getElementById('detail_code').innerText =
                this.dataset.code || '-';

            document.getElementById('detail_name').innerText =
                this.dataset.name || '-';

            document.getElementById('detail_category').innerText =
                this.dataset.category || '-';

            document.getElementById('detail_keterangan').innerText =
                this.dataset.keterangan || '-';

            document.getElementById('detail_status').innerHTML =
                this.dataset.status == 1
                    ? '<span class="badge badge-success">Active</span>'
                    : '<span class="badge badge-secondary">Inactive</span>';

            document.getElementById('detail_created').innerText =
                this.dataset.created || '-';

            document.getElementById('detail_updated').innerText =
                this.dataset.updated || '-';
        });
    });

});
</script>


@endsection
