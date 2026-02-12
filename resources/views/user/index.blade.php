@extends('layouts.admin')

@section('title', 'User List')

@section('page-content')

<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">User List</h3>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success auto-dismiss m-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
            <thead class="thead-light">
                <tr>
                    <th style="width:60px">No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th style="width:100px">Status</th>
                    <th style="width:120px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        {{ $loop->iteration + ($users->firstItem() - 1) }}
                    </td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </button>

                            <button class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </button>

                            <form action="{{ route('user.destroy', $user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus user ini?')">
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
                        Tidak ada data user
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer p-2">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <small class="text-muted">
                Showing {{ $users->firstItem() }}
                to {{ $users->lastItem() }}
                of {{ $users->total() }} results
            </small>

            <div>
                {{ $users->links('vendor.pagination.adminlte-compact') }}
            </div>
        </div>
    </div>

</div>

@endsection
