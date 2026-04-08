<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TKsk extends Model
{
    protected $table = 't_ksk';
    protected $primaryKey = 'ksk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'ksk_002' => 'date:Y/m/d',
            'ksk_004' => 'date:Y/m/d',
            'ksk_005' => 'date:Y/m/d',
            'ksk_006' => 'date:Y/m/d',
            'ksk_008' => 'date:Y/m/d',
            'ksk_009' => 'date:Y/m/d',
            'ksk_010' => 'date:Y/m/d',
            'ksk_011' => 'date:Y/m/d',
            'ksk_011' => 'date:Y/m/d',
            'ksk_012' => 'date:Y/m/d',
            'ksk_013' => 'date:Y/m/d',
            'ksk_014' => 'date:Y/m/d',
            'ksk_015' => 'date:Y/m/d',
            'ksk_017' => 'date:Y/m/d',
            'ksk_018' => 'date:Y/m/d',
            'ksk_019' => 'date:Y/m/d',
            'ksk_020' => 'date:Y/m/d',
            'ksk_021' => 'date:Y/m/d',
            'ksk_022' => 'date:Y/m/d',
            'ksk_024' => 'date:Y/m/d',
            'ksk_025' => 'date:Y/m/d',
            'ksk_036' => 'date:Y/m/d',
            'ksk_041' => 'date:Y/m/d',
    ];

}
