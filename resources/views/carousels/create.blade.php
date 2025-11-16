@extends('layouts.admin')

@section('title', 'Buat Konten Slider')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.carousels.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="description" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" 
                       name="image" 
                       class="filepond"
                       accept="image/png, image/jpeg, image/jpg, image/gif" />
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.carousels.index') }}" class="btn btn-secondary">Kembali</a>
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

    // Apply FilePond to all input.filepond
    FilePond.create(document.querySelector('.filepond'), {
        allowMultiple: false,
        maxFileSize: '3MB',
        storeAsFile: true // penting supaya file tetap ke-submit via form biasa
    });
</script>
@endsection
