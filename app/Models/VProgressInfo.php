<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VProgressInfo extends Model
{
    protected $table = 'v_progress_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rke_023' => 'date:Y/m/d',
        'rke_004' => 'date:Y/m/d',
        'rke_005' => 'date:Y/m/d',
        'rke_010' => 'date:Y/m/d',
        'rke_013' => 'date:Y/m/d',
        'rke_020' => 'date:Y/m/d',
        'rke_049' => 'date:Y/m/d',
        'rke_050' => 'date:Y/m/d',
        'rke_065' => 'date:Y/m/d',
        'rke_066' => 'date:Y/m/d',
        'rke_062' => 'date:Y/m/d',
        'rke_048' => 'datetime:Y/m/d H:i:s',
        'rke_076' => 'date:Y/m/d',
        'rke_077' => 'date:Y/m/d',
        'rke_078' => 'date:Y/m/d',
        'rke_101' => 'date:Y/m/d',
        'rke_102' => 'date:Y/m/d',
        'rke_103' => 'date:Y/m/d',
        'rke_108' => 'date:Y/m/d',
        'rke_105' => 'date:Y/m/d',
        'rke_106' => 'date:Y/m/d',
        'rke_107' => 'date:Y/m/d',
        'rke_109' => 'date:Y/m/d',
        'rke_112' => 'date:Y/m/d',
        'rke_115' => 'date:Y/m/d',
        'rke_219' => 'date:Y/m/d',
        'rke_220' => 'date:Y/m/d',
        'rke_151' => 'date:Y/m/d',
        'rke_237' => 'date:Y/m/d',
        'rke_238' => 'date:Y/m/d',
        'rke_168' => 'date:Y/m/d',
        'rke_169' => 'date:Y/m/d',
    ];

    public function mRke233()
    {
        return $this->belongsTo('App\Models\MOrder', 'rke_233', 'id');
    }

    public function mRke068()
    {
        return $this->belongsTo('App\Models\MParentStoreCode', 'rke_068', 'id');
    }

    public function mRke064()
    {
        return $this->belongsTo('App\Models\MReservationStatus', 'rke_064', 'id');
    }

    public function mRke063()
    {
        return $this->belongsTo('App\Models\MAllocationTime', 'rke_063', 'id');
    }

    public function mRke111()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_111', 'id');
    }

    public function mRke114()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_114', 'id');
    }

    public function mRke117()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_117', 'id');
    }

    public function mRke119()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_119', 'id');
    }

    public function mRke209()
    {
        return $this->belongsTo('App\Models\MNecessity3', 'rke_209', 'id');
    }

    public function mRke211()
    {
        return $this->belongsTo('App\Models\MSurveyPerformed', 'rke_211', 'id');
    }

    public function mRke210()
    {
        return $this->belongsTo('App\Models\MExistence4', 'rke_210', 'id');
    }

    public function mRke212()
    {
        return $this->belongsTo('App\Models\MNecessity3', 'rke_212', 'id');
    }

    public function mRke136()
    {
        return $this->belongsTo('App\Models\MIncompatibilityCode', 'rke_136', 'id');
    }

    public function mRke148()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_148', 'id');
    }

    public function mRke149()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_149', 'id');
    }

    public function mRke236()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_236', 'id');
    }

    public function mRke244()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_244', 'id');
    }
}
