@extends('layouts.admin')

@section('title', 'Manage Pusat Informasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection

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
                <li class="list-group-item py-3"
                    style="
                        border-radius: 12px; 
                        margin-bottom: 14px; 
                        border: 1px solid #e9e9e9; 
                        padding: 18px;
                        display: flex; 
                        gap: 16px;
                        align-items: center;
                        transition: 0.2s;
                    "
                >
                    {{-- === Thumbnail (opsional) === --}}
                    <div style="
                        width: 80px; 
                        height: 80px; 
                        flex-shrink: 0;
                        border-radius: 10px; 
                        overflow: hidden;
                        background: #f5f5f5;
                        display: flex; 
                        justify-content: center; 
                        align-items: center;
                        border: 1px solid #eee;
                    ">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" 
                                style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            {{-- fallback tanpa gambar --}}
                            <span class="text-muted" style="font-size: 12px;">
                                No Image
                            </span>
                        @endif
                    </div>

                    {{-- === Konten berita === --}}
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 17px; margin-bottom: 4px;">
                            {{ $item->title }}
                        </div>

                        <div class="text-muted" style="font-size: 14px;">
                            {{ Str::limit($item->content, 120) }}
                        </div>
                    </div>

                    {{-- === Aksi === --}}
                    <div class="d-flex gap-2">
                        <button 
                            class="btn btn-sm btn-warning editBtn"
                            data-id="{{ $item->id }}"
                            data-title="{{ $item->title }}"
                            data-content="{{ $item->content }}"
                            data-image="{{ $item->image }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            title="Edit"
                        >
                            <i class="mdi mdi-pencil"></i>
                        </button>

                        <form action="{{ route('admin.announcements.destroy', $item->id) }}" method="POST" class="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger deleteBtn" title="Hapus">
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
        <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" 
                            name="image" 
                            class="filepond"
                            id="image-create"
                            accept="image/png, image/jpeg, image/jpg, image/gif"
                            data-old-file="" 
                        />
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
        <form method="POST" id="editForm" enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        <input type="file" 
                            name="image" 
                            class="filepond"
                            id="image-edit"
                            accept="image/png, image/jpeg, image/jpg, image/gif"
                            data-old-file="" 
                        />
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
<script src="{{ asset('assets/libs/filepond/filepond.min.js')}}"></script>
<script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')}}"></script>
<script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')}}"></script>
<script src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')}}"></script>
<script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js')}}"></script>

<script>
    // Register plugins
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateSize,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileEncode
    );

    // Apply FilePond
    const createInputElement = document.querySelector('#image-create');
    
    const createPond = FilePond.create(createInputElement, {
        allowMultiple: false,
        maxFileSize: '3MB',
        storeAsFile: true,
    });
    
    // Load existing image if any
    const editInputElement = document.querySelector('#image-edit');
    
    const editPond = FilePond.create(editInputElement, {
        allowMultiple: false,
        maxFileSize: '3MB',
        storeAsFile: true,
    });

    const oldFile = editInputElement.dataset.oldFile;
    if(oldFile) {
        editPond.addFile(oldFile);
    }
</script>

<script>
    // =========== SET DATA EDIT ===========
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;

            document.querySelector('#edit_title').value = this.dataset.title;
            document.querySelector('#edit_content').value = this.dataset.content;

            const base = `{{ url('admin/dashboard/announcements') }}`;
            document.querySelector('#editForm').action = `${base}/${id}`;

            // === Load image lama ===
            const oldImage = this.dataset.image 
                ? `{{ asset('storage') }}/${this.dataset.image}`
                : null;

            editPond.removeFiles();

            if (oldImage) {
                editPond.addFile(oldImage);
            }
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
