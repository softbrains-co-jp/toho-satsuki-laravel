<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TGck extends Model
{
    protected $table = 't_gck';
    protected $primaryKey = 'gck_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'gck_002' => 'date:Y/m/d',
            'gck_006' => 'date:Y/m/d',
            'gck_009' => 'date:Y/m/d',
            'gck_025' => 'date:Y/m/d',
            'gck_031' => 'date:Y/m/d',
            'gck_033' => 'date:Y/m/d',
            'gck_034' => 'date:Y/m/d',
            'gck_036' => 'date:Y/m/d',
            'gck_037' => 'date:Y/m/d',
            'gck_038' => 'date:Y/m/d',
            'gck_040' => 'date:Y/m/d',
            'gck_041' => 'date:Y/m/d',
            'gck_043' => 'date:Y/m/d',
            'gck_048' => 'date:Y/m/d',
            'gck_057' => 'date:Y/m/d',
            'gck_061' => 'date:Y/m/d',
            'gck_063' => 'date:Y/m/d',
    ];
}
