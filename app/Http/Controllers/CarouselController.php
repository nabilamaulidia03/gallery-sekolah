<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('carousels.index', compact('carousels'));
    }

    public function create()
    {
        return view('carousels.create');
    }

    public function show ()
    {
        return;
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('carousels', 'public');
        }

        Carousel::create($data);

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel created successfully.');
    }

    public function edit(Carousel $carousel)
    {
        return view('carousels.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // hapus file lama kalau ada
            if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }
            $data['image'] = $request->file('image')->store('carousels', 'public');
        }

        $carousel->update($data);

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel updated successfully.');
    }

    public function activate(Carousel $carousel)
    {
        if (!$carousel->status) {
            $lastActiveOrder = Carousel::max('order') ?? 0;
            $carousel->order = $lastActiveOrder + 1;
            $carousel->status = true;
        } else {
            $carousel->order = 0;
            $carousel->status = false;
        }

        $carousel->save();

        if($carousel->status) {
            return redirect()->route('admin.carousels.index')->with('success', 'Carousel activate successfully.');
        } 
        return redirect()->route('admin.carousels.index')->with('success', 'Carousel deactivate successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel deleted successfully.');
    }
}
