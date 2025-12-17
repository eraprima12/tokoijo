<?php

namespace App\Http\Controllers;

use App\Models\CustomerTTHDetail;
use Illuminate\Http\Request;

class CustomerTTHDetailController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => CustomerTTHDetail::orderBy('ID')->get()
        ]);
    }

    public function show($id)
    {
        $data = CustomerTTHDetail::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function byTTH($tthNo)
    {
        return response()->json([
            'success' => true,
            'data' => CustomerTTHDetail::where('TTHNo', $tthNo)->get()
        ]);
    }
}
