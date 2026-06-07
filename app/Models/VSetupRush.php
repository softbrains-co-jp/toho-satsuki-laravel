<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VSetupRush extends Model
{
    protected $table = 'v_setup_rush';
    protected $primaryKey = 'rkk_001';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rkk_031' => 'date:Y/m/d',
        'rkk_032' => 'date:Y/m/d',
        'rkk_030' => 'datetime:Y/m/d H:i:s',
        'rkk_046' => 'datetime:Y/m/d H:i:s',
        'rkk_103' => 'date:Y/m/d',
        'rkk_047' => 'datetime:Y/m/d H:i:s',
        'rkk_048' => 'datetime:Y/m/d H:i:s',
        'rkk_099' => 'datetime:Y/m/d H:i:s',
        'ktk_016' => 'date:Y/m/d',
        'rkk_164' => 'date:Y/m/d',
        'rkk_194' => 'date:Y/m/d',
        'rkk_195' => 'date:Y/m/d',
        'ktk_020' => 'date:Y/m/d',
        'ktk_015' => 'date:Y/m/d',
        'ktk_003' => 'date:Y/m/d',
        'rkk_049' => 'date:Y/m/d',
        'rkk_078' => 'date:Y/m/d',
        'ktk_010' => 'date:Y/m/d',
        'ktk_009' => 'date:Y/m/d',
        'ktk_007' => 'date:Y/m/d',
        'ktk_008' => 'date:Y/m/d',
        'rkk_080' => 'date:Y/m/d',
        'rkk_157' => 'date:Y/m/d',
        'rkk_227' => 'datetime:Y/m/d H:i:s',
        'rkk_145' => 'date:Y/m/d',
        'rkk_159' => 'date:Y/m/d',
        'rkk_160' => 'date:Y/m/d',
        'rkk_165' => 'date:Y/m/d',
        'rkk_166' => 'date:Y/m/d',
        'rkk_167' => 'date:Y/m/d',
        'rkk_168' => 'date:Y/m/d',
        'rkk_169' => 'date:Y/m/d',
        'rkk_170' => 'date:Y/m/d',
        'rkk_171' => 'date:Y/m/d',
        'rkk_172' => 'date:Y/m/d',
        'rkk_173' => 'date:Y/m/d',
        'rkk_174' => 'date:Y/m/d',
        'rkk_175' => 'date:Y/m/d',
        'rkk_176' => 'date:Y/m/d',
        'rkk_177' => 'date:Y/m/d',
        'rkk_178' => 'date:Y/m/d',
        'rkk_179' => 'date:Y/m/d',
        'rkk_229' => 'date:Y/m/d',
        'rkk_115' => 'integer',
        'rkk_201' => 'date:Y/m/d',
        'rkk_210' => 'date:Y/m/d',
        'rkk_214' => 'date:Y/m/d',
        'rkk_215' => 'date:Y/m/d',
        'rkk_222' => 'date:Y/m/d',
    ];

    public function mRkk104()
    {
        return $this->belongsTo('App\Models\MConstHope', 'rkk_104', 'id');
    }

    public function mRkk020()
    {
        return $this->belongsTo('App\Models\MHouseStyle', 'rkk_020', 'id');
    }

    public function mRkk021()
    {
        return $this->belongsTo('App\Models\MHouseOwnership', 'rkk_021', 'id');
    }

    public function mRkk083()
    {
        return $this->belongsTo('App\Models\MCustomer', 'rkk_083', 'id');
    }

    public function mRkk029()
    {
        return $this->belongsTo('App\Models\MConstStatus', 'rkk_029', 'id');
    }

    public function mRkk052()
    {
        return $this->belongsTo('App\Models\MUndecidedDelay', 'rkk_052', 'id');
    }

    public function mRkk072()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rkk_072', 'id');
    }

    public function mRkk073()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rkk_073', 'id');
    }

    public function mRkk074()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rkk_074', 'id');
    }

    public function mRkk075()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rkk_075', 'id');
    }

    public function mRkk076()
    {
        return $this->belongsTo('App\Models\MConstPhaseNote', 'rkk_076', 'id');
    }

    public function mRkk106()
    {
        return $this->belongsTo('App\Models\MFirstRush', 'rkk_106', 'id');
    }

    public function mRkk107()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_107', 'id');
    }

    public function mRkk124()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_124', 'id');
    }

    public function mKtk004()
    {
        return $this->belongsTo('App\Models\MMerchant', 'ktk_004', 'id');
    }

    public function mRkk051()
    {
        return $this->belongsTo('App\Models\MAllocationTime', 'rkk_051', 'id');
    }

    public function mKtk013()
    {
        return $this->belongsTo('App\Models\MExistence2', 'ktk_013', 'id');
    }

    public function mKtk014()
    {
        return $this->belongsTo('App\Models\MExistence2', 'ktk_014', 'id');
    }

    public function mRkk056()
    {
        return $this->belongsTo('App\Models\MConstStartTime', 'rkk_056', 'id');
    }

    public function mRkk077()
    {
        return $this->belongsTo('App\Models\MConstCompletion', 'rkk_077', 'id');
    }

    public function mRkk067()
    {
        return $this->belongsTo('App\Models\MConstDelayCode', 'rkk_067', 'id');
    }

    public function mRkk155()
    {
        return $this->belongsTo('App\Models\MConstResultReason', 'rkk_155', 'id');
    }

    public function mRkk152()
    {
        return $this->belongsTo('App\Models\MProgressStatus', 'rkk_152', 'id');
    }

    public function mRkk123()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_123', 'id');
    }

    public function mRkk133()
    {
        return $this->belongsTo('App\Models\MStopInformation', 'rkk_133', 'id');
    }

    public function mRkk148()
    {
        return $this->belongsTo('App\Models\MUrPrivate', 'rkk_148', 'id');
    }

    public function mRkk150()
    {
        return $this->belongsTo('App\Models\MDrawConst', 'rkk_150', 'id');
    }

    public function mRkk231()
    {
        return $this->belongsTo('App\Models\MFirstRush', 'rkk_231', 'id');
    }

    public function mRkk108()
    {
        return $this->belongsTo('App\Models\MBasicPcOs', 'rkk_108', 'id');
    }

    public function mRkk109()
    {
        return $this->belongsTo('App\Models\MWlanSetupHope', 'rkk_109', 'id');
    }

    public function mRkk114()
    {
        return $this->belongsTo('App\Models\MTerminal', 'rkk_114', 'id');
    }

    public function mRkk116()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_116', 'id');
    }

    public function mRkk117()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_117', 'id');
    }

    public function mRkk118()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_118', 'id');
    }

    public function mRkk102()
    {
        return $this->belongsTo('App\Models\MNecessity2', 'rkk_102', 'id');
    }

    public function mRkk143()
    {
        return $this->belongsTo('App\Models\MOneContractTwoPhone', 'rkk_143', 'id');
    }

    public function mRkk196()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_196', 'id');
    }

    public function mRkk197()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_197', 'id');
    }

    public function mRkk211()
    {
        return $this->belongsTo('App\Models\MCancelOccur', 'rkk_211', 'id');
    }

    public function mRkk212()
    {
        return $this->belongsTo('App\Models\MOwnerAgree', 'rkk_212', 'id');
    }

    public function mRkk216()
    {
        return $this->belongsTo('App\Models\MConstScheme', 'rkk_216', 'id');
    }

    public function mRkk224()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rkk_224', 'id');
    }
}
