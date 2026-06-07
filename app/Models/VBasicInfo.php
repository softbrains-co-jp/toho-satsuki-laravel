<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VBasicInfo extends Model
{
    protected $table = 'v_basic_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    public function mRke024()
    {
        return $this->belongsTo('App\Models\MHouseStyle', 'rke_024', 'id');
    }

    public function mRke025()
    {
        return $this->belongsTo('App\Models\MHouseOwnership', 'rke_025', 'id');
    }

    public function mRke044()
    {
        return $this->belongsTo('App\Models\MMoveIn', 'rke_044', 'id');
    }

    public function mRke174()
    {
        return $this->belongsTo('App\Models\MLineSpeed', 'rke_174', 'id');
    }

    public function mRke043()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_043', 'id');
    }

    public function mRke239()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_239', 'id');
    }
}
