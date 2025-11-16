@extends('layouts.admin')

@section('title', 'Manage Kategori Galeri')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.gallery-categories.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleryCategories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="{{ route('admin.gallery-categories.edit', $category->slug) }}" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.gallery-categories.destroy', $category->slug) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="3" class="text-center">No categories found.</td>
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
