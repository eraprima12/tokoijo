<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $rows = DB::table('CustomerTTH as tth')
            ->join('Customer as c', 'c.CustID', '=', 'tth.CustID')
            ->select(
                'c.CustID',
                'c.Name',
                'c.Address',
                'c.PhoneNo',
                'tth.TTOLNo',
                'tth.DocDate'
            )
            ->orderBy('c.Name')
            ->get();

        $grouped = $rows->groupBy('CustID')->map(function ($items) {
            $first = $items->first();

            return [
                'customer_id' => $first->CustID,
                'customer_name' => $first->Name,
                'address' => $first->Address,
                'phone' => $first->PhoneNo,
                'status' => 'Belum Diberikan',
                'vouchers' => $items->map(fn ($i) => [
                    'ttol_no' => $i->TTOLNo,
                    'doc_date' => $i->DocDate,
                ])->values(),
            ];
        })->values();

        return response()->json($grouped);
    }
}
