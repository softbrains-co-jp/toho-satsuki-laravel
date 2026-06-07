<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VLineRemoval extends Model
{
    protected $table = 'v_line_removal';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rke_265' => 'date:Y/m/d',
        'gtj_002' => 'date:Y/m/d',
        'rke_258' => 'date:Y/m/d',
        'rke_257' => 'date:Y/m/d',
        'rke_260' => 'date:Y/m/d',
        'rke_259' => 'date:Y/m/d',
        'rke_256' => 'date:Y/m/d',
        'rke_254' => 'datetime:Y/m/d H:i:s',
    ];

    public function mGtj003()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gtj_003', 'id');
    }

    public function mGtj007()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gtj_007', 'id');
    }

    public function mRke261()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_261', 'id');
    }

    public function mRke091()
    {
        return $this->belongsTo('App\Models\MSpl2Shape', 'rke_091', 'id');
    }
}
