@extends('layouts.admin')

@if($formMode == 'create')
@section('title', 'Buat Kategori Galeri')
@elseif($formMode == 'edit')
@section('title', 'Edit Kategori Galeri')
@endif

@section('page-content')
<div class="card">
    <div class="card-body">
        @if ($formMode == 'create')
        <form action="{{ route('admin.gallery-categories.store') }}" method="POST" enctype="multipart/form-data">
        @elseif($formMode == 'edit')
        <form action="{{ route('admin.gallery-categories.update', $galleryCategory->slug) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            
        @endif
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $galleryCategory->title) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea type="text" name="description" class="form-control" rows="5" maxlength="80">{{ old('description', $galleryCategory->description) }}</textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.gallery-categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
