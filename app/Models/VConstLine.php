<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VConstLine extends Model
{
    protected $table = 'v_const_line';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rke_167' => 'date:Y/m/d',
        'gkj_002' => 'date:Y/m/d',
        'rke_160' => 'date:Y/m/d',
        'rke_159' => 'date:Y/m/d',
        'rke_162' => 'date:Y/m/d',
        'rke_161' => 'date:Y/m/d',
        'rke_158' => 'date:Y/m/d',
        'rke_254' => 'datetime:Y/m/d H:i:s',
    ];

    public function mGkj003()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gkj_003', 'id');
    }

    public function mGkj007()
    {
        return $this->belongsTo('App\Models\MMerchant', 'gkj_007', 'id');
    }

    public function mGkj012()
    {
        return $this->belongsTo('App\Models\MRouteChange', 'gkj_012', 'id');
    }

    public function mRke163()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_163', 'id');
    }

    public function mRke091()
    {
        return $this->belongsTo('App\Models\MSpl2Shape', 'rke_091', 'id');
    }
}
