<?php

namespace App\Http\Controllers;

use App\Models\Pasal;
use App\Models\PasalCategory; 
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
        
        // Tambahkan ini untuk Pasal:
        $pasals = Pasal::with('category')
            ->orderBy('nomor_pasal', 'asc')
            ->get();
        
        $pasalCategories = PasalCategory::withCount('pasals')
            ->orderBy('title', 'asc')
            ->get();
            
        // Check kalau belum ada data
        if ($news->isEmpty() && $featureds->isEmpty()) {
            return view('pages.empty-state');
        }

        return view('pages.landing', compact('featureds', 'news', 'authors', 'pasals', 'pasalCategories'));
    }
}