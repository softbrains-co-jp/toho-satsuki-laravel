<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TGkj extends Model
{
    protected $table = 't_gkj';
    protected $primaryKey = 'gkj_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'gkj_002' => 'date:Y/m/d',
    ];
}
