@extends('layouts.admin')

@section('title', 'Detail Konten Slider')

@section('page-content')
<div class="card">
    <div class="card-body">
        <h5>{{ $carousels->title }}</h5>
        <div class="mt-3">
            <a href="{{ route('admin.carousels.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.carousels.edit', $carousels->id) }}" class="btn btn-warning">Ubah</a>
        </div>
    </div>
</div>
@endsection