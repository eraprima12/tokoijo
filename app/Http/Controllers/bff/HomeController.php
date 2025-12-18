<?php

namespace App\Http\Controllers\Bff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $rows = DB::table('CustomerTTH as tth')
            ->join('Customer as c', 'c.CustID', '=', 'tth.CustID')
            ->select(
                'c.CustID as customer_id',
                'c.Name as customer_name',
                'c.Address as address',
                'c.PhoneNo as phone',
                'tth.TTOTTPNo as ttol_no',
                'tth.DocDate as doc_date',
                'tth.Received as received'
            )
            ->orderBy('c.Name')
            ->get();

        $data = $rows
            ->groupBy('customer_id')
            ->map(function ($items) {
                $first = $items->first();

                return [
                    'customer_id' => $first->customer_id,
                    'customer_name' => $first->customer_name,
                    'address' => $first->address,
                    'phone' => $first->phone,
                    'status' => $items->every(fn ($i) => $i->received == 1)
                        ? 'Sudah Diberikan'
                        : 'Belum Diberikan',
                    'vouchers' => $items->map(fn ($i) => [
                        'ttol_no' => $i->ttol_no,
                        'doc_date' => $i->doc_date,
                        'received' => (bool) $i->received,
                    ])->values(),
                ];
            })
            ->values();

        return response()->json([
            'data' => $data,
        ]);
    }
}
