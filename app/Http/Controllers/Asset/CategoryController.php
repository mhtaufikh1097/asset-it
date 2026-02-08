<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = MasterCategory::orderBy('id_category', 'desc')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_category' => 'required|unique:master_category,name_category',
        ]);

        MasterCategory::create([
            'name_category' => $request->name_category,
            'keterangan'    => $request->keterangan,
            'is_active'     => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function destroy($id)
    {
        MasterCategory::findOrFail($id)->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}
