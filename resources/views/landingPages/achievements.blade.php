@extends('layouts.landingPage')

@section('title', 'Prestasi')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="py-5" style="background-color: var(--primary-color); color: white;">
        <div class="container d-flex align-items-center">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="fw-bold display-5">Prestasi SMK NEGERI 4 BOGOR</h1>
                    <p class="lead mt-3">Mencetak Generasi Unggul, Kreatif, dan Berkarakter melalui pendidikan berkualitas dan fasilitas lengkap.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/images/hero/smk4.webp') }}" alt="SMK NEGERI 4 BOGOR" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
        
    <section id="achievements" class="section-padding bg-light">
        <div class="container text-center">
            <h2 class="section-heading mb-5">Prestasi Gemilang Siswa Kami</h2>
            <p class="lead mb-5">Kami bangga dengan setiap pencapaian siswa yang telah mengharumkan nama sekolah.</p>

            <div class="row g-4 justify-content-center">
                @forelse ($achievements as $achievement)
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-custom h-100">
                            @if($achievement->image)
                                <img src="{{ asset('storage/' . $achievement->image) }}" class="card-img-top img-fluid" alt="{{ $achievement->title }}">
                            @endif
                            <div class="card-body">
                                <i class="bi {{ $achievement->icon ?? 'bi-award-fill' }} fs-3 text-secondary mb-2"></i>
                                <h5 class="card-title fw-bold">{{ $achievement->title }}</h5>
                                <p class="card-text">{{ $achievement->description }}</p>
                                @if($achievement->date)
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($achievement->date)->format('F Y') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada prestasi yang tersedia.</p>
                @endforelse
                
            </div>
        </div>
    </section>
@endsection
    

    