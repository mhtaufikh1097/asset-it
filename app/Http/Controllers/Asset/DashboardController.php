<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class DashboardController extends Controller
{
    public function index()
    {
        // KPI Dashboard
        $totalAsset = Asset::count();
        $serviceable = Asset::where('asset_condition', 'SERVICEABLE')->count();
        $unserviceable = Asset::where('asset_condition', 'UNSERVICEABLE')->count();

        return view('asset.dashboard', compact(
            'totalAsset',
            'serviceable',
            'unserviceable'
        ));
    }
}
