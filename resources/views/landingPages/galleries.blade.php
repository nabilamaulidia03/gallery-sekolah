@extends('layouts.landingPage')

@section('title', 'Gallery')

@section('content')
<section id="hero" class="hero-section position-relative overflow-hidden pb-5 py-lg-6" style="padding-top: 6rem">
    <div class="container position-relative z-2">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-lg-start text-center">
                <h1 class="fw-bold display-5 mb-3 lh-sm text-gradient">
                    Selamat Datang di <br class="d-none d-md-block">
                    <span class="text-white">Galeri SMK Negeri 4 Bogor</span>
                </h1>
                <p class="lead text-light opacity-90 mb-4">
                    Mencetak generasi unggul, kreatif, dan berkarakter melalui pendidikan berkualitas dan fasilitas modern.
                </p>
                <a href="#gallery" class="btn btn-light btn-lg rounded-pill px-4 shadow-sm me-2">
                    <i class="bi bi-images me-2"></i> Lihat Galeri
                </a>
                <a href="#about" class="btn btn-outline-light btn-lg rounded-pill px-4">
                    <i class="bi bi-info-circle me-2"></i> Tentang Kami
                </a>
            </div>

            <div class="col-lg-6 text-center position-relative">
                <div class="hero-image-wrapper position-relative">
                    <img src="{{ asset('assets/images/hero/smk4.webp') }}" 
                        alt="SMK Negeri 4 Bogor" 
                        class="img-fluid rounded-4 shadow-lg hero-image" 
                        style="max-height: 400px; object-fit: cover;">
                    <div class="hero-float bg-white text-primary shadow-lg rounded-pill px-3 py-2 position-absolute top-0 start-50 translate-middle-x">
                        <i class="bi bi-stars me-1"></i> Sekolah Pusat Keunggulan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- background gradient overlay -->
    <div class="hero-bg position-absolute top-0 start-0 w-100 h-100 z-1"></div>
</section>

<section id="gallery" class="section-padding">
    <div class="container">

        {{-- Tabs untuk kategori --}}
        <div class="w-100 bg-white p-3 rounded-4 shadow mb-4">
            <h6>Kategori Galeri</h6>
            <hr>
            <ul class="nav nav-tabs justify-content-start border-0 mb-4 gap-2 gallery-tabs" id="galleryTabs"
                role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold border" id="all-tab" data-bs-toggle="tab"
                        data-bs-target="#all" type="button" role="tab">
                        Semua {{ '(' . $galleries->count() . ')' }}
                    </button>
                </li>

                @foreach ($galleriesCategories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold border" id="cat-{{ $category->id }}-tab"
                            data-bs-toggle="tab" data-bs-target="#cat-{{ $category->id }}" type="button" role="tab">
                            {{ $category->title . ' (' . $category->galleries->count() . ')' }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Konten tab --}}
        <div class="tab-content" id="galleryTabsContent">

            {{-- Tab: Semua --}}
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="row g-4">
                    @forelse ($galleries as $gallery)
                        <div class="col-md-4 col-sm-6 col-12 mb-4">
                            <div class="card instagram-card border-0 shadow-sm rounded-4 overflow-hidden">

                                <!-- Header -->
                                <div
                                    class="card-header bg-white border-0 d-flex align-items-start justify-content-between py-3 px-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="p-1 rounded-5 border border-3 border-primary">
                                            <img src="{{ asset('assets/logo/logo_smkn_4.png') }}"
                                                alt="Logo SMK NEGERI 4 BOGOR" width="30" height="30">
                                        </span>
                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-semibold text-dark gallery-title">{{ $gallery->title }}</span>
                                            <small class="text-muted text-capitalize">{{ $gallery->category->title }}</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="gallery-image-wrapper position-relative">
                                    <img src="{{ asset('storage/' . $gallery->image) }}"
                                        alt="{{ $gallery->title ?? 'Galeri Sekolah' }}"
                                        class="img-fluid w-100 gallery-image gallery-thumb"
                                        data-image="{{ asset('storage/' . $gallery->image) }}" />
                                </div>

                                <!-- Actions -->
                                <div class="card-body text-start py-3 px-3">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                        <div class="d-flex align-items-center justify-content-start flex-wrap gap-3">

                                            <!-- Like -->
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="button"
                                                    class="btn p-0 border-0 like-btn d-flex align-items-center gap-1"
                                                    data-gallery-id="{{ $gallery->slug }}">
                                                    <i class="bi bi-heart action-icon fs-5"></i>
                                                    <span
                                                        class="fw-medium text-dark like-count">{{ $gallery->likes }}</span>
                                                </button>
                                            </div>

                                            <!-- Comment -->
                                            <div class="d-flex align-items-center gap-2">
                                                <button
                                                    class="btn p-0 border-0 comment-btn d-flex align-items-center gap-1"
                                                    data-gallery-id="{{ $gallery->id }}"
                                                    data-gallery-slug="{{ $gallery->slug }}">
                                                    <i class="bi bi-chat action-icon fs-5"></i>
                                                    <span
                                                        class="fw-medium text-dark like-count">{{ $gallery->comments->count() }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <small class="text-muted time-text">
                                        {{ $gallery->created_at->locale('id')->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada galeri yang tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- Tab per kategori --}}
            @foreach ($galleriesCategories as $category)
                <div class="tab-pane fade" id="cat-{{ $category->id }}" role="tabpanel">
                    <div class="row g-4">
                        @forelse ($category->galleries as $gallery)
                            <div class="col-md-4 col-sm-6 col-12 mb-4">
                                <div class="card instagram-card border-0 shadow-sm rounded-4 overflow-hidden">

                                    <!-- Header -->
                                    <div
                                        class="card-header bg-white border-0 d-flex align-items-start justify-content-between py-3 px-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="p-1 rounded-5 border border-3 border-primary">
                                                <img src="{{ asset('assets/logo/logo_smkn_4.png') }}"
                                                    alt="Logo SMK NEGERI 4 BOGOR" width="30" height="30">
                                            </span>
                                            <div class="d-flex flex-column align-items-start">
                                                <span class="fw-semibold text-dark gallery-title">{{ $gallery->title }}</span>
                                                <small class="text-muted text-capitalize">{{ $gallery->category->title }}</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Image -->
                                    <div class="gallery-image-wrapper position-relative">
                                        <img src="{{ asset('storage/' . $gallery->image) }}"
                                            alt="{{ $gallery->title ?? 'Galeri Sekolah' }}"
                                            class="img-fluid w-100 gallery-image gallery-thumb"
                                            data-image="{{ asset('storage/' . $gallery->image) }}" />
                                    </div>

                                    <!-- Actions -->
                                    <div class="card-body text-start py-3 px-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                                            <div class="d-flex align-items-center justify-content-start flex-wrap gap-3">

                                                <!-- Like -->
                                                <div class="d-flex align-items-center gap-2">
                                                    <button type="button"
                                                        class="btn p-0 border-0 like-btn d-flex align-items-center gap-1"
                                                        data-gallery-id="{{ $gallery->slug }}">
                                                        <i class="bi bi-heart action-icon fs-5"></i>
                                                        <span
                                                            class="fw-medium text-dark like-count">{{ $gallery->likes }}</span>
                                                    </button>
                                                </div>

                                                <!-- Comment -->
                                                <div class="d-flex align-items-center gap-2">
                                                    <button
                                                        class="btn p-0 border-0 comment-btn d-flex align-items-center gap-1"
                                                        data-gallery-id="{{ $gallery->id }}"
                                                        data-gallery-slug="{{ $gallery->slug }}">
                                                        <i class="bi bi-chat action-icon fs-5"></i>
                                                        <span
                                                            class="fw-medium text-dark like-count">{{ $gallery->comments->count() }}</span>
                                                    </button>
                                                </div>

                                                <!-- Share -->
                                                <div class="d-flex align-items-center gap-2">
                                                    <button
                                                        class="btn p-0 border-0 share-btn d-flex align-items-center gap-1"
                                                        data-image="{{ asset('storage/' . $gallery->image) }}"
                                                        data-title="{{ $gallery->title ?? 'Galeri Sekolah' }}">
                                                        <i class="bi bi-send action-icon fs-5"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Download -->
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ asset('storage/' . $gallery->image) }}" download
                                                    class="btn p-0 border-0 download-btn d-flex align-items-center gap-1">
                                                    <i class="bi bi-download action-icon fs-5"></i>
                                                </a>
                                            </div>

                                        </div>

                                        <small class="text-muted time-text">
                                            {{ $gallery->created_at->locale('id')->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada galeri di kategori ini.</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Modal Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center p-0">
                <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Preview Gambar">
            </div>
        </div>
    </div>
</div>

<!-- Modal Komentar -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content border-0 shadow-lg rounded-4" style="backdrop-filter: blur(10px); background: rgba(255,255,255,0.9);">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-primary">
          <i class="bi bi-chat-dots me-1"></i> Komentar Galeri
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <!-- Daftar Komentar -->
        <div id="commentList" class="mb-3 border rounded-3 p-3" 
             style="max-height: 300px; overflow-y: auto; background: #f8f9fa;">
          <div class="text-center text-muted small py-3">Memuat komentar...</div>
        </div>

        <!-- Form Komentar -->
        <form id="commentForm">
          @csrf
          <input type="hidden" name="gallery_id" id="galleryId">
          <div class="mb-3">
            <input type="text" class="form-control rounded-3 shadow-sm border-0" name="name" placeholder="Nama (opsional)">
        </div>
          
          <div class="mb-3">
            <textarea class="form-control rounded-3 shadow-sm border-0" name="comment" rows="3" placeholder="Tulis komentar..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary w-100 rounded-3 fw-semibold shadow-sm">
            <i class="bi bi-send"></i> Kirim
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')
<script>
$(document).ready(function() {
    // 🖼 Preview gambar
    $('.gallery-thumb').on('click', function() {
        let imgSrc = $(this).data('image');
        $('#modalImage').attr('src', imgSrc);
        $('#imageModal').modal('show');
    });

    // 🔄 Set initial like state dari localStorage
    $('.like-btn').each(function() {
        let btn = $(this);
        let galleryId = btn.data('gallery-id');
        let icon = btn.find('i');
        let liked = localStorage.getItem('liked_gallery_' + galleryId);

        if (liked) {
            icon.attr('class', 'bi bi-heart-fill text-danger');
        } else {
            icon.attr('class', 'bi bi-heart');
        }
    });

    // 👍 Like logic
    $('.like-btn').on('click', function() {
        let btn = $(this);
        if (btn.prop('disabled')) return;

        let galleryId = btn.data('gallery-id');
        let icon = btn.find('i');
        let count = btn.find('.like-count');
        let liked = localStorage.getItem('liked_gallery_' + galleryId);
        let url = "{{ url('/galleries') }}/" + galleryId + (liked ? "/unlike" : "/like");

        btn.prop('disabled', true);
        icon.attr('class', 'spinner-border spinner-border-sm text-secondary');

        $.post(url, {_token: "{{ csrf_token() }}"}, function(res) {
            count.text(res.likes);
            if (liked) {
                icon.attr('class', 'bi bi-heart');
                localStorage.removeItem('liked_gallery_' + galleryId);
            } else {
                icon.attr('class', 'bi bi-heart-fill text-danger');
                localStorage.setItem('liked_gallery_' + galleryId, true);
            }
        }).fail(() => {
            console.error('Like request failed', url);
            alert('Gagal memproses like ');
        }).always(() => {
            btn.prop('disabled', false);
        });
    });

    // 💬 Load komentar dinamis (pakai create element)
    $('.comment-btn').on('click', function() {
        let galleryId = $(this).data('gallery-id');
        let gallerySlug = $(this).data('gallery-slug');
        $('#galleryId').val(galleryId);
        $('#commentList').html('<div class="text-center text-muted small">Memuat komentar...</div>');
        $('#commentModal').modal('show');

        $.get("{{ url('/galleries') }}/" + gallerySlug + "/comments", function(res) {
            const list = $('#commentList').empty();

            if (res.comments.length === 0) {
                list.html('<div class="text-center text-muted small">Belum ada komentar.</div>');
                return;
            }

            res.comments.forEach(c => {
                const commentItem = $('<div>')
                    .addClass('comment-item border-bottom pb-3 mb-3 text-start');

                const header = $('<div>')
                    .addClass('d-flex justify-content-between align-items-center mb-1');

                const name = $('<strong>')
                    .addClass('text-dark')
                    .text(c.name || 'Anonimus');

                const date = $('<small>')
                    .addClass('text-muted fst-italic')
                    .text(c.formatted_date);

                const body = $('<div>')
                    .addClass('comment-body bg-light p-3 rounded shadow-sm')
                    .text(c.comment);

                header.append(name, date);
                commentItem.append(header, body);
                list.append(commentItem);
            });
        });
    });

    // ✍️ Submit komentar (auto prepend tampilan baru juga)
    $('#commentForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let btn = form.find('button');
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Mengirim...');

        $.post("{{ url('/galleries/comment') }}", form.serialize(), function(res) {
            form[0].reset();

            const commentItem = $('<div>')
                .addClass('comment-item border-bottom pb-3 mb-3 text-start');

            const header = $('<div>')
                .addClass('d-flex justify-content-between align-items-center mb-1');

            const name = $('<strong>')
                .addClass('text-dark')
                .text(res.comment.name || 'Anonimus');

            const date = $('<small>')
                .addClass('text-muted fst-italic')
                .text(res.comment.created_at);

            const body = $('<div>')
                .addClass('comment-body bg-light p-3 rounded shadow-sm')
                .text(res.comment.comment);

            header.append(name, date);
            commentItem.append(header, body);

            $('#commentList').prepend(commentItem);
        }).always(() => {
            btn.prop('disabled', false).html('<i class="bi bi-send"></i> Kirim');
        });
    });
});

</script>
@endsection