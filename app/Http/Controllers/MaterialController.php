<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $query = Material::with('category')
            ->where('is_active', true);

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $materials = $query->latest()->paginate(12);
        $categories = Category::where('is_active', true)
            ->withCount('materials')
            ->orderBy('order')
            ->get();

        return view('materials.index', compact('materials', 'categories'));
    }

    public function show($slug)
    {
        $material = Material::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Increment views
        $material->incrementViews();

        // Get related materials
        $relatedMaterials = Material::where('category_id', $material->category_id)
            ->where('id', '!=', $material->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();

        return view('materials.show', compact('material', 'relatedMaterials'));
    }
}
