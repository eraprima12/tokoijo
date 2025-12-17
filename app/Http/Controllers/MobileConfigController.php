<?php

namespace App\Http\Controllers;

use App\Models\MobileConfig;

class MobileConfigController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => MobileConfig::orderBy('ID')->get(),
        ]);
    }

    public function show($id)
    {
        $config = MobileConfig::find($id);

        if (! $config) {
            return response()->json([
                'success' => false,
                'message' => 'Config not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $config,
        ]);
    }

    public function byBranch($branchCode)
    {
        return response()->json([
            'success' => true,
            'data' => MobileConfig::where('BranchCode', $branchCode)->get(),
        ]);
    }

    public function byName($name)
    {
        return response()->json([
            'success' => true,
            'data' => MobileConfig::where('Name', $name)->get(),
        ]);
    }
}
