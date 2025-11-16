<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    /**
     * 🔹 Tampilkan form register student.
     */
    public function showRegisterForm()
    {
        return view('auth.student.register');
    }

    /**
     * 🔹 Proses register student baru.
     */
    public function register(Request $request)
    {
        // ✅ Validasi input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:students,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'], // harus ada password_confirmation
        ]);

        // ✅ Simpan student baru ke database
        $student = Student::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // ✅ Login otomatis setelah daftar
        Auth::guard('student')->login($student);

        // ✅ Redirect ke dashboard student
        return redirect()->route('student.dashboard')->with('success', 'Selamat datang, bro! Akun kamu sudah siap.');
    }

    /**
     * 🔹 Logout student.
     */
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login')->with('status', 'Berhasil logout.');
    }
}
