<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleryCategories = GalleryCategory::all();
        return view('galleryCategories.index', compact('galleryCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleryCategory = new GalleryCategory();
        $formMode = "create";
        return view('galleryCategories.form', compact('galleryCategory', 'formMode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $category = GalleryCategory::create($data);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryCategory $galleryCategory)
    {
        $formMode = "show";
        return view('galleryCategories.form', compact('galleryCategory', 'formMode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryCategory $galleryCategory)
    {
        $formMode = "edit";
        return view('galleryCategories.form', compact('galleryCategory', 'formMode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $galleryCategory->update($data);

        return redirect()->route('admin.gallery-categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index');
    }
}
