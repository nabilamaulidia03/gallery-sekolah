<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::orderBy('created_at', 'desc')->get();
        return view('news.index', compact('data'));
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

        News::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Pengumuman dibuat.');
    }

    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $news->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Pengumuman diperbarui.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return back()->with('success', 'Pengumuman dihapus.');
    }
}
