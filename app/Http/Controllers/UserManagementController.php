<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserManagementController extends Controller
{
    public function index()
    {
        $usersLogin = User::select('id', 'name', 'email', DB::raw("'user' as type"))->get();
        $students = Student::select('id', 'name', 'email', DB::raw("'student' as type"))->get();
        $users = $usersLogin->merge($students);

        // Ambil semua sesi aktif
        $sessions = DB::table('sessions')->get();

        // Cek siapa aja yang lagi login
        foreach ($users as $item) {
            $item->is_online = $sessions->contains(function ($session) use ($item) {
                $data = unserialize(base64_decode($session->payload));
                return isset($data['login_web_' . $item->type]) && $data['login_web_' . $item->type] == $item->id;
            });
        }

        return view('users.index', compact('users'));
    }

    public function forceLogout($id)
    {
        DB::table('sessions')->where('user_id', $id)->delete();

        return back()->with('success', 'User berhasil di-logout paksa!');
    }

}
