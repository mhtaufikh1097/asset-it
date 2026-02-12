@extends('layouts.admin')

@section('title', 'Master Category')

@section('content_header')
    <h1>Data Category</h1>
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
        <h3 class="card-title mb-0">Master Category</h3>
        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th style="width:60px">No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th style="width:100px">Status</th>
                    <th style="width:120px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $cat)
                <tr>
                    <td>
                        {{ $loop->iteration + ($categories->firstItem() - 1) }}
                    </td>
                    <td>
                        <span class="font-weight-medium">
                            {{ $cat->name_category }}
                        </span>
                    </td>
                    <td>{{ $cat->keterangan ?? '-' }}</td>
                    <td>
                        @if ($cat->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-1">

                            {{-- DETAIL --}}
                            <button
                                class="btn btn-sm btn-info btn-detail"
                                data-toggle="modal"
                                data-target="#categoryDetailModal"

                                data-id="{{ $cat->id_category }}"
                                data-name="{{ $cat->name_category }}"
                                data-keterangan="{{ $cat->keterangan }}"
                                data-status="{{ $cat->is_active }}"
                                data-created="{{ $cat->created_at }}"
                                data-updated="{{ $cat->updated_at }}"
                            >
                                <i class="fas fa-eye"></i>
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('category.destroy', $cat->id_category) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?')">
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
                    <td colspan="5" class="text-center text-muted py-3">
                        Tidak ada data kategori
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- FOOTER PAGINATION --}}
    <div class="card-footer p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <small class="text-muted">
                Showing {{ $categories->firstItem() }}
                to {{ $categories->lastItem() }}
                of {{ $categories->total() }} results
            </small>

            <div>
                {{ $categories->links('vendor.pagination.adminlte-compact') }}
            </div>
        </div>
    </div>

</div>


<!-- MODAL DETAIL CATEGORY -->
<div class="modal fade" id="categoryDetailModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Detail Category</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <th>ID Category</th>
            <td id="detail_id"></td>
          </tr>
          <tr>
            <th>Nama Category</th>
            <td id="detail_name"></td>
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
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        const buttons = document.querySelectorAll('.btn-detail');

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('detail_id').innerText =
                    this.dataset.id;

                document.getElementById('detail_name').innerText =
                    this.dataset.name;

                document.getElementById('detail_keterangan').innerText =
                    this.dataset.keterangan || '-';

                document.getElementById('detail_status').innerHTML =
                    this.dataset.status == 1
                        ? '<span class="badge badge-success">Active</span>'
                        : '<span class="badge badge-secondary">Inactive</span>';

                document.getElementById('detail_created').innerText =
                    this.dataset.created;

                document.getElementById('detail_updated').innerText =
                    this.dataset.updated;
            });
        });
    });
</script>


@endsection
