@extends('layouts.admin')

@section('title', 'Edit Program Studi')

@section('page-content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.study-programs.update', $studyProgram->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $studyProgram->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" maxlength="80">{{ old('description', $studyProgram->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection