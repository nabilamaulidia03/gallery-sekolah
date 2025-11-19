@extends('layouts.auth')

@section('content')
<div class="login-card">
    <div class="text-center mb-4">
        <img src="{{ asset('assets/logo/logo_smkn_4.png') }}" alt="Logo Sekolah" class="mb-3" style="width: 80px;">
        <h4 class="fw-bold text-dark">Login Siswa</h4>
        <p class="text-muted small">Masuk untuk mengakses dashboard Siswa</p>
    </div>

    {{-- Alert sukses/logout --}}
    @if (session('status'))
        <div class="alert alert-success small">{{ session('status') }}</div>
    @endif

    {{-- Error validation --}}
    @if ($errors->any())
        <div class="alert alert-danger small">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('student.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" autofocus
                class="form-control" placeholder="Masukkan email kamu">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label small" for="remember">
                    Ingat saya
                </label>
            </div>
            <a href="#" class="small text-primary text-decoration-none">Lupa password?</a>
        </div>
        {{-- reCAPTCHA --}}
        @if(config('app.url') == "https://nabilamaulidia.my.id")
        {!! NoCaptcha::renderJs() !!}
        {!! NoCaptcha::display() !!}
        @endif

        <button type="submit" class="btn login-btn w-100 py-2 fw-semibold">Masuk</button>

        <div class="text-center mt-3 small">
            Belum punya akun? <a href="{{ route('student.register') }}" class="text-primary text-decoration-none">Daftar di sini</a>
        </div>
    </form>
</div>
@endsection