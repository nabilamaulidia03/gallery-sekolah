@extends('layouts.landingPage')

@section('content')
<div class="pt-5">
    <div class="container py-5">

        <div class="text-center mb-5">
            <h3 class="fw-bold">Berita Sekolah</h3>
            <p class="text-muted">Berita dan pengumuman terbaru SMK Negeri 4 Kota Bogor</p>
        </div>

        <div class="row g-4">

            @foreach ($news as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card shadow-sm border-0 rounded-4 h-100 p-3">
                    {{-- Badge --}}
                    <div class="mb-2">
                        <span class="badge px-2 py-1"
                            style="background:#e8f0ff; color:#2b64d8; font-size:12px;">
                            {{ $item->category ?? 'Pusat Informasi' }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h6 class="fw-bold mb-2" style="min-height:40px;">
                        {{ $item->title }}
                    </h6>

                    {{-- IMAGE AREA --}}
                    <div class="rounded-3 overflow-hidden mb-2"
                        style="width:100%; height:140px; background:#f5f5f5; display:flex; justify-content:center; align-items:center;">
                        
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->title }}"
                                style="width:100%; height:100%; object-fit:cover;">
                        @else
                            <div class="text-muted d-flex flex-column justify-content-center align-items-center" style="font-size:12px;">
                                <i class="bi bi-image" style="font-size:26px;"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- Short Description --}}
                    <p class="text-muted small mb-2" style="min-height:55px;">
                        {{ Str::limit(strip_tags($item->content), 80) }}
                    </p>

                    {{-- Date --}}
                    <div class="d-flex align-items-center gap-1 text-muted small mb-2">
                        <i class="bi bi-calendar-event"></i>
                        {{ $item->created_at->format('d M Y') }}
                    </div>

                    {{-- CTA --}}
                    <div class="mt-auto">
                        <button 
                            class="btn text-primary small fw-semibold d-flex align-items-center gap-1 openModal p-0"
                            data-title="{{ $item->title }}"
                            data-content="{{ $item->content }}"
                            data-image="{{ $item->image }}"
                            data-date="{{ $item->created_at->format('d M Y') }}">
                            Baca Selengkapnya
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

{{-- ======================= --}}
{{-- Detail Modal --}}
{{-- ======================= --}}
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content rounded-4 border-0 shadow">

            {{-- Header --}}
            <div class="modal-header py-3">
                <h5 class="modal-title fw-bold mb-0" id="detail_title"></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Body --}}
            <div class="modal-body">

                {{-- IMAGE --}}
                <div id="detail_image_wrapper" 
                    class="mb-3 rounded-3 overflow-hidden"
                    style="display: none;">
                    <img id="detail_image" 
                        src="" 
                        alt="Image"
                        style="width: 100%; height: 260px; object-fit: cover;">
                </div>

                {{-- Date --}}
                <div class="text-muted small d-flex align-items-center gap-1 mb-3">
                    <i class="bi bi-calendar-event"></i>
                    <span id="detail_date"></span>
                </div>

                {{-- Content --}}
                <div id="detail_content" style="line-height:1.7;"></div>

            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.querySelectorAll('.openModal').forEach(btn => {
    btn.addEventListener('click', function() {

        const title = this.dataset.title;
        const content = this.dataset.content;
        const date = this.dataset.date;
        const image = this.dataset.image;

        document.getElementById('detail_title').innerText = title;
        document.getElementById('detail_content').innerHTML = content;
        document.getElementById('detail_date').innerText = date;

        const imgWrapper = document.getElementById('detail_image_wrapper');
        const imgTag = document.getElementById('detail_image');

        if (image) {
            imgWrapper.style.display = 'block';
            imgTag.src = "{{ asset('storage/') }}/" + image;
        } else {
            imgWrapper.style.display = 'none';
            imgTag.src = '';
        }

        const modal = new bootstrap.Modal(document.getElementById('detailModal'));
        modal.show();
    });
});
</script>
@endsection
