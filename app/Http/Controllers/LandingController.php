<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $featureds = News::with(['author', 'newsCategory'])
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        $news = News::with(['author', 'newsCategory'])
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
        
        $authors = Author::withCount('news')
            ->take(5)
            ->get();
        
        return view('pages.landing', compact('featureds', 'news', 'authors'));
    }
}