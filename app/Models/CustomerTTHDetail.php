<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTTHDetail extends Model
{
    protected $table = 'CustomerTTHDetail';

    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'TTHNo',
        'TTOTTPNo',
        'Jenis',
        'Qty',
        'Unit',
    ];
}
