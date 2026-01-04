<?php

namespace App\Http\Controllers;

use App\Models\Pasal;
use App\Models\PasalCategory;
use Illuminate\Http\Request;

class PasalController extends Controller
{
    public function index(Request $request)
    {
        $query = Pasal::with('category')->orderBy('nomor_pasal');

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('pasal_category_id', $request->category);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_pasal', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('nomor_pasal', 'like', '%' . $request->search . '%')
                  ->orWhere('isi_pasal', 'like', '%' . $request->search . '%');
            });
        }

        $pasals = $query->get();
        $categories = PasalCategory::withCount('pasals')->get();
        
        return view('pages.pasal.index', compact('pasals', 'categories'));
    }

    public function show($id)
    {
        $pasal = Pasal::with('category')->findOrFail($id);
        
        return view('pages.pasal.show', compact('pasal'));
    }
}