@extends('layouts.admin')

@section('title', 'List Pesan')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>List Pesan</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>{{ $message->message }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada pesan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection