<?php

namespace App\Http\Controllers;

use App\Models\CustomerTTH;
use Illuminate\Http\Request;

class CustomerTTHController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => CustomerTTH::orderBy('ID', 'desc')->get()
        ]);
    }

    public function show($id)
    {
        $data = CustomerTTH::find($id);

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

    public function byCustomer($custId)
    {
        return response()->json([
            'success' => true,
            'data' => CustomerTTH::where('CustID', $custId)->get()
        ]);
    }
}
