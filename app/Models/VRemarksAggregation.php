<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VRemarksAggregation extends Model
{
    protected $table = 'v_remarks_aggregation';
    protected $primaryKey = 'rke_019';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
