<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VServiceInfo extends Model
{
    protected $table = 'v_service_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    public function mExistence1_052()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_052', 'id');
    }

    public function mExistence1_053()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_053', 'id');
    }

    public function mExistence1_054()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_054', 'id');
    }

    public function mExistence1_055()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_055', 'id');
    }

    public function mExistence1_056()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_056', 'id');
    }

    public function mNumberReturn()
    {
        return $this->belongsTo('App\Models\MNumberReturn', 'rke_057', 'id');
    }

    public function mOwnerAgree()
    {
        return $this->belongsTo('App\Models\MOwnerAgree', 'rke_058', 'id');
    }

    public function mExistence1_059()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_059', 'id');
    }

    public function mExistence1_060()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_060', 'id');
    }

    public function mRadioDisturbanceArea()
    {
        return $this->belongsTo('App\Models\MRadioDisturbanceArea', 'rke_228', 'id');
    }

    public function mDevicePosition()
    {
        return $this->belongsTo('App\Models\MDevicePosition', 'rke_230', 'id');
    }

    public function mExistence1_231()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_231', 'id');
    }

    public function mExistence1_232()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_232', 'id');
    }

    public function mExistence1_240()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_240', 'id');
    }

    public function mExistence1_243()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_243', 'id');
    }

    public function mExistence1_275()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_275', 'id');
    }
}
