<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function index()
    {
        $data = Announcement::orderBy('created_at', 'desc')->get();
        return view('announcements.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Announcement::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman dibuat.');
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $announcement->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman diperbarui.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Pengumuman dihapus.');
    }
}
