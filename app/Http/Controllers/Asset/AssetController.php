<?php

namespace App\Http\Controllers\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::orderBy('id', 'desc')->paginate(10);

        return view('asset.index', ['assets' => $assets]);

    }

    public function create()
    {
    return view('asset.create');
    }

public function store(Request $request)
{
    $request->validate([
        'asset_number'     => 'required|unique:asset,asset_number',
        'asset_name'       => 'required',
        'category_id'      => 'required',
        'type_id'          => 'required',
        'department_id'    => 'required',
        'asset_condition'  => 'required',
        'location'         => 'required',
    ]);

    Asset::create([
        'asset_number'   => $request->asset_number,
        'asset_name'     => $request->asset_name,
        'category_id'    => $request->category_id,
        'type_id'        => $request->type_id,
        'department_id'  => $request->department_id,
        'part_number'    => $request->part_number,
        'serial_number'  => $request->serial_number,
        'model'          => $request->model,
        'manufacturer'   => $request->manufacturer,
        'yom'            => $request->yom,
        'asset_condition'=> $request->asset_condition,
        'owner'          => $request->owner,
        'department'     => $request->department,
        'location'       => $request->location,
        'assign_to'      => $request->assign_to,
    ]);

    return redirect()
        ->route('asset.index')
        ->with('success', 'Asset berhasil ditambahkan');
}


public function destroy($id)
{
    $asset = Asset::findOrFail($id);
    $asset->delete();

    return redirect()
        ->route('asset.index')
        ->with('success', 'Asset berhasil dihapus');
}

}
