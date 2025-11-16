<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewsCommand extends Command
{
    protected $signature = 'make:views {name}';
    protected $description = 'Generate Blade views (index, create, edit, show) for a module with admin layout';

    public function handle()
    {
        $name = strtolower($this->argument('name'));
        $route = Str::kebab($this->argument('name'));
        $title = Str::headline($this->argument('name'));
        $folderName = Str::of($this->argument('name'))->camel();

        $viewPath = resource_path("views/{$folderName}");

        // bikin folder kalau belum ada
        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        // daftar views yang dibuat
        $views = ['index', 'create', 'edit', 'show'];

        foreach ($views as $view) {
            $file = "{$viewPath}/{$view}.blade.php";

            if (!File::exists($file)) {
                File::put($file, $this->getTemplate($title, $name, $view, $route));
                $this->info("✅ Created: {$file}");
            } else {
                $this->warn("⚠️ Skipped (already exists): {$file}");
            }
        }

        $this->info("🎉 Views for {$title} generated successfully!");
    }

    private function getTemplate($title, $name, $view, $route)
    {
        switch ($view) {
            case 'index':
                return <<<BLADE
@extends('layouts.admin')

@section('title', '{$title} List')

@section('page-content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5>{$title} List</h5>
        <a href="{{ route('{$route}.create') }}" class="btn btn-primary">+ Create</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead><tr><th>#</th><th>Title</th><th>Actions</th></tr></thead>
            <tbody>
                {{-- Loop data here --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
BLADE;

            case 'create':
                return <<<BLADE
@extends('layouts.admin')

@section('title', 'Create {$title}')

@section('page-content')
<div class="card">
    <div class="card-header">Create {$title}</div>
    <div class="card-body">
        <form action="{{ route('{$route}.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <button class="btn btn-success">Save</button>
            <a href="{{ route('{$route}.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
BLADE;

            case 'edit':
                return <<<BLADE
@extends('layouts.admin')

@section('title', 'Edit {$title}')

@section('page-content')
<div class="card">
    <div class="card-header">Edit {$title}</div>
    <div class="card-body">
        <form action="{{ route('{$route}.update', \${$name}->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ \${$name}->title }}">
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{ route('{$route}.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
BLADE;

            case 'show':
                return <<<BLADE
@extends('layouts.admin')

@section('title', 'Show {$title}')

@section('page-content')
<div class="card">
    <div class="card-header">{$title} Detail</div>
    <div class="card-body">
        <h5>{{ \${$name}->title }}</h5>
        <div class="mt-3">
            <a href="{{ route('{$route}.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('{$route}.edit', \${$name}->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
BLADE;
        }
    }
}
