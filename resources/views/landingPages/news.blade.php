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
                        <span class="badge px-3 py-2"
                            style="background: #e8f0ff; color:#2b64d8; font-size: 12px;">
                            {{ $item->category ?? 'Announcement' }}
                        </span>
                    </div>

                    {{-- Title --}}
                    <h6 class="fw-bold" style="min-height: 48px;">
                        {{ $item->title }}
                    </h6>

                    {{-- Short Description --}}
                    <p class="text-muted small" style="min-height: 60px;">
                        {{ Str::limit(strip_tags($item->content), 80) }}
                    </p>

                    {{-- Date --}}
                    <div class="d-flex align-items-center gap-1 text-muted small mb-3">
                        <i class="bi bi-calendar-event"></i>
                        {{ $item->created_at->format('d M Y') }}
                    </div>

                    {{-- CTA: open modal --}}
                    <div class="mt-auto">
                        <button 
                        class="btn  text-primary small fw-semibold d-flex align-items-center gap-1 openModal"
                        data-title="{{ $item->title }}"
                        data-content="{{ $item->content }}"
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
        <div class="modal-content rounded-4">

            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="detail_title"></h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="text-muted mb-3 small d-flex align-items-center gap-1">
                    <i class="bi bi-calendar"></i>
                    <span id="detail_date"></span>
                </div>

                <div id="detail_content" style="line-height: 1.6;"></div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.querySelectorAll('.openModal').forEach(btn => {
    btn.addEventListener('click', function() {
        console.log("test");
        const title = this.dataset.title;
        const content = this.dataset.content;
        const date = this.dataset.date;

        document.getElementById('detail_title').innerText = title;
        document.getElementById('detail_content').innerHTML = content;
        document.getElementById('detail_date').innerText = date;

        const modal = new bootstrap.Modal(document.getElementById('detailModal'));
        modal.show();
    });
});
</script>
@endsection
