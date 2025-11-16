@extends('layouts.admin')

@section('title', 'Edit achievement')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
@endsection

@section('page-content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $achievement->title) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $achievement->description) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Achievement Date</label>
                <input type="text" name="achievement_date" class="form-control" value="{{ old('achievement_date', $achievement->achievement_date) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" 
                       name="image" 
                       class="filepond"
                       accept="image/png, image/jpeg, image/jpg, image/gif"
                       data-old-file="{{ $achievement->image ? asset('storage/' . $achievement->image) : '' }}" />
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Back</a>
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
    const inputElement = document.querySelector('.filepond');
    const oldFile = inputElement.dataset.oldFile;

    const pond = FilePond.create(inputElement, {
        allowMultiple: false,
        maxFileSize: '3MB',
        storeAsFile: true,
    });

    // Load existing image if any
    if(oldFile) {
        pond.addFile(oldFile);
    }
</script>
@endsection
