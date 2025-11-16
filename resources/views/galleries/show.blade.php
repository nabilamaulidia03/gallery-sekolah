@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('page-content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-white">
            <i class="bi bi-card-image me-2"></i> Detail Galeri
        </h5>
        <div>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <!-- 🖼 Gambar Galeri -->
            <div class="col-md-6 text-center mb-3 mb-md-0">
                <img 
                    src="{{ asset('storage/' . $gallery->image) }}" 
                    alt="{{ $gallery->caption ?? 'Gambar Galeri' }}" 
                    class="img-fluid rounded shadow-sm border"
                    style="max-height: 400px; object-fit: cover;"
                >
            </div>

            <!-- 📄 Detail Galeri -->
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Judul</th>
                        <td>{{ $gallery->title ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $gallery->caption ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $gallery->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $gallery->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Like</th>
                        <td>
                            <i class="bi bi-hand-thumbs-up text-primary"></i>
                            {{ $gallery->likes ?? 0 }}
                        </td>
                    </tr>
                    <tr>
                        <th>Komentar</th>
                        <td>{{ $gallery->comments->count() ?? 0 }} Komentar</td>
                    </tr>
                </table>

                @if($gallery->comments->count() > 0)
                    <div class="mt-4">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-chat-dots text-primary"></i> Semua Komentar
                        </h6>
                        <div class="border rounded p-2" style="max-height: 300px; overflow-y: auto;">
                            @foreach($gallery->comments()->latest()->get() as $comment)
                                <div class="border-bottom pb-2 mb-2">
                                    <strong>{{ $comment->name ?? 'Anonimus' }}</strong>
                                    <small class="text-muted float-end">{{ $comment->created_at->diffForHumans() }}</small>
                                    <div>{{ $comment->comment }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-muted fst-italic mt-3">Belum ada komentar untuk galeri ini.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
