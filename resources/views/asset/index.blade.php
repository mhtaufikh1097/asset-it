@extends('layouts.admin')

@push('css')
<link rel="stylesheet" href="{{ asset('css/custom-adminlte.css') }}">
@endpush

@section('title', 'Data Asset')

@section('content_header')
    <h1>Data Asset</h1>
@stop
@section('page-content')
<div class="card shadow-sm">

    {{-- HEADER --}}
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">List Data Asset</h3>
        <a href="{{ route('asset.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Asset
        </a>
    </div>

    {{-- ALERT --}}
    @if (session('success'))
        <div class="alert alert-success auto-dismiss m-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger auto-dismiss m-3">
            {{ session('error') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th style="width:60px">No</th>
                    <th>Asset Number</th>
                    <th>Nama Asset</th>
                    <th>Lokasi</th>
                    <th >Kondisi</th>
                    <th>Assign To</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($assets as $asset)
                <tr>
                    <td>
                        {{ $loop->iteration + ($assets->firstItem() - 1) }}
                    </td>
                    <td>
                            {{ $asset->asset_number }}
                        
                    </td>
                    <td>{{ $asset->asset_name }}</td>
                    <td>{{ $asset->location }}</td>
                    <td>
                        @if ($asset->asset_condition === 'SERVICEABLE')
                            <span class="badge badge-success">
                                Serviceable
                            </span>
                        @else
                            <span class="badge badge-danger">
                                Unserviceable
                            </span>
                        @endif
                    </td>
                    <td>{{ $asset->assign_to ?? '-' }}</td>
                    <td>
                        <div class="d-flex align-items-center gap-1">

                            {{-- DETAIL --}}
                            <button
                                class="btn btn-sm btn-info btn-asset-detail"
                                data-toggle="modal"
                                data-target="#assetDetailModal"

                                data-asset_number="{{ $asset->asset_number }}"
                                data-asset_name="{{ $asset->asset_name }}"
                                data-part_number="{{ $asset->part_number }}"
                                data-serial_number="{{ $asset->serial_number }}"
                                data-model="{{ $asset->model }}"
                                data-manufacturer="{{ $asset->manufacturer }}"
                                data-yom="{{ $asset->yom }}"
                                data-condition="{{ $asset->asset_condition }}"
                                data-owner="{{ $asset->owner }}"
                                data-department="{{ $asset->department }}"
                                data-location="{{ $asset->location }}"
                                data-assign_to="{{ $asset->assign_to }}"
                            >
                                <i class="fas fa-eye"></i>
                            </button>

                            {{-- EDIT --}}
                            <a href="#" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            {{-- DELETE --}}
                            <button 
                                class="btn btn-sm btn-danger btn-delete"
                                data-toggle="modal"
                                data-target="#deleteModal"
                                data-id="{{ $asset->id }}"
                                data-name="{{ $asset->asset_name }}"
                            >
                                <i class="fas fa-trash"></i>
                            </button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        Belum ada data asset
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
                Showing {{ $assets->firstItem() }}
                to {{ $assets->lastItem() }}
                of {{ $assets->total() }} results
            </small>

            <div>
                {{ $assets->links('vendor.pagination.adminlte-compact') }}
            </div>
        </div>
    </div>

</div>


        </table>
        <!-- MODAL DETAIL ASSET -->
<div class="modal fade" id="assetDetailModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Detail Asset</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <th>Asset Number</th>
            <td id="detail_asset_number"></td>
          </tr>
          <tr>
            <th>Nama Asset</th>
            <td id="detail_asset_name"></td>
          </tr>
          <tr>
            <th>Part Number</th>
            <td id="detail_part_number"></td>
          </tr>
          <tr>
            <th>Serial Number</th>
            <td id="detail_serial_number"></td>
          </tr>
          <tr>
            <th>Model</th>
            <td id="detail_model"></td>
          </tr>
          <tr>
            <th>Manufacturer</th>
            <td id="detail_manufacturer"></td>
          </tr>
          <tr>
            <th>Year of Manufacture</th>
            <td id="detail_yom"></td>
          </tr>
          <tr>
            <th>Kondisi</th>
            <td id="detail_condition"></td>
          </tr>
          <tr>
            <th>Owner</th>
            <td id="detail_owner"></td>
          </tr>
          <tr>
            <th>Department</th>
            <td id="detail_department"></td>
          </tr>
          <tr>
            <th>Location</th>
            <td id="detail_location"></td>
          </tr>
          <tr>
            <th>Assign To</th>
            <td id="detail_assign_to"></td>
          </tr>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Tutup
        </button>
      </div>

    </div>
  </div>
</div>

    </div>
</div>

<!-- MODAL DELETE -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Hapus Asset</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form method="POST" id="deleteForm">
        @csrf
        @method('DELETE')

        <div class="modal-body">
          <p>
            Apakah kamu yakin ingin menghapus asset
            <strong id="deleteAssetName"></strong>?
          </p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Batal
          </button>
          <button type="submit" class="btn btn-danger">
            Ya, Hapus
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

@section('js')
<script>
    $('.btn-delete').on('click', function () {
        const id   = $(this).data('id');
        const name = $(this).data('name');

        $('#deleteAssetName').text(name);
        $('#deleteForm').attr('action', '/asset/' + id);
    });
</script>
@stop

@section('js')
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.auto-dismiss').fadeOut('slow');
        }, 2000); // 2000 ms = 2 detik
    });
</script>
@stop




<script>
document.addEventListener('DOMContentLoaded', function () {

    const buttons = document.querySelectorAll('.btn-asset-detail');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {

            document.getElementById('detail_asset_number').innerText =
                this.dataset.asset_number || '-';

            document.getElementById('detail_asset_name').innerText =
                this.dataset.asset_name || '-';

            document.getElementById('detail_part_number').innerText =
                this.dataset.part_number || '-';

            document.getElementById('detail_serial_number').innerText =
                this.dataset.serial_number || '-';

            document.getElementById('detail_model').innerText =
                this.dataset.model || '-';

            document.getElementById('detail_manufacturer').innerText =
                this.dataset.manufacturer || '-';

            document.getElementById('detail_yom').innerText =
                this.dataset.yom || '-';

            document.getElementById('detail_condition').innerText =
                this.dataset.condition || '-';

            document.getElementById('detail_owner').innerText =
                this.dataset.owner || '-';

            document.getElementById('detail_department').innerText =
                this.dataset.department || '-';

            document.getElementById('detail_location').innerText =
                this.dataset.location || '-';

            document.getElementById('detail_assign_to').innerText =
                this.dataset.assign_to || '-';

        });
    });

});
</script>


@stop
