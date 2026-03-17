<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRadioDisturbanceArea extends Model
{
    protected $table = 'm_radio_disturbance_area';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
