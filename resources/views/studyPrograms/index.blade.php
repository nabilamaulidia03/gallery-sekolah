@extends('layouts.admin')

@section('title', 'Manage Program Studi')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.study-programs.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($studyPrograms as $index => $achievement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $achievement->title }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>
                            <a href="{{ route('admin.study-programs.edit', $achievement->id) }}" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.study-programs.destroy', $achievement->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="4" class="text-center">Tidak ada program studi</td>
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
