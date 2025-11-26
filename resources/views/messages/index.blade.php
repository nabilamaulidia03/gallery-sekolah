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
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" 
                                method="POST" 
                                class="d-inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger delete-button">
                                    <i class="mdi mdi-trash-can"></i>
                                </button>
                            </form>
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

<script>
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function (e) {
        let form = this.closest('form');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Sekali hapus, data ga bisa balik!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection
