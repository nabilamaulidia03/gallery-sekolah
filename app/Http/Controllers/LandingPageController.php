<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\Carousel;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\News;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function index() {
        $carousels = Carousel::where('status', 1)->orderBy('order', 'desc')->get();
        $about = About::first();
        $galleries = Gallery::orderBy('created_at', 'desc')->limit(6)->get();
        $studyPrograms = StudyProgram::get();
        $achievements = Achievement::orderBy('achievement_date', 'desc')->limit(6)->get();
        $events = Event::where('date', '>=', Carbon::today())->orderBy('date', 'desc')->limit(6)->get();
        return view('landingPages.index', compact('carousels','about','galleries','studyPrograms','achievements', 'events'));
    }

    public function galleries() {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        $galleriesCategories = GalleryCategory::with('galleries')->get();
        return view('landingPages.galleries', compact('galleries', 'galleriesCategories'));
    }

    public function achievements() {
        $achievements = Achievement::orderBy('created_at', 'desc')->get();
        return view('landingPages.achievements', compact('achievements'));
    }

    public function announcements() {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return view('landingPages.announcements', compact('announcements'));
    }

    public function news() {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('landingPages.news', compact('news'));
    }

    public function events() {
        $events = Event::orderBy('created_at', 'desc')->get();
        // $events = Event::where('date', '>=', Carbon::today())->orderBy('date', 'desc')->limit(6)->get();
        return view('landingPages.events', compact('events'));
    }
}
