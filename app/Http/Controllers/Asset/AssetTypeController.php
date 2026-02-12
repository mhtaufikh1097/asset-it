<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\MasterAssetType;
use App\Models\MasterCategory;
use Illuminate\Http\Request;

class AssetTypeController extends Controller
{
    public function index()
    {
        $types = MasterAssetType::orderBy('id_type', 'desc')->paginate(10);

        return view('type.index', compact('types'));
    }

    public function create()
    {
        $categories = MasterCategory::where('is_active', 1)->get();
        return view('type.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_category' => 'required',
            'code_type'   => 'required|unique:master_asset_type,code_type',
            'name_type'   => 'required',
        ]);

        MasterAssetType::create([
            'id_category' => $request->id_category,
            'code_type'   => $request->code_type,
            'name_type'   => $request->name_type,
            'keterangan'  => $request->keterangan,
            'is_active'   => $request->is_active ?? 1,
        ]);

        return redirect()
            ->route('type.index')
            ->with('success', 'Jenis asset berhasil ditambahkan');
    }

    public function destroy($id)
    {
        MasterAssetType::findOrFail($id)->delete();

        return redirect()
            ->route('type.index')
            ->with('success', 'Jenis asset berhasil dihapus');
    }
}
