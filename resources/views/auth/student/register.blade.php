@extends('layouts.auth')

@section('content')

<div class="container my-5 d-flex justify-content-center">
    <div class="register-card">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/logo/logo_smkn_4.png') }}" alt="Logo Sekolah" class="mb-3" style="width: 80px;">
            <h4 class="fw-bold text-dark">Daftar Akun Siswa</h4>
            <p class="text-muted small">Buat akun untuk mengakses dashboard siswa</p>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('status'))
            <div class="alert alert-success small">{{ session('status') }}</div>
        @endif

        {{-- Validasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger small">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="form-control" placeholder="Masukkan email aktif" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control" placeholder="Minimal 8 karakter" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn register-btn w-100 py-2 fw-semibold">Daftar</button>

            <div class="text-center mt-3 small">
                Sudah punya akun? <a href="{{ route('student.login') }}" class="text-primary text-decoration-none">Masuk di sini</a>
            </div>
        </form>
    </div>
</div>

@endsection