<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TRke extends Model
{
    protected $table = 't_rke';
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

    public function mRke052()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_052', 'id');
    }

    public function mRke053()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_053', 'id');
    }

    public function mRke054()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_054', 'id');
    }

    public function mRke055()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_055', 'id');
    }

    public function mRke056()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_056', 'id');
    }

    public function mRke057()
    {
        return $this->belongsTo('App\Models\MNumberReturn', 'rke_057', 'id');
    }

    public function mRke058()
    {
        return $this->belongsTo('App\Models\MOwnerAgree', 'rke_058', 'id');
    }

    public function mRke059()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_059', 'id');
    }

    public function mRke060()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_060', 'id');
    }

    public function mRke174()
    {
        return $this->belongsTo('App\Models\MLineSpeed', 'rke_174', 'id');
    }

    public function mRke043()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_043', 'id');
    }

    public function mRke188()
    {
        return $this->belongsTo('App\Models\MNewUsedHouse', 'rke_188', 'id');
    }

    public function mRke189()
    {
        return $this->belongsTo('App\Models\MSellingLots', 'rke_189', 'id');
    }

    public function mRke192()
    {
        return $this->belongsTo('App\Models\MMansion', 'rke_192', 'id');
    }

    public function mRke193()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_193', 'id');
    }

    public function mRke195()
    {
        return $this->belongsTo('App\Models\MContractant', 'rke_195', 'id');
    }

    public function mRke228()
    {
        return $this->belongsTo('App\Models\MRadioDisturbanceArea', 'rke_228', 'id');
    }

    public function mRke230()
    {
        return $this->belongsTo('App\Models\MDevicePosition', 'rke_230', 'id');
    }

    public function mRke231()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_231', 'id');
    }

    public function mRke232()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_232', 'id');
    }

    public function mRke234()
    {
        return $this->belongsTo('App\Models\MExistence5', 'rke_234', 'id');
    }

    public function mRke235()
    {
        return $this->belongsTo('App\Models\MExistence3', 'rke_235', 'id');
    }

    public function mRke239()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_239', 'id');
    }

    public function mRke240()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_240', 'id');
    }

    public function mRke243()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_243', 'id');
    }

    public function mRke275()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_275', 'id');
    }


}
