<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MConstStartTime extends Model
{
    protected $table = 'm_const_start_time';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    // タイムスタンプ無効化
    public $timestamps = false;
}
