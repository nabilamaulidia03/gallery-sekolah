@extends('layouts.admin')

@section('title', 'Manage Berita')

@section('page-content')
<style>
.list-group-item:hover {
    background: #fafafa;
    transition: 0.2s;
    cursor: pointer;
}
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">+ Tambah</button>
    </div>

    <div class="card-body">
        <ul class="list-group">
            @foreach($data as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center py-3" 
                style="border-radius: 10px; margin-bottom: 10px; border: 1px solid #e5e5e5;">

                <div>
                    <strong style="font-size: 16px;">{{ $item->title }}</strong>
                    <div class="text-muted" style="font-size: 14px;">
                        {{ Str::limit($item->content, 100) }}
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button 
                        class="btn btn-sm btn-warning editBtn"
                        data-id="{{ $item->id }}"
                        data-title="{{ $item->title }}"
                        data-content="{{ $item->content }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                    >
                        <i class="mdi mdi-pencil"></i>
                    </button>

                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger deleteBtn">
                            <i class="mdi mdi-trash-can"></i>
                        </button>
                    </form>
                </div>

            </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- ========================================= --}}
{{-- ============== CREATE MODAL ============== --}}
{{-- ========================================= --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.news.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Isi Pengumuman</label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>

{{-- ========================================= --}}
{{-- ================ EDIT MODAL ============== --}}
{{-- ========================================= --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" id="edit_title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Isi Pengumuman</label>
                        <textarea name="content" id="edit_content" class="form-control" rows="4" required></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    // =========== SET DATA EDIT ===========
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;

            document.querySelector('#edit_title').value = this.dataset.title;
            document.querySelector('#edit_content').value = this.dataset.content;

            const base = `{{ url('admin/dashboard/news') }}`;
            document.querySelector('#editForm').action = `${base}/${id}`;
        });
    });


    // =========== DELETE CONFIRM ===========
    document.querySelectorAll('.deleteForm').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Yakin hapus?",
                text: "Data ini bakal hilang permanently!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "Cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    });
</script>

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
