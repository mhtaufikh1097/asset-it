@extends('adminlte::page')

@section('title', 'Data Asset')

@section('content_header')
    <h1>Data Asset</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-header d-flex justify-content-between">
    <h3 class="card-title">List Data Asset</h3>
    <a href="{{ route('asset.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Asset</a>
</div>
      
    </div>

    <div class="card-body table-responsive">
       
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Asset Number</th>
                    <th>Nama Asset</th>
                    <th>Lokasi</th>
                    <th>Kondisi</th>
                    <th>Assign to</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
    @forelse ($assets as $asset)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $asset->asset_number }}</td>
            <td>{{ $asset->asset_name }}</td>
            <td>{{ $asset->location }}</td>
            <td>
                @if ($asset->asset_condition === 'SERVICEABLE')
                    <span class="badge badge-success">Serviceable</span>
                @else
                    <span class="badge badge-danger">Unserviceable</span>
                @endif
            </td>
            <td>{{ $asset->assign_to}}</td>
                    <td>
                <button 
                    class="btn btn-sm btn-info btn-detail"
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
                    Detail
                </button>

                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>

        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Belum ada data asset</td>
        </tr>
    @endforelse
</tbody>

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

@section('js')
<script>
    $('.btn-detail').on('click', function () {

        $('#detail_asset_number').text($(this).data('asset_number'));
        $('#detail_asset_name').text($(this).data('asset_name'));
        $('#detail_part_number').text($(this).data('part_number'));
        $('#detail_serial_number').text($(this).data('serial_number'));
        $('#detail_model').text($(this).data('model'));
        $('#detail_manufacturer').text($(this).data('manufacturer'));
        $('#detail_yom').text($(this).data('yom'));
        $('#detail_condition').text($(this).data('condition'));
        $('#detail_owner').text($(this).data('owner'));
        $('#detail_department').text($(this).data('department'));
        $('#detail_location').text($(this).data('location'));
        $('#detail_assign_to').text($(this).data('assign_to'));

    });
</script>
@stop

@stop
