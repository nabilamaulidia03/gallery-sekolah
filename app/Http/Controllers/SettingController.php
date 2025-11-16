<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'value' => 'nullable|string',
        ]);

        $setting->update($request->all());

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'nullable|string',
        ]);

        Setting::create($request->all());

        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}
