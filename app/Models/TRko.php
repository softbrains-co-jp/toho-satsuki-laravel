<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRko extends Model
{
    protected $table = 't_rko';
    protected $primaryKey = 'rko_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'rko_005' => 'date:Y/m/d',
            'rko_006' => 'date:Y/m/d',
            'rko_009' => 'date:Y/m/d',
            'rko_010' => 'date:Y/m/d',
            'rko_030' => 'datetime:Y/m/d H:i:s',
            'rko_031' => 'date:Y/m/d',
            'rko_032' => 'date:Y/m/d',
            'rko_033' => 'date:Y/m/d',
            'rko_046' => 'datetime:Y/m/d H:i:s',
            'rko_047' => 'datetime:Y/m/d H:i:s',
            'rko_048' => 'datetime:Y/m/d H:i:s',
            'rko_049' => 'date:Y/m/d',
            'rko_050' => 'date:Y/m/d',
            'rko_069' => 'date:Y/m/d',
            'rko_078' => 'date:Y/m/d',
            'rko_080' => 'date:Y/m/d',
            'rko_081' => 'date:Y/m/d',
            'rko_082' => 'date:Y/m/d',
            'rko_099' => 'datetime:Y/m/d H:i:s',
            'rko_103' => 'date:Y/m/d',
            'rko_115' => 'integer',
            'rko_121' => 'datetime:Y/m/d H:i:s',
    ];
}
