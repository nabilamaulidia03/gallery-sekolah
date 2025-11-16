<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::orderBy('achievement_date', 'desc')->get();
        return view('achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'achievement_date' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully.');
    }

    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }


    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'achievement_date' => 'nullable|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($achievement->image && Storage::disk('public')->exists($achievement->image)) {
                Storage::disk('public')->delete($achievement->image);
            }
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($data);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
