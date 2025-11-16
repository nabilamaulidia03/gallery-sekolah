@extends('layouts.admin')

@section('title', 'Create Contact Messages')

@section('page-content')
<div class="card">
    <div class="card-header">Create Contact Messages</div>
    <div class="card-body">
        <form action="{{  }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <button class="btn btn-success">Save</button>
            <a href="{{  }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection