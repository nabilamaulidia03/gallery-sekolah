@extends('layouts.admin')

@section('title', 'Contact Messages List')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>Contact Messages List</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->type) }}</td>
                        <td>
                            @if ($user->is_online)
                                <span class="badge bg-success">Online</span>
                            @else
                                <span class="badge bg-secondary">Offline</span>
                            @endif
                        </td>
                        <td>
                            @if ($user->is_online)
                                <form action="{{ route('admin.users.logout', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection