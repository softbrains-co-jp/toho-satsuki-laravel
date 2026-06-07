<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TGtj extends Model
{
    protected $table = 't_gtj';
    protected $primaryKey = 'gtj_001';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;

    protected $casts = [
        'gtj_002' => 'date:Y/m/d',
    ];
}
