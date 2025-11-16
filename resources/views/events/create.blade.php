@extends('layouts.admin')

@section('title', 'Create Agenda Sekolah')

@section('page-content')
<div class="card">
    <div class="card-header">Create Agenda Sekolah</div>
    <div class="card-body">
        <form action="{{ route('admin.events.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskrpsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" maxlength="80">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" 
                       value="{{ old('date') }}">
                @error('date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="location" name="location" class="form-control @error('location') is-invalid @enderror" 
                       value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection