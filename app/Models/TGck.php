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

    public function mGck003()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gck_003', 'id');
    }

    public function mGck012()
    {
        return $this->belongsTo('App\Models\MNecessity4', 'gck_012', 'id');
    }

    public function mGck013()
    {
        return $this->belongsTo('App\Models\MToute', 'gck_013', 'id');
    }

    public function mGck026()
    {
        return $this->belongsTo('App\Models\MService', 'gck_026', 'id');
    }

    public function mGck028()
    {
        return $this->belongsTo('App\Models\MSpl2Housing', 'gck_028', 'id');
    }

    public function mGck044()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gck_044', 'id');
    }

    public function mGck059()
    {
        return $this->belongsTo('App\Models\MLineEquipment', 'gck_059', 'id');
    }

    public function mGck064()
    {
        return $this->belongsTo('App\Models\MSettingSuppression', 'gck_064', 'id');
    }
}
