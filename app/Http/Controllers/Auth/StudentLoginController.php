<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    /**
     * Tampilkan form login student.
     */
    public function showLoginForm()
    {
        return view('auth.student.login');
    }

    /**
     * Proses login student.
     */
    public function login(Request $request)
    {
        // ✅ Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // ✅ Coba login via guard student
        if (Auth::guard('student')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('student.dashboard'))
                ->with('success', 'Selamat datang kembali, bro!');
        }

        // ❌ Kalau gagal
        return back()->withErrors([
            'email' => 'Email atau password salah bro!',
        ])->onlyInput('email');
    }

    /**
     * Logout student.
     */
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landingPage.home')->with('status', 'Berhasil logout.');
    }
}
