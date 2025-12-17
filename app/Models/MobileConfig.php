<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobileConfig extends Model
{
    protected $table = 'MobileConfig';

    protected $primaryKey = 'ID';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'BranchCode',
        'Name',
        'Description',
        'Value',
    ];
}
