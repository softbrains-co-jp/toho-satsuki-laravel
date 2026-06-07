<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VConstOptions extends Model
{
    protected $table = 'v_const_options';
    protected $primaryKey = 'rko_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rko_031' => 'date:Y/m/d',
        'rko_032' => 'date:Y/m/d',
        'rko_030' => 'datetime:Y/m/d H:i:s',
        'rko_046' => 'datetime:Y/m/d H:i:s',
        'rko_103' => 'date:Y/m/d',
        'rko_047' => 'datetime:Y/m/d H:i:s',
        'rko_048' => 'datetime:Y/m/d H:i:s',
        'rko_099' => 'datetime:Y/m/d H:i:s',
        'okk_003' => 'date:Y/m/d',
        'rko_049' => 'date:Y/m/d',
        'rko_078' => 'date:Y/m/d',
        'okk_010' => 'date:Y/m/d',
        'okk_011' => 'date:Y/m/d',
        'okk_012' => 'date:Y/m/d',
        'okk_013' => 'date:Y/m/d',
        'rko_080' => 'date:Y/m/d',
        'rko_081' => 'date:Y/m/d',
        'rko_121' => 'datetime:Y/m/d H:i:s',
    ];

    public function mRko104()
    {
        return $this->belongsTo('App\Models\MConstHope', 'rko_104', 'id');
    }

    public function mOkk008()
    {
        return $this->belongsTo('App\Models\MConstArrangement', 'okk_008', 'id');
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

    public function mOkk004()
    {
        return $this->belongsTo('App\Models\MMerchant', 'okk_004', 'id');
    }

    public function mRko051()
    {
        return $this->belongsTo('App\Models\MAllocationTime', 'rko_051', 'id');
    }

    public function mOkk014()
    {
        return $this->belongsTo('App\Models\MExistence2', 'okk_014', 'id');
    }

    public function mOkk015()
    {
        return $this->belongsTo('App\Models\MExistence2', 'okk_015', 'id');
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
}
