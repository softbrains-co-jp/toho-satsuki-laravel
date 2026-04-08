<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TSkk extends Model
{
    protected $table = 't_skk';
    protected $primaryKey = 'skk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'skk_002' => 'decimal:3',
            'skk_003' => 'decimal:3',
            'skk_004' => 'decimal:3',
            'skk_005' => 'decimal:3',
            'skk_006' => 'decimal:3',
            'skk_007' => 'decimal:3',
            'skk_008' => 'decimal:3',
            'skk_016' => 'decimal:3',
            'skk_017' => 'decimal:3',
    ];
}
