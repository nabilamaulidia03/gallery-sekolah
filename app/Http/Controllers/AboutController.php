<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('abouts.index', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validator = Validator::make($request->all() ,[
            'description' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'nilai' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about->update($request->all());

        // dd($request->all());

        return redirect()->route('admin.abouts.index')->with('success', 'About updated successfully.');
    }
}
