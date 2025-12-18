<?php

namespace App\Http\Controllers\bff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('CustomerTTH as tth')
            ->join('Customer as c', 'c.CustID', '=', 'tth.CustID')
            ->select(
                'c.CustID as cust_id',
                'c.Name as store_name',
                'tth.TTOTTPNo as doc_no',
                'tth.DocDate as doc_date',
                'tth.Received',
                'tth.ReceivedDate'
            )
            ->orderBy('c.Name');

        // 🔍 Filter Nama Toko
        if ($request->filled('store_name')) {
            $query->where('c.Name', 'like', '%'.$request->store_name.'%');
        }

        $rows = $query->get();

        $data = $rows->groupBy('cust_id')->map(function ($items) {
            $first = $items->first();

            return [
                'cust_id' => $first->cust_id,
                'store_name' => $first->store_name,
                'status' => $this->status($items),
                'documents' => $items->map(fn ($i) => [
                    'doc_no' => $i->doc_no,
                    'date' => $i->doc_date,
                ])->values(),
            ];
        })->values();

        return response()->json(['data' => $data]);
    }

    private function status($items)
    {
        if ($items->every(fn ($i) => $i->Received === 1)) {
            return 'TERIMA';
        }

        if ($items->contains(fn ($i) => $i->Received === 0)) {
            return 'TOLAK';
        }

        return 'BELUM';
    }
}
