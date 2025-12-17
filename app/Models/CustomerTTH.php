<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTTH extends Model
{
    protected $table = 'CustomerTTH';

    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'TTHNo',
        'SalesID',
        'TTOTTPNo',
        'CustID',
        'DocDate',
        'Received',
        'ReceivedDate',
        'FailedReason',
    ];

    protected $casts = [
        'DocDate' => 'datetime',
        'ReceivedDate' => 'datetime',
        'Received' => 'boolean',
    ];
}
