<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VDeskDesignInfo extends Model
{
    protected $table = 'v_desk_design_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rke_076' => 'date:Y/m/d',
        'kik_003' => 'date:Y/m/d',
        'khj_026' => 'date:Y/m/d',
        'rke_138' => 'date:Y/m/d',
        'rke_139' => 'date:Y/m/d',
        'rke_126' => 'date:Y/m/d',
        'rke_127' => 'date:Y/m/d',
        'rke_129' => 'date:Y/m/d',
        'rke_130' => 'date:Y/m/d',
        'rke_132' => 'date:Y/m/d',
        'rke_133' => 'date:Y/m/d',
        'rke_122' => 'date:Y/m/d',
        'rke_020' => 'date:Y/m/d',
        'rke_049' => 'date:Y/m/d',
        'rke_050' => 'date:Y/m/d',
        'rke_150' => 'date:Y/m/d',
        'rke_151' => 'date:Y/m/d',
    ];

    public function mRke124()
    {
        return $this->belongsTo('App\Models\MRoad', 'rke_124', 'id');
    }

    public function mRke123()
    {
        return $this->belongsTo('App\Models\MClaimArea', 'rke_123', 'id');
    }

    public function mRke079()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_079', 'id');
    }

    public function mRke083()
    {
        return $this->belongsTo('App\Models\MOpen', 'rke_083', 'id');
    }

    public function mRke088()
    {
        return $this->belongsTo('App\Models\MConstDetail', 'rke_088', 'id');
    }

    public function mRke082()
    {
        return $this->belongsTo('App\Models\MReuseImpossible', 'rke_082', 'id');
    }

    public function mRke071()
    {
        return $this->belongsTo('App\Models\MLine', 'rke_071', 'id');
    }

    public function mRke072()
    {
        return $this->belongsTo('App\Models\MLineSituation', 'rke_072', 'id');
    }

    public function mRke069()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_069', 'id');
    }

    public function mRke070()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_070', 'id');
    }

    public function mRke136()
    {
        return $this->belongsTo('App\Models\MIncompatibilityCode', 'rke_136', 'id');
    }

    public function mRke125()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_125', 'id');
    }

    public function mRke128()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_128', 'id');
    }

    public function mRke131()
    {
        return $this->belongsTo('App\Models\MSurveyProcessCode', 'rke_131', 'id');
    }

    public function mRke149()
    {
        return $this->belongsTo('App\Models\MOfferPropriety', 'rke_149', 'id');
    }

    public function mRke223()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_223', 'id');
    }

    public function mRke224()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_224', 'id');
    }

    public function mRke225()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_225', 'id');
    }

    public function mRke226()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_226', 'id');
    }

    public function mRke227()
    {
        return $this->belongsTo('App\Models\MDesignPhaseNote', 'rke_227', 'id');
    }
}
