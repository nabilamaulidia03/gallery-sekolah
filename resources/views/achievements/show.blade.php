@extends('layouts.admin')

@section('title', 'Show Achievements')

@section('page-content')
<div class="card">
    <div class="card-header">Achievements Detail</div>
    <div class="card-body">
        <h5>{{ $achievements->title }}</h5>
        <div class="mt-3">
            <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('admin.achievements.edit', $achievements->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection