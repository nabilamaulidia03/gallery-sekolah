@extends('layouts.admin')

@section('title', 'Show Agenda Sekolah')

@section('page-content')
<div class="card">
    <div class="card-header">Agenda Sekolah Detail</div>
    <div class="card-body">
        <h5>{{ $studyprograms->title }}</h5>
        <div class="mt-3">
            <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.study-programs.edit', $studyprograms->id) }}" class="btn btn-warning">Ubah</a>
        </div>
    </div>
</div>
@endsection