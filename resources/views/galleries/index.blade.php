@extends('layouts.admin')

@section('title', 'Manage Konten Galeri')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleries as $index => $gallery)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gallery->caption }}</td>
                        <td>
                            @if ($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     alt="{{ $gallery->title }}" 
                                     style="height: 50px; width: auto;" class="rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.galleries.show', $gallery->slug) }}" class="btn btn-sm btn-info">
                                <i class="mdi mdi-eye"></i>
                            </a>
                            <a href="{{ route('admin.galleries.edit', $gallery->slug) }}" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery->slug) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="mdi mdi-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No galleries found.</td>
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
