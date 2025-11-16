@extends('layouts.admin')

@section('title', 'Edit Contact Messages')

@section('page-content')
<div class="card">
    <div class="card-header">Edit Contact Messages</div>
    <div class="card-body">
        <form action="{{ route('', $contactmessages->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $contactmessages->title }}">
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection