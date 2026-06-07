<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VArticleInfo extends Model
{
    protected $table = 'v_article_info';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;

    public function mRke188()
    {
        return $this->belongsTo('App\Models\MNewUsedHouse', 'rke_188', 'id');
    }

    public function mRke189()
    {
        return $this->belongsTo('App\Models\MSellingLots', 'rke_189', 'id');
    }

    public function mRke195()
    {
        return $this->belongsTo('App\Models\MContractant', 'rke_195', 'id');
    }

    public function mRke192()
    {
        return $this->belongsTo('App\Models\MMansion', 'rke_192', 'id');
    }

    public function mRke234()
    {
        return $this->belongsTo('App\Models\MExistence5', 'rke_234', 'id');
    }

    public function mRke235()
    {
        return $this->belongsTo('App\Models\MExistence3', 'rke_235', 'id');
    }

    public function mRke193()
    {
        return $this->belongsTo('App\Models\MExistence1', 'rke_193', 'id');
    }
}
