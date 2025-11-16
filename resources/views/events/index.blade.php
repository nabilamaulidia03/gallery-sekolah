@extends('layouts.admin')

@section('title', 'Agenda Sekolah List')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Agenda Sekolah List</h5>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">+ Tambah</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-warning">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                <i class="mdi mdi-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
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
