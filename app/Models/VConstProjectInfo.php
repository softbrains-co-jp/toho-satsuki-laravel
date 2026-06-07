<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VConstProjectInfo extends Model
{
    protected $table = 'v_const_project_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    protected $casts = [
        'rke_150' => 'date:Y/m/d',
        'rke_151' => 'date:Y/m/d',
        'rke_166' => 'date:Y/m/d',
        'rke_237' => 'date:Y/m/d',
        'rke_238' => 'date:Y/m/d',
        'khj_026' => 'date:Y/m/d',
    ];

    public function mKhj020()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_020', 'id');
    }

    public function mKhj024()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_024', 'id');
    }

    public function mKhj025()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_025', 'id');
    }

    public function mRke083()
    {
        return $this->belongsTo('App\Models\MOpen', 'rke_083', 'id');
    }

    public function mRke088()
    {
        return $this->belongsTo('App\Models\MConstDetail', 'rke_088', 'id');
    }

    public function mRke079()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_079', 'id');
    }

    public function mRke082()
    {
        return $this->belongsTo('App\Models\MReuseImpossible', 'rke_082', 'id');
    }

    public function mRke155()
    {
        return $this->belongsTo('App\Models\MNonStandardConst', 'rke_155', 'id');
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

    public function mRke221()
    {
        return $this->belongsTo('App\Models\MConstResult', 'rke_221', 'id');
    }

    public function mRke240()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_240', 'id');
    }

    public function mKhj010()
    {
        return $this->belongsTo('App\Models\MExistence1', 'khj_010', 'id');
    }

    public function mKhj012()
    {
        return $this->belongsTo('App\Models\MExistence2', 'khj_012', 'id');
    }

    public function mRke236()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_236', 'id');
    }
}
