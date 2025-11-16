@extends('layouts.admin')

@section('title', 'Manage Konten Slider')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Manage Konten Slider</h5>
        <a href="{{ route('admin.carousels.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carousels as $index => $carousel)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $carousel->title }}</td>
                        <td>
                            @if ($carousel->image)
                                <img src="{{ asset('storage/' . $carousel->image) }}" 
                                     alt="{{ $carousel->title }}" 
                                     style="height: 50px; width: auto;" class="rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($carousel->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.carousels.edit', $carousel->id) }}" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.carousels.activate', $carousel->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm @if ($carousel->status) btn-warning @else btn-success @endif"> 
                                    @if ($carousel->status) <i class="mdi mdi-close"></i> @else <i class="mdi mdi-check"></i> @endif
                                </button>
                            </form>
                            <form action="{{ route('admin.carousels.destroy', $carousel->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada konten slider</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
@if (session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 1500,
        showCloseButton: true
    });
</script>
@endif
@endsection
