<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class StudentGalleryController extends Controller
{
    public function index() {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        $galleriesCategories = GalleryCategory::with('galleries')->get();
        return view('student.index', compact('galleries', 'galleriesCategories'));
    }
}
