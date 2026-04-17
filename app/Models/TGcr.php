<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TGcr extends Model
{
    protected $table = 't_gcr';
    protected $primaryKey = 'gcr_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
            'gcr_002' => 'date:Y/m/d',
            'gcr_003' => 'date:Y/m/d',
            'gcr_004' => 'date:Y/m/d',
            'gcr_005' => 'date:Y/m/d',
            'gcr_006' => 'date:Y/m/d',
            'gcr_007' => 'date:Y/m/d',
            'gcr_008' => 'date:Y/m/d',
            'gcr_009' => 'date:Y/m/d',
            'gcr_010' => 'date:Y/m/d',
            'gcr_011' => 'date:Y/m/d',
            'gcr_017' => 'date:Y/m/d',
            'gcr_018' => 'date:Y/m/d',
            'gcr_019' => 'date:Y/m/d',
            'gcr_020' => 'date:Y/m/d',
            'gcr_021' => 'date:Y/m/d',
            'gcr_022' => 'date:Y/m/d',
            'gcr_023' => 'date:Y/m/d',
            'gcr_024' => 'date:Y/m/d',
            'gcr_025' => 'date:Y/m/d',
            'gcr_026' => 'date:Y/m/d',
            'gcr_027' => 'date:Y/m/d',
            'gcr_028' => 'date:Y/m/d',
            'gcr_029' => 'date:Y/m/d',
            'gcr_030' => 'date:Y/m/d',
            'gcr_031' => 'date:Y/m/d',
            'gcr_037' => 'date:Y/m/d',
            'gcr_038' => 'date:Y/m/d',
            'gcr_039' => 'date:Y/m/d',
            'gcr_040' => 'date:Y/m/d',
            'gcr_041' => 'date:Y/m/d',
    ];

}
