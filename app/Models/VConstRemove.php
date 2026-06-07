<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VConstRemove extends Model
{
    protected $table = 'v_const_remove';
    protected $primaryKey = 'rko_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rko_031' => 'date:Y/m/d',
        'rko_032' => 'date:Y/m/d',
        'tkk_031' => 'date:Y/m/d',
        'rko_069' => 'date:Y/m/d',
        'tkk_022' => 'date:Y/m/d',
        'rko_030' => 'datetime:Y/m/d H:i:s',
        'rko_046' => 'datetime:Y/m/d H:i:s',
        'rko_103' => 'date:Y/m/d',
        'rko_047' => 'datetime:Y/m/d H:i:s',
        'rko_048' => 'datetime:Y/m/d H:i:s',
        'tkk_033' => 'date:Y/m/d',
        'rko_099' => 'datetime:Y/m/d H:i:s',
        'tkk_003' => 'date:Y/m/d',
        'rko_049' => 'date:Y/m/d',
        'rko_078' => 'date:Y/m/d',
        'tkk_027' => 'date:Y/m/d',
        'tkk_018' => 'date:Y/m/d',
        'tkk_008' => 'date:Y/m/d',
        'tkk_010' => 'date:Y/m/d',
        'tkk_011' => 'date:Y/m/d',
        'rko_080' => 'date:Y/m/d',
        'rko_081' => 'date:Y/m/d',
        'tkk_021' => 'date:Y/m/d',
        'tkk_016' => 'date:Y/m/d',
        'tkk_024' => 'date:Y/m/d',
        'rko_121' => 'datetime:Y/m/d H:i:s',
    ];

    public function mTkk025()
    {
        return $this->belongsTo('App\Models\MRemovalCode', 'tkk_025', 'id');
    }

    public function mRko070()
    {
        return $this->belongsTo('App\Models\MRemovalPattern', 'rko_070', 'id');
    }

    public function mRko104()
    {
        return $this->belongsTo('App\Models\MConstHope', 'rko_104', 'id');
    }

    public function mTkk004()
    {
        return $this->belongsTo('App\Models\MRemoval', 'tkk_004', 'id');
    }

    public function mRko020()
    {
        return $this->belongsTo('App\Models\MHouseStyle', 'rko_020', 'id');
    }

    public function mRko021()
    {
        return $this->belongsTo('App\Models\MHouseOwnership', 'rko_021', 'id');
    }

    public function mRko083()
    {
        return $this->belongsTo('App\Models\MCustomer', 'rko_083', 'id');
    }

    public function mRko090()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rko_090', 'id');
    }

    public function mRko029()
    {
        return $this->belongsTo('App\Models\MConstStatus', 'rko_029', 'id');
    }

    public function mRko052()
    {
        return $this->belongsTo('App\Models\MUndecidedDelay', 'rko_052', 'id');
    }

    public function mTkk013()
    {
        return $this->belongsTo('App\Models\MDrawMethod', 'tkk_013', 'id');
    }

    public function mRko072()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rko_072', 'id');
    }

    public function mRko073()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rko_073', 'id');
    }

    public function mRko074()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rko_074', 'id');
    }

    public function mRko075()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rko_075', 'id');
    }

    public function mRko076()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rko_076', 'id');
    }

    public function mTkk005()
    {
        return $this->belongsTo('App\Models\MMerchant', 'tkk_005', 'id');
    }

    public function mRko051()
    {
        return $this->belongsTo('App\Models\MAllocationTime', 'rko_051', 'id');
    }

    public function mTkk019()
    {
        return $this->belongsTo('App\Models\MExistence2', 'tkk_019', 'id');
    }

    public function mTkk020()
    {
        return $this->belongsTo('App\Models\MExistence2', 'tkk_020', 'id');
    }

    public function mRko056()
    {
        return $this->belongsTo('App\Models\MConstStartTime', 'rko_056', 'id');
    }

    public function mRko077()
    {
        return $this->belongsTo('App\Models\MConstCompletion', 'rko_077', 'id');
    }

    public function mRko067()
    {
        return $this->belongsTo('App\Models\MConstDelayCode', 'rko_067', 'id');
    }

    public function mRko071()
    {
        return $this->belongsTo('App\Models\MRemovalReasonCode', 'rko_071', 'id');
    }

    public function mTkk029()
    {
        return $this->belongsTo('App\Models\MReasonDelay', 'tkk_029', 'id');
    }
}
