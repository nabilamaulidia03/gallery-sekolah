@extends('layouts.landingPage')

@section('content')
<div class="pt-5">
    <div class="container py-5">

        <div class="text-center mb-5">
            <h3 class="fw-bold">Agenda Sekolah</h3>
            <p class="text-muted">Acara dan kegiatan terbaru SMK Negeri 4 Kota Bogor</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @forelse ($events as $index => $event)
                    @php
                        $eventDate = \Carbon\Carbon::parse($event->date);
                        $now = \Carbon\Carbon::now();
                        $diffDays =  round($now->diffInDays($eventDate, false));

                        if ($diffDays > 0) {
                            $diffText = "({$diffDays} hari lagi)";
                            $badgeClass = 'bg-gradient-success';
                        } elseif ($diffDays === 0) {
                            $diffText = "(hari ini)";
                            $badgeClass = 'bg-gradient-warning';
                        } else {
                            $diffText = "(sudah lewat)";
                            $badgeClass = 'bg-gradient-secondary';
                        }
                    @endphp

                    <div class="agenda-card mb-4">
                        <div class="agenda-date">
                            <span class="month">{{ strtoupper($eventDate->format('M')) }}</span>
                            <span class="day">{{ $eventDate->format('d') }}</span>
                        </div>
                        <div class="agenda-content ps-4">
                            <h4 class="fw-semibold mb-1 text-dark text-capitalize" style="font-size: 1.15rem;">
                                {{ $event->title }}
                            </h4>
                            <div class="small text-muted mb-3">
                                <span class="badge rounded-pill {{ $badgeClass }}">{{ $diffText }}</span>
                                @if($event->location)
                                    <span class="ms-2 text-uppercase"><i class="bi bi-geo-alt"></i> {{ $event->location }}</span>
                                @endif
                            </div>
                            <p class="text-secondary mb-0 text-capitalize" style="line-height: 1.6;">
                                {{ Str::limit(strip_tags($event->description), 80) }}
                            </p>
                            <button 
                                class="btn text-primary small fw-semibold d-flex align-items-center gap-1 openModal"
                                data-title="{{ $event->title }}"
                                data-content="{{ $event->description }}"
                                data-date="{{ $event->created_at->format('d M Y') }}"
                            >
                                Baca Selengkapnya
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada kegiatan baru di sekolah kami.</p>
                @endforelse
            </div>
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
