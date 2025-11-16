@extends('layouts.landingPage')


@section('content')

    <section id="hero" class="position-relative vh-100 overflow-hidden">
        {{-- Carousel Background --}}
        <div id="schoolCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel">
            <div class="carousel-inner h-100">
                @forelse ($carousels as $index => $carousel)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} h-100">
                        <img src="{{ asset('storage/' . $carousel->image) }}" 
                            class="d-block w-100 h-100 object-fit-cover" 
                            alt="{{ $carousel->title }}">
                        <div class="overlay"></div>
                    </div>
                @empty
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('assets/images/hero/smk4.webp') }}" 
                            class="d-block w-100 h-100 object-fit-cover" 
                            alt="SMK NEGERI 4 BOGOR">
                        <div class="overlay"></div>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Fixed Hero Content --}}
        <div class="hero-content container text-center text-white position-relative z-3 d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="fw-bold display-4 mb-3 animate__animated animate__fadeInDown">
                Selamat Datang di<br><span class="text-highlight">SMK Negeri 4 Bogor</span>
            </h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                Mencetak Generasi Unggul, Kreatif, dan Berkarakter melalui Pendidikan Berkualitas.
            </p>
            <div class="d-flex gap-3 justify-content-center">
                <a href="#gallery" class="btn btn-primary btn-lg rounded-pill px-4 shadow">
                    <i class="bi bi-images me-2"></i> Lihat Galeri
                </a>
                <a href="#about" class="btn btn-outline-light btn-lg rounded-pill px-4">
                    <i class="bi bi-info-circle me-2"></i> Tentang Kami
                </a>
            </div>
        </div>

        {{-- Dark Overlay --}}
        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100 z-2"></div>

        {{-- Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#schoolCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#schoolCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </section>
    
    <section id="about" class="py-5 bg-light position-relative">
    <div class="container text-center">
        <!-- Judul -->
        <h2 class="fw-bold display-6 mb-3 text-primary">Tentang Sekolah Kami</h2>
        <p class="text-muted mx-auto mb-5" style="max-width: 700px;">
        {{ $about->description }}
        </p>

        <!-- 3 Card -->
        <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 about-card">
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width:70px; height:70px;">
                <i class="bi bi-mortarboard-fill fs-2"></i>
            </div>
            <h4 class="fw-semibold mb-2">Visi</h4>
            <p class="text-muted small">{{ $about->visi }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 about-card">
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width:70px; height:70px;">
                <i class="bi bi-clipboard2-check-fill fs-2"></i>
            </div>
            <h4 class="fw-semibold mb-2">Misi</h4>
            <p class="text-muted small">{{ $about->misi }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 about-card">
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width:70px; height:70px;">
                <i class="bi bi-people-fill fs-2"></i>
            </div>
            <h4 class="fw-semibold mb-2">Nilai</h4>
            <p class="text-muted small">{{ $about->nilai }}</p>
            </div>
        </div>
        </div>
    </div>
    </section>

    <section id="gallery" class="py-5 bg-light position-relative">
        <div class="container text-center">
            <h2 class="fw-bold display-6 mb-4 text-primary">Galeri Kegiatan Sekolah</h2>
            <p class="text-muted mb-5" style="max-width: 650px; margin: 0 auto;">
            Potret momen terbaik dari kegiatan siswa, guru, dan seluruh civitas sekolah.
            </p>

            <div class="row g-4">
            @forelse ($galleries as $gallery)
                <div class="col-md-4 col-sm-6">
                <div class="gallery-card position-relative overflow-hidden rounded-4 shadow-sm">
                    <img 
                    src="{{ asset('storage/' . $gallery->image) }}" 
                    alt="{{ $gallery->title ?? 'Galeri Sekolah' }}" 
                    class="gallery-img img-fluid w-100"
                    >
                    <div class="gallery-overlay d-flex flex-column justify-content-center align-items-center text-white text-center px-3">
                    <h5 class="fw-semibold mb-1">{{ $gallery->title }}</h5>
                    <small class="text-white-50 fst-italic">{{ $gallery->category->title ?? 'Kegiatan Sekolah' }}</small>
                    </div>
                </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada galeri yang tersedia.</p>
            @endforelse
            </div>

            @if($galleries->count() >= 6)
            <div class="text-center mt-5">
                <a href="{{ route('landingPage.galleries') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">
                <i class="bi bi-images me-2"></i> Selengkapnya
                </a>
            </div>
            @endif
        </div>
    </section>


    <section id="jurusan" class="py-5 bg-white position-relative">
    <div class="container text-center">
        <h2 class="fw-bold display-6 mb-3 text-primary">Pilihan Jurusan Unggulan</h2>
        <p class="text-muted mb-5" style="max-width: 600px; margin: 0 auto;">
        Beragam jurusan yang dirancang untuk mencetak generasi siap kerja dan berdaya saing global.
        </p>

        <div class="row g-4 justify-content-center">
        @php
            $icons = ['bi-gear-fill', 'bi-globe-americas', 'bi-chat-left-dots-fill', 'bi-mortarboard-fill', 'bi-book-half', 'bi-people-fill'];
        @endphp

        @forelse ($studyPrograms as $index => $program)
            @php
            $icon = $icons[$index % count($icons)];
            @endphp
            <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="major-card h-100 bg-white rounded-4 shadow-sm border-0 p-4 position-relative overflow-hidden">
                <div class="icon-wrapper mb-3">
                <i class="bi {{ $icon }} fs-1 text-primary"></i>
                </div>
                <h4 class="fw-bold mb-2">{{ $program->title }}</h4>
                <p class="text-muted small mb-4">{{ Str::limit($program->description, 100) }}</p>
                @if($program->link)
                <a href="{{ $program->link }}" class="btn btn-outline-primary rounded-pill px-3">
                    <i class="bi bi-arrow-right-circle me-1"></i> Pelajari
                </a>
                @endif
            </div>
            </div>
        @empty
            <p class="text-center text-muted">Belum ada jurusan yang tersedia.</p>
        @endforelse
        </div>
    </div>
    </section>

    <section id="agenda" class="section-padding py-5 bg-light position-relative overflow-hidden">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary mb-2" style="font-size: 2.2rem;">Agenda Sekolah</h2>
                <p class="text-secondary fs-5">Kegiatan dan acara yang akan datang di sekolah kami</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @forelse ($events as $index => $event)
                        @php
                            $eventDate = \Carbon\Carbon::parse($event->date);
                            $now = \Carbon\Carbon::now();
                            $diffDays = round($now->diffInDays($eventDate, false));

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
                                    {{-- {{ $event->description }} --}}
                                    {{ Str::limit(strip_tags($event->description), 50) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada kegiatan baru di sekolah kami.</p>
                    @endforelse
                    @if ($events->count() == 6)
                        <div class="text-center">
                            <a href="{{ route('landingPage.events') }}" class="btn btn-outline-primary rounded-pill px-3">
                                Lihat Semua
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-3 fw-bold text-uppercase text-primary">
        Hubungi Kami
        </h2>
        <p class="lead text-center text-muted mb-5">
        Ada pertanyaan atau saran? Kirimkan pesan Anda melalui formulir di bawah ini.
        </p>

        <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                <label class="form-label fw-semibold text-muted">Nama Lengkap</label>
                <input type="text" class="form-control form-control-lg" name="name" placeholder="Masukkan nama Anda" required>
                </div>

                <div class="mb-3">
                <label class="form-label fw-semibold text-muted">Alamat Email</label>
                <input type="email" class="form-control form-control-lg" name="email" placeholder="nama@email.com" required>
                </div>

                <div class="mb-3">
                <label class="form-label fw-semibold text-muted">Nomor Telepon</label>
                <input type="text" class="form-control form-control-lg" name="phone" placeholder="0812xxxxxxx">
                </div>

                <div class="mb-4">
                <label class="form-label fw-semibold text-muted">Pesan Anda</label>
                <textarea class="form-control form-control-lg" rows="4" name="message" placeholder="Tulis pesan Anda di sini..." required></textarea>
                </div>

                <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                    Kirim Pesan
                </button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </section>


<section id="location" class="section-padding py-5 bg-light">
  <div class="container text-center">
    <h2 class="section-heading mb-3 fw-bold text-uppercase text-primary">
      Lokasi Kami
    </h2>
    <p class="lead text-muted mb-5">
      Temukan kami dengan mudah menggunakan peta di bawah ini.
    </p>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="map-responsive shadow-lg rounded-4 overflow-hidden border border-2 border-white">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049839612663!2d106.82211360980257!3d-6.640733393326073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMKN%204%20Bogor!5e0!3m2!1sen!2sid!4v1757402313613!5m2!1sen!2sid"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
