@extends('layouts.admin')

@section('title', 'achievements List')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>achievements List</h5>
        <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">+ Create</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($achievements as $index => $achievement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $achievement->title }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>{{ $achievement->achievement_date }}</td>
                        <td>
                            @if ($achievement->image)
                                <img src="{{ asset('storage/' . $achievement->image) }}" 
                                     alt="{{ $achievement->title }}" 
                                     style="height: 50px; width: auto;" class="rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No achievements found.</td>
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
