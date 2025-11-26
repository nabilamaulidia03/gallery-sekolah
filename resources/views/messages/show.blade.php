@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('page-content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Detail Pesan</h5>
    </div>

    <div class="card-body">

        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
            <input type="text" class="form-control" value="{{ $message->name }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Alamat Email</label>
            <input type="text" class="form-control" value="{{ $message->email }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Nomor Telepon</label>
            <input type="text" class="form-control" value="{{ $message->phone ?? '-' }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-muted">Pesan</label>
            <textarea class="form-control" rows="4" readonly>{{ $message->message }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-muted">Dikirim Pada</label>
            <input type="text" class="form-control" value="{{ $message->created_at->format('d M Y, H:i') }}" readonly>
        </div>

        <div class="d-flex gap-2">

            <form id="deleteForm" 
                action="{{ route('admin.messages.destroy', $message->id) }}" 
                method="POST">
                @csrf
                @method('DELETE')
                <button type="button" id="btnDelete" class="btn btn-danger fw-bold">
                    <i class="mdi mdi-trash-can"></i> Hapus
                </button>
            </form>


            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary fw-bold">
                Kembali
            </a>

        </div>

    </div>
</div>
@endsection


@section('js')
<script>
document.getElementById('btnDelete').addEventListener('click', function (e) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data ini ga bisa balik lagi.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Iya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').submit();
        }
    });
});
</script>

@endsection
