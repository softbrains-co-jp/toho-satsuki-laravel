<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VFacilityInfo extends Model
{
    protected $table = 'v_facility_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    public function mRke083()
    {
        return $this->belongsTo('App\Models\MOpen', 'rke_083', 'id');
    }

    public function mRke088()
    {
        return $this->belongsTo('App\Models\MConstDetail', 'rke_088', 'id');
    }

    public function mRke071()
    {
        return $this->belongsTo('App\Models\MLine', 'rke_071', 'id');
    }

    public function mRke072()
    {
        return $this->belongsTo('App\Models\MLineSituation', 'rke_072', 'id');
    }

    public function mRke079()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_079', 'id');
    }

    public function mRke069()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_069', 'id');
    }

    public function mRke070()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_070', 'id');
    }

    public function mRke082()
    {
        return $this->belongsTo('App\Models\MReuseImpossible', 'rke_082', 'id');
    }

    public function mRke123()
    {
        return $this->belongsTo('App\Models\MClaimArea', 'rke_123', 'id');
    }

    public function mRke124()
    {
        return $this->belongsTo('App\Models\MRoad', 'rke_124', 'id');
    }

    public function mRke086()
    {
        return $this->belongsTo('App\Models\MOsuPort', 'rke_086', 'id');
    }

    public function mRke087()
    {
        return $this->belongsTo('App\Models\MOsuSpeed', 'rke_087', 'id');
    }

    public function mRke091()
    {
        return $this->belongsTo('App\Models\MSpl2Shape', 'rke_091', 'id');
    }

    public function mRke207()
    {
        return $this->belongsTo('App\Models\MEquipmentSend', 'rke_207', 'id');
    }

    public function mRke205()
    {
        return $this->belongsTo('App\Models\MSpecialProjects', 'rke_205', 'id');
    }

    public function mRke206()
    {
        return $this->belongsTo('App\Models\MPortAllocation', 'rke_206', 'id');
    }

    public function mRke213()
    {
        return $this->belongsTo('App\Models\MInstallationPosition', 'rke_213', 'id');
    }

    public function mRke216()
    {
        return $this->belongsTo('App\Models\MPropriety2', 'rke_216', 'id');
    }

    public function mRke217()
    {
        return $this->belongsTo('App\Models\MPropriety2', 'rke_217', 'id');
    }

    public function mRke218()
    {
        return $this->belongsTo('App\Models\MExistence4', 'rke_218', 'id');
    }

    public function mRke208()
    {
        return $this->belongsTo('App\Models\MEquipmentSituation', 'rke_208', 'id');
    }

    public function mRke247()
    {
        return $this->belongsTo('App\Models\MTerminal', 'rke_247', 'id');
    }

    public function mRke249()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_249', 'id');
    }

    public function mRke250()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_250', 'id');
    }

    public function mRke251()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_251', 'id');
    }
}
