@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('page-content')
<div class="card">
    <div class="card-body">
        <h5>{{ $contactmessages->title }}</h5>
        <div class="mt-3">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection