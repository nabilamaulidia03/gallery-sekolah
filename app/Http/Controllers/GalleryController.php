<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category_id' => 'required|exists:gallery_categories,id',
            'caption' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item created successfully.');
    }

    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    public function like(Gallery $gallery)
    {
        $gallery->likes++;
        $gallery->save();
        return response()->json(['likes' => $gallery->likes]);
    }

    public function unlike(Gallery $gallery)
    {
        $gallery->likes = max(0, $gallery->likes - 1);
        $gallery->save();
        return response()->json(['likes' => $gallery->likes]);
    }

    public function getComments(Gallery $gallery)
    {
        $comments = $gallery->comments()
            ->latest()
            ->take(10)
            ->get(['name', 'comment', 'created_at'])
            ->map(function ($c) {
                $c->created_at = Carbon::parse($c->created_at)
                    ->setTimezone('Asia/Jakarta') // ⏰ ubah ke zona waktu lokal
                    ->translatedFormat('d M Y, H:i'); // 🗓️ contoh: 19 Okt 2025, 23:51
                return $c;
            });

        return response()->json(['comments' => $comments]);
    }

    public function storeComment(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'gallery_id' => 'required|exists:galleries,id',
            'name' => 'nullable|string|max:50',
            'comment' => 'required|string|max:255'
        ]);

        $comment = Comment::create($data);

        return response()->json(['comment' => [
            'name' => $comment->name,
            'comment' => $comment->comment,
            'created_at' => Carbon::parse($comment->created_at)
                ->setTimezone('Asia/Jakarta')
                ->translatedFormat('d M Y, H:i')
        ]]);
    }



    public function edit(Gallery $gallery)
    {
        $categories = GalleryCategory::all();
        return view('galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:gallery_categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery deleted successfully.');
    }
}
