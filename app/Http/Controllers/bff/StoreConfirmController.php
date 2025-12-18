<?php

namespace App\Http\Controllers\bff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreConfirmController extends Controller
{
    public function confirm(Request $request, $custId)
    {
        $request->validate([
            'action' => 'required|in:TERIMA,TOLAK',
            'reason' => 'nullable|string',
        ]);

        $data = [
            'Received' => $request->action === 'TERIMA' ? 1 : 0,
            'ReceivedDate' => now(),
            'FailedReason' => null,
        ];

        if ($request->action === 'TOLAK') {
            $data['FailedReason'] = $request->reason;
        }

        DB::table('CustomerTTH')
            ->where('CustID', $custId)
            ->update($data);

        return response()->json(['success' => true]);
    }
}
